<?php

namespace App\Http\Controllers;
use App\Model\Users;

class HomeController extends Controller
{
    public function index()
    {
//        echo "homeController index";
        $user = new Users();
        $user->insert([
            "name" => "Reza",
            "email" => "RezaAghasian76@gmail.com",

        ]);
        return $user;
    }
}