<?php

namespace App\Http\Controllers;
use App\Model\Users;

class HomeController extends Controller
{
    public function index()
    {
//        echo "homeController index";
        $user = new Users();
        /*$user->insert([
            "name" => "Reza",
            "email" => "RezaAghasian76@gmail.com",

        ]);*/
//        $result = $user->find(2);
//        echo $result->name;

//        $user->find(3)->update([
//           'name' => "testUpdate",
//           "email" => "success@gmail.com"
//        ]);

//        $users = $user->get();
//        foreach ($users as $user){
//            echo $user->name.'<br>';
//        }

//        $user->delete(2);

//        $users = $user->where('id','>=',1)->get();
//        foreach ($users as $user) {
//            echo $user->name;
//        }

//        $users = $user->orderby('id','DESC')->get();
//        foreach ($users as $user) {
//            echo $user->name.'<br>';
//        }

//        $users = $user->limit(1,1)->get();
//        foreach ($users as $user) {
//            echo $user->name.'<br>';
//        }


    }
}