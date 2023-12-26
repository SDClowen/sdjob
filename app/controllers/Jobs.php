<?php

namespace App\Controllers;

use Core\{Controller, Request};
use Core\Attributes\route;
use App\Models\{User, Content, Job};
use App\Helpers\Pagination;

class Jobs extends Controller
{
    #[route(method: route::xhr_get | route::get)]
    public function index()
    {
        redirect("/jobs/feed");
    }

    #[route(method: route::xhr_get | route::get | route::post)]
    public function feed($pageNum = 0)
    {
        $totalRows = $this->db->select("count(id)")->from("jobs")->first();
        $perPage = 10;

        $numPages = ceil($totalRows / $perPage);

        $search = null;
        if(Request::isMethod("post"))
        {
            $post = Request::post();
            $validate = validate($post, ["title" => ["name" => "Arama", "required" => true, "clear" => true]]);
            if(!$validate) 
                $search = $post;
        }
        $jobs = Job::allWithEmployers(0, 10000, $search);

        $this->view("index", "jobs", "Efeler Belediyesi - Kariyer Merkezi - İlanlar", [
            "menu" => Content::menu(),
            "user" => User::info(), #if logined
            "jobs" => $jobs,
            "states" => $this->db->from("states")->where("parent", value: 2)->results(),
            "sectors" => $this->db->from("sectors")->results(),
        ]);
    }

    #[route(method: route::xhr_post, uri: "feed")]
    public function feedSearch()
    {
        $search = null;
        if(Request::isMethod("post"))
        {
            $post = Request::post();
            $validate = validate($post, [
                "title" => ["name" => "Arama","clear" => true],
                "stateId" => ["name" => "İlçe", "numeric" => true],
                "knowledge" => ["name" => "Tecrübe", "numeric" => true],
                "workingType" => ["name" => "Çalışma Biçimi", "numeric" => true],
                "educationLevel" => ["name" => "Eğitim Seviyesi", "numeric" => true],
                "position" => ["name" => "Pozisyon", "numeric" => true],
                "sectorId" => ["name" => "Sektör", "numeric" => true],
                "department" => ["name" => "Departman", "numeric" => true],
                "militaryStatus" => ["name" => "Askerlik Durumu", "numeric" => true],
                "gender" => ["name" => "Cinsiyet", "numeric" => true]
            ]);

            if($validate)
                die($validate);

            foreach($post as $k => $v)
                if($v == -1)
                    unset($post->$k);

            $jobs = Job::allWithEmployers(0, 10000, $post);

            $this->render("jobs-listing", [
                "user" => User::info(), #if logined
                "jobs" => $jobs,
            ]);
        }
    }

    #[route(method: route::xhr_get | route::get, session: "user")]
    public function create()
    {
        $user = User::info();
        $this->view("index", "account/crud-job", "Efeler Belediyesi - Kariyer Merkezi - İlan Oluştur", [
            "menu" => Content::menu(),
            "states" => $this->db->from("states")->where("parent", value: 2)->results(),
            "segment" => "create"
        ]);
    }

    #[route(method: route::xhr_get | route::get)]
    public function detail(string $slug)
    {
        $user = User::info();

        $job = Job::getBySlug($slug);
        if (! $job)
            redirect();

        $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
        if (! $pageWasRefreshed)
        {
            Job::updateBy("id", $job->id, ["viewCount" => $job->viewCount + 1]);
            
            $job->viewCount++;
        }


        $dberror = $this->db->lastQuery();
        $applicantCount = $this->db->select("count(id)")->from("jobapplicants")->where("jobId", value: $job->id)->first();

        $this->view("index", "job-detail", "Efeler Belediyesi - Kariyer Merkezi - $job->title", [
            "menu" => Content::menu(),
            "job" => $job,
            "applicantCount" => $applicantCount,
            "user" => $user
        ]);
    }

    #[route(method: route::xhr_get | route::get, session: "user")]
    public function update(int $id)
    {
        $user = User::info();

        $job = Job::get($id);
        if (! $job)
            warning("JOB_DELETING_ERROR");

        if ($user->type != User::EMPLOYER)
            warning("USER_TYPE_ERROR");

        $this->view("index", "account/crud-job", "Efeler Belediyesi - Kariyer Merkezi - İlan Güncelle", [
            "menu" => Content::menu(),
            "states" => $this->db->from("states")->where("parent", value: 2)->results(),
            "job" => $job,
            "segment" => "update/$id"
        ]);
    }

