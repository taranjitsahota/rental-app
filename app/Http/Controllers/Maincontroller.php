<?php

namespace App\Http\Controllers;

use App\Models\Mainmodel;
use Illuminate\Http\Request;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;

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
        return response()->json($users);
    }
    public function destroy($id){
        // dd("hey");
        $users = Mainmodel::destroy($id);
        // dd($users);
        return back();
    }
    public function excel(){
        // dd("in");
        return view('excel');
    }
    public function exceldata(Request $request){
        // dd("in");
        // dd($request->all()); 
        Excel::import(new UserImport,$request->file('file'));
        return back();
        // $users = Mainmodel::exceldata($request);

        // dd($users);
        // return $users;
    }
    public function exportdata(){
        // dd('hey');
    }
    public function test(){
        return view('test');
    }
    public function testpost(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
        $users = Mainmodel::testpost($request);
        // dd($validatedData);
        // Save data to the database or perform any other action
        // For demonstration, let's just return the received data
        return response()->json($users);
    }
}
