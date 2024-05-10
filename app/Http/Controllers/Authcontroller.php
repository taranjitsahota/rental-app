<?php

namespace App\Http\Controllers;

use App\Models\Authmodel;
use Illuminate\Http\Request;

class Authcontroller extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function loginpost(Request $request){
        $users = Authmodel::loginpost($request);
        return $users;
    }
}
