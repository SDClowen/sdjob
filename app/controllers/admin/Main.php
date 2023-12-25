<?php

namespace App\Controllers\Admin;

use Core\{Controller, Request, Config};
use Core\Attributes\route;
use App\Models\{User, Content};

class Main extends Controller
{
    #[route(method: route::xhr_get | route::get, session: "admin", otherwise: "/admin/auth")]
	public function index()
	{
        $user = session_get("admin");

		$this->view("admin/index", "admin/home", "Yönetici Paneli", [
            "user" => $user
        ]);
	}


    #[route(method: route::xhr_get | route::get)]
	public function auth()
    {
        if (session_check("admin"))
            redirect("/admin");

        $this->render("admin/auth", [
            "title" => lang("login.required")
        ]);
    }
    
    #[route(method: route::xhr_post, uri: "auth")]
    public function authAjax()
    {
        if (session_check("admin"))
            errorlang("authorize.error");

        $post = Request::post();
        $check = validate($post, [
            "email" => ["name" => "E-Posta", "required" => true, "min" => 6, "max" => 32],
            "password" => ["name" => lang("password"), "required" => true, "min" => 6, "max" => 32],
            "csrf" => ["name" => lang("security.code"), "required" => true]
        ]);

        if ($check)
            error($check);
        elseif (! check_csrf($post->csrf))
            errorlang("csrf.error", scrollTo: true);

        $isEmail = strpos($post->email, "@");
        if ($isEmail && ! validate_email($post->email))
            error(lang("validation.email_error"));

        $password = hash("sha256", $post->password);

        $memberDetail = User::validateAuth($post->email, $password, 1);
        if (!$memberDetail)
            error(lang("wrong.auth.info"));

        session_regenerate_id(true);

        session_set("admin", $memberDetail);
        success(redirect: "/admin");
    }

    #[route(method: route::xhr_get | route::get)]
	public function logout()
    {
        session_remove("admin");
        session_destroy();
        
        if(Request::isAjax())
            success(redirect:"/admin");
        else
            redirect("/");
    }

    #[route(method: route::xhr_get | route::get, session: "admin", otherwise: "/admin/auth", uri: "user-settings")]
	public function userSettings()
    {
		$this->view("admin/index", "admin/user-settings", "Yönetici Paneli", [
            "user" => session_get("admin")
        ]);
    }

    
    #[route(method: route::xhr_post, uri: "user-settings", session: "admin", otherwise: "/admin/auth")]
    public function userSettingsAjax()
    {
        $post = Request::post();
        $check = validate($post, [
            "email" => ["name" => "E-Posta", "required" => true, "min" => 6, "max" => 64],
            "password" => ["name" => "Şifre", "required" => true, "min" => 6, "max" => 64],
            "newPassword" => ["name" => "Yeni Şifre", "required" => true, "min" => 6, "max" => 64, "no-match" => "password"],
            "repeatPassword" => ["name" => "Şifre Onayı", "required" => true, "min" => 6, "max" => 64, "match" => "newPassword"]
        ]);

        if($check)
            warning($check);

        $post->password = hash("sha256", $post->password);
        $post->newPassword = hash("sha256", $post->newPassword);

        $info = User::info();

        if ($post->password != $info->password)
            warninglang("password.not.correct");
        elseif ($post->newPassword == $info->prevPassword)
            warninglang("password.used.before");

        $result = User::update([
            "email" => $post->email,
            "prevPassword" => $post->password,
            "password" => $post->newPassword
        ]);

        if ($result) {
            session_remove("admin");
            session_destroy();
            successlang("password.successfully.changed", redirect: "/auth:2000");
        }

        getDataError();
    }    

    #[route(method: route::xhr_get | route::get, session: "admin", otherwise: "/admin/auth")]
	public function settings()
    {
		$this->view("admin/index", "admin/settings", "Yönetici Paneli", [
            "user" => session_get("admin"),
            "config" => Config::get()
        ]);
    }
    
    #[route(method: route::xhr_post, uri: "settings", session: "admin", otherwise: "/admin/auth")]
    public function settingsAjax()
    {
        $post = Request::post();
        $check = validate($post, [
            "title" => ["name" => "Site Başlığı", "required" => true, "min" => 4, "max" => 64],
            "keywords" => ["name" => "Anahtar Kelimeler", "required" => true, "min" => 6, "max" => 250],
            "description" => ["name" => "Site Açıklaması", "required" => true, "min" => 6, "max" => 250]
        ]);

        if($check)
            warning($check);

        $config = Config::get();
        $config->title = $post->title;
        $config->keywords = $post->keywords;
        $config->description = $post->description;
        $config->update();
    }
    
