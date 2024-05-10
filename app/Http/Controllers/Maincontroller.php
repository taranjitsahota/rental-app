<?php

namespace App\Http\Controllers;

use App\Models\Mainmodel;
use Illuminate\Http\Request;

class Maincontroller extends Controller
{
    public function dashboard(){
        return view("dashboard");
    }
    public function show(){
        $users['shows'] = Mainmodel::show();
        // dd($users);
        return view('modal.show',$users);
    }
    public function store(Request $request){
        // dd("hey");
        $users = Mainmodel::store($request);
        // dd($users);
        return back();
    }
    public function destroy($id){
        // dd("hey");
        $users = Mainmodel::destroy($id);
        // dd($users);
        return back();
    }
}
