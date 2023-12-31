<?php

namespace App\Controllers;

use Core\{Controller, Request};
use Core\Attributes\route;
use App\Models\{User, Content};

class Register extends Controller
{
    #[route(method: route::xhr_get | route::get)]
    public function index()
    {
        if (session_check("user"))
            redirect("/");

        session_remove("tempPin");
        if (session_check("tempPin"))
            redirect("/pin");

        $this->view("index", "register", lang("register"), [
            "menu" => Content::menu()
        ]);
    }

    #[route(method: route::xhr_get | route::get)]
    public function applicant()
    {
        if (session_check("user"))
            redirect("/");

        session_remove("tempPin");
        if (session_check("tempPin"))
            redirect("/pin");

        $this->view("index", "applicant.register", lang("applicant.register"), [
            "states" => $this->db->from("states")->where("parent", value: 2)->results(),
            "sectors" => $this->db->from("sectors")->results(),
            "menu" => Content::menu()
        ]);
    }

    #[route(method: route::xhr_get | route::get)]
    public function employer()
    {
        if (session_check("user"))
            redirect("/");

        session_remove("tempPin");
        if (session_check("tempPin"))
            redirect("/pin");

        $this->view("index", "employer.register", lang("employer.register"), [
            "states" => $this->db->from("states")->where("parent", value: 2)->results(),
            "sectors" => $this->db->from("sectors")->results(),
            "menu" => Content::menu()
        ]);
    }

    #[route(method: route::xhr_post, uri: "applicant")]
    public function applicantAjax()
    {
        if (session_check("user"))
            warning(redirect: "/");

        session_remove("tempPin");
        if (session_check("tempPin"))
            warning(redirect: "/pin");

        $post = Request::post();
        $validate = validate($post, [
            "name" => ["name" => "İsim", "required" => true, "min" => 3, "max" => 255],
            "surname" => ["name" => "Soyisim", "required" => true, "min" => 3, "max" => 255],
            "email" => ["name" => "E-Posta", "required" => true, "min" => 6, "max" => 255, "email" => true],
            "phone" => ["name" => "Telefon", "required" => true, "phone" => true],
            "stateId" => ["name" => "İlçe", "required" => true, "numeric" => true],
            "sectorId" => ["name" => "Sektör", "required" => true, "numeric" => true],
            "password" => ["name" => "Şifre", "required" => true, "min" => 6, "max" => 48],
            "passwordRepeat" => ["name" => "Şifre Tekrar", "required" => true, "min" => 6, "max" => 48, "match" => "password"]
        ]);

        if ($validate)
            warning($validate);

        if (! isset($post->privacy))
            warning(lang("validation.checked_error", "Gizlilik Politikası"));

        unset($post->passwordRepeat, $post->privacy);

        if (User::exists("email", $post->email))
            warninglang("email.exists.error");

        $createdId = User::create($post, User::APPLICANT);
        if ($createdId) {
            if (\Core\Config::get()->accountActivation) {

                $confirmCode = md5(hash("sha256", $createdId . generate_password(32)));
                User::updateBy("email", $post->email, [
                    "confirmCode" => $confirmCode
                ]);

                $activationLink = Request::baseUrl() . "/account/approve/" . $confirmCode;

                $fullname = $post->name . " " . $post->surname;
                $content = $this->render("templates/account-approve", [
                    "value" => $confirmCode,
                    "fullname" => $fullname,
                    "systemUrl" => Request::baseUrl(),
                    "url" => $activationLink,
                    "operatingSystem" => get_os(),
                    "browserName" => get_browser_name()
                ], false);

                \App\Helpers\Mail::send(lang("account.approve"), $fullname, $post->email, $content);
                success("Başarıyla kayıt oldunuz. Lütfen E-Posta adresinizi kontrol ederek hesap onaylama işlemini gerçekleştiriniz!", redirect: "/auth:5000");
            }

            success("Kayıt işlemi başarıyla gerçekleştirildi...", redirect: "/auth:2500");
        }

        getDataError();
    }


    #[route(method: route::xhr_post, uri: "employer")]
    public function employerAjax()
    {
        if (session_check("user"))
            warning(redirect: "/");

        session_remove("tempPin");
        if (session_check("tempPin"))
            warning(redirect: "/pin");

        $post = Request::post();
        $validate = validate($post, [
            "name" => ["name" => "İsim", "required" => true, "min" => 3, "max" => 255],
            "surname" => ["name" => "Soyisim", "required" => true, "min" => 3, "max" => 255],
            "email" => ["name" => "E-Posta", "required" => true, "min" => 6, "max" => 255, "email" => true],
            "phone" => ["name" => "Telefon", "required" => true, "phone" => true],
            "stateId" => ["name" => "İlçe", "required" => true, "numeric" => true],
            "sectorId" => ["name" => "Sektör", "required" => true, "numeric" => true],
            "companyName" => ["name" => "Şirket Adı", "required" => true, "min" => 2, "max" => 128],
            "companyTitle" => ["name" => "Şirket Ünvanı", "required" => true, "min" => 2, "max" => 128],
            "companyAddress" => ["name" => "Şirket Adresi", "required" => true, "min" => 6, "max" => 255],
            "taxOffice" => ["name" => "Vergi Dairesi", "min" => 6, "max" => 255],
            "taxNo" => ["name" => "Vergi No", "min" => 8, "max" => 24],
            "password" => ["name" => "Şifre", "required" => true, "min" => 6, "max" => 48],
            "passwordRepeat" => ["name" => "Şifre Tekrar", "required" => true, "min" => 6, "max" => 48, "match" => "password"]
        ]);

        if ($validate)
            warning($validate);

        if (! isset($post->privacy))
            warning(lang("validation.checked_error", "Gizlilik Politikası"));

        unset($post->passwordRepeat, $post->privacy);

        if (User::exists("email", $post->email))
            warninglang("email.exists.error");

        $createdId = User::create($post, User::EMPLOYER);
        if ($createdId) {
            if (\Core\Config::get()->accountActivation) {

                $confirmCode = md5(hash("sha256", $createdId . generate_password(32)));
                User::updateBy("email", $post->email, [
                    "confirmCode" => $confirmCode
                ]);

                $activationLink = Request::baseUrl() . "/account/approve/" . $confirmCode;

                $fullname = $post->name . " " . $post->surname;
                $content = $this->render("templates/account-approve", [
                    "value" => $confirmCode,
                    "fullname" => $fullname,
                    "systemUrl" => Request::baseUrl(),
                    "url" => $activationLink,
                    "operatingSystem" => get_os(),
                    "browserName" => get_browser_name()
                ], false);

                \App\Helpers\Mail::send(lang("account.approve"), $fullname, $post->email, $content);
                success("Başarıyla kayıt oldunuz. Lütfen E-Posta adresinizi kontrol ederek hesap onaylama işlemini gerçekleştiriniz!", redirect: "/auth:5000");
            }

            success("Kayıt işlemi başarıyla gerçekleştirildi...", redirect: "/auth:2500");
        }

        getDataError();
    }
}