    #[route(method: route::xhr_get | route::get, session: "user")]
    public function applicants($slug)
    {
        $job = Job::getBySlug($slug);
        if (! $job)
            redirect();

        $applicants = $this->db->query("select a.userId, u.name, u.surname, u.email, u.phone, u.photo, ss.name city, sss.name state, a.cv, s.name sector, d.title, j.createdAt from jobapplicants j 
        join applicants a on a.id = j.applicantId 
        join users u on a.userId = u.id 
        join sectors s on s.id = u.sectorId 
        join jobs d on d.id = j.jobId 
        join states ss on ss.id = u.cityId
        join states sss on sss.id = u.stateId
        where j.jobId = $job->id
        ")
            ->results();

        $user = session_get("user");

        if ($user->type != User::EMPLOYER)
            warning("USER_TYPE_ERROR");

        $this->view("index", "account/job-applicants", "Efeler Belediyesi - Kariyer Merkezi - Başvurular", [
            "menu" => Content::menu(),
            "user" => $user,
            "job" => $job,
            "applicants" => $applicants
        ]);
    }

    #[route(method: route::xhr_get | route::get)]
    public function applicant(int $id)
    {
        if (! session_check("user"))
            redirect("/auth");

        $user = User::info();

        $job = Job::get($id);
        if (! $job)
            die("JOB_DELETING_ERROR");

        if ($user->type != User::APPLICANT)
            die("USER_TYPE_ERROR");

        $isApplicant = $this->db->from("jobapplicants")->where("jobId", value: $id)->where("applicantId", value: $user->detail->id)->first();
        if ($isApplicant)
            die("ALREADY_APPLICANT");

        $result = $this->db->from("jobapplicants")->insert([
            "applicantId" => $user->detail->id,
            "jobId" => $job->id
        ]);

        if ($result)
            die('
                <a href="#" onclick="return false" class="mr-3 flex items-center justify-center px-4 py-2 font-medium text-white rounded-lg bg-gray-400 dark:bg-gray-600">
                    <svg viewBox="0 0 24 24" class="h-3.5 w-3.5 mr-2 -ml-1" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z" fill="currentColor"></path> </g></svg>
                    Başvuruldu
                </a>
            ');

        getDataError();
    }

    #[route(method: route::xhr_post, uri: "create", session: "user")]
    public function createAjax()
    {
        $post = Request::post();

        $validate = validate($post, [
            "title" => ["name" => "İlan Başlığı", "required" => true, "min" => 2, "max" => 254],
            "knowledge" => ["name" => "Tecrübe", "required" => true, "numeric" => true, "min" => 0, "max" => 3],
            "educationLevel" => ["name" => "Eğitim Düzeyi", "required" => true, "numeric" => true, "min" => 0, "max" => 2],
            "militaryStatus" => ["name" => "Askerlik Durumu", "required" => true, "numeric" => true, "min" => 0, "max" => 2],
            "workingType" => ["name" => "Çalışma Şekli", "required" => true, "numeric" => true, "min" => 0, "max" => 1],
            "gender" => ["name" => "Cinsiyet", "required" => true, "numeric" => true, "min" => 0, "max" => 1],
            "stateId" => ["name" => "Bölge", "required" => true, "numeric" => true],
            "description" => ["name" => "İlan Detayı", "required" => true, "min" => 2, "max" => 65535],
        ]);

        if ($validate)
            warning($validate);

        $user = User::info();

        if ($user->type != User::EMPLOYER)
            warning("USER_TYPE_ERROR");

        $data = [
            "employerId" => $user->detail->id,
            "title" => $post->title,
            "knowledge" => $post->knowledge,
            "educationLevel" => $post->educationLevel,
            "militaryStatus" => $post->militaryStatus,
            "workingType" => $post->workingType,
            "gender" => $post->gender,
            "stateId" => $post->stateId,
            "description" => $post->description
        ];

        $result = $this->db->from("jobs")->insert($data);

        if ($result)
            success(redirect: "/account/jobs");

        getDataError();
    }

    #[route(method: route::xhr_post, uri: "update", session: "user")]
    public function updateAjax(int $id)
    {
        $post = Request::post();

        $validate = validate($post, [
            "title" => ["name" => "İlan Başlığı", "required" => true, "min" => 2, "max" => 254],
            "knowledge" => ["name" => "Tecrübe", "required" => true, "numeric" => true, "min" => 0, "max" => 3],
            "educationLevel" => ["name" => "Eğitim Düzeyi", "required" => true, "numeric" => true, "min" => 0, "max" => 2],
            "militaryStatus" => ["name" => "Askerlik Durumu", "required" => true, "numeric" => true, "min" => 0, "max" => 2],
            "workingType" => ["name" => "Çalışma Şekli", "required" => true, "numeric" => true, "min" => 0, "max" => 1],
            "gender" => ["name" => "Cinsiyet", "required" => true, "numeric" => true, "min" => 0, "max" => 1],
            "stateId" => ["name" => "Bölge", "required" => true, "numeric" => true],
            "description" => ["name" => "İlan Detayı", "required" => true, "min" => 2, "max" => 65535],
        ]);

        if ($validate)
            warning($validate);

        $user = User::info();

        $data = [
            "employerId" => $user->detail->id,
            "title" => $post->title,
            "knowledge" => $post->knowledge,
            "educationLevel" => $post->educationLevel,
            "militaryStatus" => $post->militaryStatus,
            "workingType" => $post->workingType,
            "gender" => $post->gender,
            "stateId" => $post->stateId,
            "description" => $post->description
        ];

        $job = Job::get($id);
        if (! $job)
            warning("JOB_DELETING_ERROR");

        if ($user->type != User::EMPLOYER)
            warning("USER_TYPE_ERROR");

        $result = $this->db->from("jobs")->where("id", "=", $id)->update($data);

        if ($result)
            success(redirect: "/account/jobs");

        getDataError();
    }

    #[route(method: route::xhr_get, session: "user")]
    public function remove(int $id)
    {
        $job = Job::get($id);
        if (! $job)
            warning("JOB_DELETING_ERROR");

        $user = session_get("user");
        if ($user->type != User::EMPLOYER)
            warning("USER_TYPE_ERROR");

        if (Job::delete($id, $user->detail->id))
            success();

        getDataError();
    }

    #[route(method: route::xhr_get | route::get, session: "user")]
    public function show(int $id)
    {
        $user = User::info();

        $job = Job::get($id);
        if (! $job)
            redirect();

        $this->view("index", "account/view-job", "Efeler Belediyesi - Kariyer Merkezi - $job->title", [
            "menu" => Content::menu(),
            "job" => $job,
            "states" => $this->db->from("states")->where("parent", value: 2)->results()
        ]);
    }
}