    #[route(method: route::xhr_get | route::get, session: "admin", otherwise: "/admin/auth")]
	public function contacts()
    {
		$this->view("admin/index", "admin/contacts", "Yönetici Paneli", [
            "user" => session_get("admin"),
            "contacts" => $this->db->from("contacts")->results()
        ]);
    }
    
    #[route(method: route::xhr_get | route::get, uri: "contact-view", session: "admin", otherwise: "/admin/auth")]
	public function contactView(int $id)
    {
        $result = $this->db->from("contacts")->where("id", "=", $id)->result();
        
		$this->view("admin/index", "admin/contact-view", $result->subject, [
            "user" => session_get("admin"),
            "contact" => $result
        ]);
    }

    #[route(method: route::xhr_get | route::get, uri: "contact-delete", session: "admin", otherwise: "/admin/auth")]
	public function contactDelete(int $id)
    {
        $result = $this->db->from("contacts")->where("id", "=", $id)->delete();
        if($result)
            success();

        getDataError();
    }
    
    #[route(method: route::xhr_get | route::get, session: "admin", otherwise: "/admin/auth")]
	public function categories()
    {
		$this->view("admin/index", "admin/categories", "Yönetici Paneli", [
            "user" => session_get("admin"),
            "categories" => Content::categories()
        ]);
    }
    
    #[route(method: route::xhr_get | route::get, session: "admin", otherwise: "/admin/auth")]
	public function pages()
    {
		$this->view("admin/index", "admin/pages", "Yönetici Paneli", [
            "user" => session_get("admin"),
            "pages" => Content::pages()
        ]);
    }

    #[route(method: route::xhr_get | route::get, uri:"add-page", session: "admin", otherwise: "/admin/auth")]
	public function addPage()
    {
		$this->view("admin/index", "admin/crud-page", "Yönetici Paneli - Sayfa Oluştur", [
            "user" => session_get("admin"),
            "categories" => Content::categories(),
            "segment" => "add-page"
        ]);
    }
    
    #[route(method: route::xhr_post, uri: "add-page", session: "admin", otherwise: "/admin/auth")]
    public function addPageAjax()
    {
        $post = Request::post();
        $check = validate($post, [
            "title" => ["name" => "Sayfa Başlığı", "required" => true, "min" => 4, "max" => 255, "clear" => true],
            "content" => ["name" => "Sayfa İçeriği", "required" => true, "clear" => true],
            "pageTopTitle" => ["name" => "Sayfa Üst Başlığı", "required" => true, "clear" => true],
            "pageTopSubTitle" => ["name" => "Sayfa Alt Başlığı", "required" => true, "clear" => true],
            "category" => ["name" => "Sayfa Kategorisi", "required" => true, "numeric" => true],
        ]);

        if($check)
            warning($check);

        if($post->category != 0)
        {
            $checkCategoryExists = $this->db->select("count(id)")->from("categories")->where("id", "=", $post->category)->first();
            if(!$checkCategoryExists)
                warning("Böyle bir kategori bulunamadı!");
        }

        $result = $this->db->from("pages")->insert([
            "title" => $post->title,
            "category" => $post->category,
            "pageTopTitle" => $post->pageTopTitle,
            "pageTopSubTitle" => $post->pageTopSubTitle,
            "content" => $post->content,
            "slug" => slugify($post->title)
        ]);

        if($result)
            success(redirect: "/admin/pages");

        getDataError();
    }

    #[route(method: route::xhr_get | route::get, uri:"update-page", session: "admin", otherwise: "/admin/auth")]
	public function updatePage(int $id)
    {
        if(!Content::exists("id", $id, Content::PAGE))
            redirect("/admin");

		$this->view("admin/index", "admin/crud-page", "Yönetici Paneli - Sayfa Düzenle", [
            "user" => session_get("admin"),
            "categories" => Content::categories(),
            "page" => Content::getContent($id, Content::PAGE),
            "segment" => "update-page/$id"
        ]);
    }
    
