<?php

namespace App\Controllers\Admin;

use Core\{Controller, Request, Config};
use Core\Attributes\route;
use App\Models\{User, Content};

class Account extends Controller
{
    #[route(method: route::xhr_get | route::get, session: "admin", otherwise: "/admin/auth")]
	public function index()
	{
        $user = session_get("admin");

		$this->view("admin/index", "admin/home", "Yönetici Paneli", [
            "user" => $user,
            "userCount" => $this->db->select("count(id)")->from("users")->first(),
            "jobCount" => $this->db->select("count(id)")->from("jobs")->first(),
            "jobApplicantsCount" => $this->db->select("count(id)")->from("jobapplicants")->first()
        ]);
	}

    #[route(method: route::xhr_post, session: "admin", otherwise: "/admin/auth")]
	public function users()
    {
        $users = $this->db->select("users.*, sectors.name sectorName")->from("users")->join("sectors", "users.sectorId = sectors.id")->results();
        $results = [];

        foreach($users as $key => $user)
        {
            $results[$key] = [
                '
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-10 h-10">
                            <img class="w-10 h-10 rounded-full" src="/public/users/'.($user->photo ?? "no-photo.jpg").'">
                        </div>

                        <div class="ml-4">
                            <div class="text-sm font-medium leading-5 text-gray-900">'.$user->name.' '.$user->surname.'
                            </div>
                            <div class="text-sm leading-5 text-gray-500">'.$user->email.'</div>
                        </div>
                    </div>
                ',
                '<div class="text-sm leading-5 text-gray-900">'.$user->sectorName.'</div>',
                '<div class="text-sm leading-5 text-gray-500">'.(!empty($user->about) ? shortText($user->about ?? '', 4, '...') : 'Bilgi Yok').'</div>',
                '<span class="inline-flex px-2 text-sm font-semibold leading-5 rounded-full" style="color: '.($user->confirm ? '#49734b' : '#fff').'; background:'.($user->confirm ? '#abffae' : '#ff756b').'">'.($user->confirm ? 'Aktif' : 'Pasif').'</span>',
                '<div class="text-sm leading-5 text-gray-500">'.($user->type ? "Aday" : "İş Veren").'</div>',
                '<a href="#" class="text-red-600 hover:text-red-900">Düzenle</a>'
            ]; 
        }

		die(data_json([
            "data" => $results
        ]));
    }
}