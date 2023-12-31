<?php

namespace App\Controllers;

use Core\{Controller, Request, Cookie};
use Core\Attributes\route;
use App\Models\{User, Content, Job};
use Verot\Upload\Upload;

class Account extends Controller
{
    #[route(method: route::xhr_get | route::get, session: "user")]
    public function index()
    {
        $user = session_get("user");
        $file = "account/employer";
        if ($user->type == 1)
            $file = "account/applicant";

        $this->view("index", $file, "Efeler Belediyesi - Kariyer Merkezi - Hesabım", [
            "menu" => Content::menu()
        ]);
    }

    #[route(method: route::xhr_post, session: "user", uri: "photo")]
    public function profilePhotoUpload()
    {
        $input = Request::files();

        if (isset($input->photo) && $input->photo->name) {
            $language = Cookie::instance()->get("lang");
            if ($language == "en_US")
                $language = "en_GB";

            $upload = new Upload($input->photo->tmp_name, $language);
            if ($upload->uploaded) {

                $fileName = gen_pw() . mt_rand(10000, PHP_INT_MAX) . User::id();

                $upload->allowed = array('image/*');
                $upload->file_new_name_body = $fileName;
                $upload->image_convert = "png";
                $upload->process(ROOT_DIR . '/public/users');

                if ($upload->processed) {

                    if ($upload->image_src_x >= 100) {
                        $upload->file_new_name_body = $fileName;
                        $upload->image_convert = "png";
                        $upload->image_resize = true;
                        $upload->image_x = 250;
                        $upload->image_ratio_y = true;
                        $upload->process(ROOT_DIR . '/public/users/thumbnail');
                    }

                    $photo = $upload->file_dst_name;

                    $result = User::update([
                        "photo" => $photo
                    ]);

                    $user = User::info();
                    $user->photo = $photo;
                    session_set("user", $user);

                    if($result)
                        success();
                } else {
                    warning($upload->error);
                }

                $upload->clean();
            }
        }
    }

    #[route(method: route::xhr_get | route::get, session: "user")]
    public function detail()
    {
        $this->view("index", "account/detail", "Efeler Belediyesi - Kariyer Merkezi - Hesabım", [
            "user" => session_get("user"),
            "menu" => Content::menu(),
            "sectors" => $this->db->from("sectors")->results()
        ]);
    }

    #[route(method: route::xhr_get | route::get, session: "user")]
    public function cv(int $userId)
    {
        $user = session_get("user");
        $this->view("index", "account/cv", "Efeler Belediyesi - Kariyer Merkezi - $user->name $user->surname - CV", [
            "user" => $user,
            "menu" => Content::menu(),
            "cv" => $this->db->select("cv")->from("applicants")->where("userId", value: $userId)->first()
        ]);
    }

    #[route(method: route::xhr_post, session: "user", uri:"cv")]
    public function cvUpload()
    {
        $input = Request::files();

        if (isset($input->cv) && $input->cv->name) {
            $language = Cookie::instance()->get("lang");
            if ($language == "en_US")
                $language = "en_GB";

            $upload = new Upload($input->cv->tmp_name, $language);
            if ($upload->uploaded) {

                $fileName = gen_pw() . mt_rand(10000, PHP_INT_MAX) . User::id();

                $upload->allowed = array('application/pdf');
                $upload->file_new_name_body = $fileName;
                $upload->process(ROOT_DIR . '/public/cv');

                if ($upload->processed) {

                    $cv = $upload->file_dst_name;

                    $user = User::info();
                    $result = $this->db->from("applicants")->where("id", value: $user->detail->id)->update(["cv" => $cv]);

                    if($result)
                    {
                        $user->detail->cv = $cv;
                        session_set("user", $user);
                        success(refresh: true);
                    }

                } else {
                    warning($upload->error);
                }

                $upload->clean();
            }
        }
    }

    #[route(method: route::xhr_get | route::get, session: "user")]
    public function jobs()
    {
        $user = session_get("user");

        if ($user->type != User::EMPLOYER)
            warning("USER_TYPE_ERROR");

        $this->view("index", "account/jobs", "Efeler Belediyesi - Kariyer Merkezi - İlanlar", [
            "menu" => Content::menu(),
            "user" => $user,
            "jobs" => Job::all($user->detail->id)
        ]);
    }

    #[route(method: route::xhr_post, uri: "save-tab-acc", session: "user")]
    public function saveTabAccAjax()
    {
        $post = Request::post();

        $validate = validate($post, [
            "name" => ["name" => "Adı", "required" => true, "min" => 2, "max" => "64"],
            "surname" => ["name" => "Soyadı", "required" => true, "min" => 2, "max" => "64"],
            "about" => ["name" => "Şirket Adresi", "required" => true, "min" => 6, "max" => 255],
        ]);

        if ($validate)
            warning($validate);

        $result = User::update([
            "name" => $post->name,
            "surname" => $post->surname,
            "about" => $post->about,
        ]);

        if ($result) {
            $user = session_get("user");
            $user->name = $post->name;
            $user->surname = $post->surname;
            $user->about = $post->about;

            session_set("user", $user);
            success("Hesap başarılı bir şekilde güncellendi.");
        }

        getDataError();
    }

