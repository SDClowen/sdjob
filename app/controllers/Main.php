<?php

namespace App\Controllers;

use Core\{Controller, Request, Config};
use Core\Attributes\route;
use App\Models\{Content, User};
use App\Helpers\Mail;

class Main extends Controller
{
    #[route(method: route::xhr_get | route::get)]
    public function index()
    {
        $this->view("index", "home", "Efeler Belediyesi - Kariyer Merkezi", [
            "menu" => Content::menu(),
            "jobs" => $this->db->from("jobs")->limit(6)->results()
        ]);
    }

    #[route(method: route::xhr_get | route::get)]
    public function page($slug)
    {
        $content = Content::getPage($slug);
        $this->view("index", "page", "Efeler Belediyesi - Kariyer Merkezi - $content->title", [
            "menu" => Content::menu(),
            "pageContent" => $content
        ]);
    }

    #[route(method: route::xhr_get | route::get)]
    public function auth()
    {
        if (session_check("user"))
            redirect("/");

        session_remove("tempPin");
        if (session_check("tempPin"))
            redirect("/pin");

        $this->view("index", "auth", lang("login.required"), ["menu" => Content::menu()]);
    }

    #[route(method: route::xhr_post, uri: "auth")]
    public function authAjax()
    {
        if (session_check("user"))
            errorlang("authorize.error");

        $post = Request::post();
        $check = validate($post, [
            "phoneOrEmail" => ["name" => lang("phone.or.email"), "required" => true],
            "password" => ["name" => lang("password"), "required" => true, "min" => 6, "max" => 32],
            "csrf" => ["name" => lang("security.code"), "required" => true]
        ]);

        if ($check)
            error($check);
        elseif (! check_csrf($post->csrf))
            errorlang("csrf.error", scrollTo: true);

        $isEmail = strpos($post->phoneOrEmail, "@");
        if ($isEmail && ! validate_email($post->phoneOrEmail))
            error(lang("validation.email_error"));

        if (! $isEmail && ! validate_phone($post->phoneOrEmail, "tr"))
            error(lang("validation.phone.error", lang("phone.or.email")));

        $password = hash("sha256", $post->password);

        $memberDetail = User::validateAuth($post->phoneOrEmail, $password);
        if (! $memberDetail)
            error(lang("wrong.auth.info"));

        if(!$memberDetail->confirm)
            warning("Giriş yapabilmek için hesabınızı onaylamanız gerekmektedir. <br/><br/> Lütfen E-Posta adresinize gelen hesap onaylama bağlantısını kullanarak hesabınızı onaylayın!");

        #while (User::exists("pin_token", ($pin = join(randomSequence(6)))));

        #User::updateBy("id", $memberDetail->id, ["pin_token" => $pin]);
        #session_set("tempPin", hash("sha256", $pin));

        #disabled for now
        #\SmsHelper::send($memberDetail->phone, "Onay Kodu: ". $pin);
        #success(redirect: "/pin");

        session_regenerate_id(true);

        session_set("user", $memberDetail);
        success(redirect: "/");
    }

    #[route(method: route::xhr_get | route::get)]
    public function contact()
    {
        $this->view("index", "contact", "İletişim", [
            "menu" => Content::menu()
        ]);
    }

    #[route(method: route::xhr_post, uri: "contact")]
    public function contactAjax()
    {
        $post = Request::post();
        $validate = validate($post, [
            "name" => ["name" => "İsim", "required" => true, "min" => 6, "max" => 128],
            "title" => ["name" => "Firma", "required" => true, "min" => 6, "max" => 128],
            "phone" => ["name" => "Telefon", "required" => true, "phone" => true],
            "email" => ["name" => "E-Posta", "required" => true, "min" => 6, "max" => 64, "email" => true],
            "subject" => ["name" => "Konu", "required" => true, "min" => 6, "max" => 255],
            "message" => ["name" => "Mesaj", "required" => true, "min" => 6, "max" => 500, "clear" => true],
        ]);

        if ($validate)
            warning($validate);

        $result = $this->db->from("contacts")->insert((array) $post);
        if ($result)
            success("Görüşleriniz başarılı bir şekilde gönderilmiştir. Teşekkürler.", redirect: "/: 4000");

        getDataError();
    }

    #[route(method: route::xhr_get | route::get)]
    public function logout()
    {
        session_remove("user");
        session_destroy();

        if (Request::isAjax())
            success(redirect: "/");
        else
            redirect("/");
    }

    #[route(method: route::xhr_get | route::get, uri: "forgot-password")]
	function forgotPassword()
	{
		if (session_check("user"))
			redirect("/");

        $this->view("index", "forgot-password", "Şifremi Unuttum", [
            "menu" => Content::menu()
        ]);
	}

	#[route(method: route::xhr_post, uri: "forgot-password")]
	function forgotPasswordAjax()
	{
		if (session_check("user"))
			errorlang("authorize.error");

		$post = Request::post();
		$check = validate($post, [
			"email" => ["name" => lang("email"), "required" => true, "email" => true],
			"csrf" => ["name" => lang("security.code"), "required" => true]
		]);

		if ($check)
			error($check);
		elseif (!check_csrf($post->csrf))
			errorlang("csrf.error", scrollTo: true);

		$detail = $this->db->select("id, name, surname, resetPasswordConfirm, resetPasswordTime")
						->from("users")
						->where("email", "=", $post->email)
						->result();

		if (!$detail)
			errorlang("email.not.exists.error");
		
		$hours = (time() - strtotime($detail->resetPasswordTime)) / 3600;
		if($detail->resetPasswordConfirm && $hours < 1)
			infolang("pw.activation.already.sent");
		
		$resetPasswordConfirm = md5(hash("sha256", $detail->id.generate_password(32)));
		User::updateBy("email", $post->email, [
			"resetPasswordConfirm" => $resetPasswordConfirm, 
			"resetPasswordTime" => date('Y-m-d H:i:s')
		]);

		$activationLink = Request::baseUrl()."/account/password-reset/".$resetPasswordConfirm;
		
        $fullname = $detail->name." ".$detail->surname;
		$content = $this->render("templates/password-reset", [
			"value" => $resetPasswordConfirm,
			"fullname" => $fullname,
			"systemUrl" => Request::baseUrl(),
			"url" => $activationLink,
            "operatingSystem" => get_os(),
            "browserName" => get_browser_name()
		], false);

		Mail::send(lang("reset.password"), $fullname, $post->email, $content);

		successlang("successfully.send.activation");
	}
}