    #[route(method: route::xhr_post, uri: "update-page", session: "admin", otherwise: "/admin/auth")]
    public function updatePageAjax(int $id)
    {
        $post = Request::post();
        $check = validate($post, [
            "title" => ["name" => "Sayfa Başlığı", "required" => true, "min" => 4, "max" => 255, "clear" => true],
            "content" => ["name" => "Sayfa İçeriği", "required" => true, "clear" => true],
            "pageTopTitle" => ["name" => "Sayfa Üst Başlığı", "clear" => true],
            "pageTopSubTitle" => ["name" => "Sayfa Alt Başlığı", "clear" => true],
            "category" => ["name" => "Kategori", "required" => true, "numeric" => true],
        ]);

        if($check)
            warning($check);

        if($post->category != 0)
        {
            $checkCategoryExists = $this->db->select("count(id)")->from("categories")->where("id", "=", $post->category)->first();
            if(!$checkCategoryExists)
                warning("Böyle bir kategori bulunamadı!");
        }

        $result = Content::update($id, [
            "title" => $post->title,
            "category" => $post->category,
            "pageTopTitle" => $post->pageTopTitle,
            "pageTopSubTitle" => $post->pageTopSubTitle,
            "content" => $post->content,
            "slug" => slugify($post->title)
        ],
        Content::PAGE);

        if($result)
            success(redirect: "/admin/pages");

        getDataError();
    }

    #[route(method: route::xhr_get, uri:"delete-page", session: "admin", otherwise: "/admin/auth")]
	public function deletePage(int $id)
    {
        $result = Content::delete($id, Content::PAGE);
        if($result)
            success();

        getDataError();
    }

    #[route(method: route::xhr_get | route::get, uri:"add-category", session: "admin", otherwise: "/admin/auth")]
	public function addCategory()
    {
		$this->view("admin/index", "admin/crud-category", "Yönetici Paneli", [
            "user" => session_get("admin"),
            "categories" => Content::categories(),
            "segment" => "add-category"
        ]);
    }
    
    #[route(method: route::xhr_post, uri: "add-category", session: "admin", otherwise: "/admin/auth")]
    public function addCategoryAjax()
    {
        $post = Request::post();
        $check = validate($post, [
            "title" => ["name" => "Kategori Başlığı", "required" => true, "min" => 4, "max" => 64],
            "parentId" => ["name" => "Üst Kategori", "required" => true, "numeric" => true],
        ]);

        if($check)
            warning($check);

        if($post->parentId != 0)
        {
            $checkCategoryExists = $this->db->select("count(id)")->from("categories")->where("id", "=", $post->parentId)->first();
            if(!$checkCategoryExists)
                warning("Böyle bir kategori bulunamadı!");

        }

        $result = $this->db->from("categories")->insert([
            "title" => $post->title,
            "parentId" => $post->parentId
        ]);

        if($result)
            success(redirect: "/admin/categories");

        getDataError();
    }
    
    #[route(method: route::xhr_get | route::get, uri:"update-category", session: "admin", otherwise: "/admin/auth")]
	public function updateCategory(int $id)
    {
		$this->view("admin/index", "admin/crud-category", "Yönetici Paneli", [
            "user" => session_get("admin"),
            "categories" => Content::categories(),
            "category" => Content::getContent($id, Content::CATEGORY),
            "segment" => "update-category/$id"
        ]);
    }
    
    #[route(method: route::xhr_get, uri:"delete-category", session: "admin", otherwise: "/admin/auth")]
	public function deleteCategory(int $id)
    {
        $result = Content::delete($id, Content::CATEGORY);
        if($result)
            success();

        getDataError();
    }

    #[route(method: route::xhr_post, uri: "update-category", session: "admin", otherwise: "/admin/auth")]
    public function updateCategoryAjax(int $id)
    {
        $post = Request::post();
        $check = validate($post, [
            "title" => ["name" => "Kategori Başlığı", "required" => true, "min" => 4, "max" => 64],
            "parentId" => ["name" => "Üst Kategori", "required" => true, "numeric" => true],
        ]);

        if($check)
            warning($check);

        if($post->parentId != 0)
        {
            $checkCategoryExists = $this->db->select("count(id)")->from("categories")->where("id", "=", $post->parentId)->first();
            if(!$checkCategoryExists)
                warning("Böyle bir kategori bulunamadı!");

        }

        $result = $this->db->from("categories")->where("id", "=", $id)->update([
            "title" => $post->title,
            "parentId" => $post->parentId
        ]);

        if($result)
            success(redirect: "/admin/categories");

        getDataError();
    }
}