    #[route(method: route::xhr_post, uri: "save-tab-company", session: "user")]
    public function saveTabCompanyAjax()
    {
        $post = Request::post();

        $validate = validate($post, [
            "sectorId" => ["name" => "Sektör", "required" => true, "numeric" => true],
            "name" => ["name" => "Şirket Adı", "required" => true, "min" => 2, "max" => 128],
            "title" => ["name" => "Şirket Ünvanı", "required" => true, "min" => 2, "max" => 128],
            "address" => ["name" => "Şirket Adresi", "required" => true, "min" => 6, "max" => 255],
            "taxOffice" => ["name" => "Vergi Dairesi", "min" => 6, "max" => 255],
            "taxNo" => ["name" => "Vergi No", "min" => 8, "max" => 24],
            "description" => ["name" => "Şirket Adresi", "required" => true, "min" => 6, "max" => 1024],
        ]);

        if ($validate)
            warning($validate);

        $user = User::info();

        $data = [
            "name" => $post->name,
            "title" => $post->title,
            "address" => $post->address,
            "taxOffice" => $post->taxOffice,
            "taxNo" => $post->taxNo,
            "description" => $post->description,
        ];

        $result = $this->db->from("employers")->where("id", "=", $user->detail->id)->update($data);

        if ($result) {

            if ($user->sectorId != $post->sectorId) {
                User::update([
                    "sectorId" => $post->sectorId
                ]);
            }

            $data["id"] = $user->detail->id;

            $user->detail = (object) $data;

            session_set("user", $user);
            success("Firma başarılı bir şekilde güncellendi.");
        }

        getDataError();
    }

    #[route(method: route::xhr_post, uri: "change-password", session: "user")]
    public function changePassword()
    {
        $post = Request::post();
        $validate = validate($post, [
            "password" => ["name" => lang("password"), "required" => true, "min" => 6, "max" => 32],
            "newPassword" => ["name" => lang("new.password"), "required" => true, "min" => 6, "max" => 32, "no-match" => "password"],
            "newPasswordConfirm" => ["name" => lang("new.password.confirm"), "required" => true, "min" => 6, "max" => 32, "match" => "newPassword"]
        ]);

        if ($validate)
            warning($validate);

        $post->password = hash("sha256", $post->password);
        $post->newPassword = hash("sha256", $post->newPassword);

        $info = User::info();

        if ($post->password != $info->password)
            warninglang("password.not.correct");
        elseif ($post->newPassword == $info->prevPassword)
            warninglang("password.used.before");

        $result = User::update([
            "prevPassword" => $info->password,
            "password" => $post->newPassword
        ]);

        if ($result) {
            session_remove("user");
            session_destroy();
            successlang("password.successfully.changed", redirect: "/auth:2000");
        }

        getDataError();
    }

    
	#[route(uri: "password-reset")]
	function passwordReset(string $emailConfirm)
	{
		if (session_check("user"))
			redirect("/");

		if(!alpha_dash($emailConfirm))
			die(lang("server.respond.error"));

		if(strlen($emailConfirm) != 32)
			debug("Invalid code!");

		$found = User::exists("resetPasswordConfirm", $emailConfirm);
		if(!$found)
			debug("Invalid password confirm code!");

		$this->render("password-reset", [
			lang("password.reset"),
			"emailConfirm" => $emailConfirm
		]);
	}

	#[route(method: route::xhr_post, uri: "password-reset")]
	public function passwordResetAjax()
	{
		$post = Request::post();
		
		$validate = validate($post, [
			"code" => ["name" => "Kod", "required" => true, "min" => 32, "max" => 32],
            "email" => ["name" => "E-Posta", "required" => true, "min" => 6, "max" => 64, "email" => true],
			"password" => ["name" => lang("new.password"), "required" => true, "min" => 6, "max" => 32],
			"confirmPassword" => ["name" => lang("new.password.again"), "required" => true, "min" => 6, "max" => 32, "match" => "password"],
			"csrf" => ["name" => lang("security.code"), "required" => true]
		]);

		if($validate)
			warning($validate);
        
        if(!User::exists("email", $post->email))
			errorlang("email.not.exists.error");

		$post->password = hash("sha256", $post->password);

		$result = User::updateBy("resetPasswordConfirm", $post->code, [
			"resetPasswordConfirm" => "",
			"prevPassword" => '',
			"password" => $post->password
		]);

		if($result)
		{
			session_destroy();
			successlang("password.successfully.changed", redirect: "/auth:2000");
		}

		getDataError();
	}

    public function approve(string $confirmCode)
    {
        $confirmCode = htmlentities(htmlspecialchars($confirmCode));
        if(User::exists("confirmCode", $confirmCode))
        {
            User::updateBy("confirmCode", $confirmCode, [
                "confirm" => 1
            ]);

            redirect("/auth");
        }

        redirect();
    }
}