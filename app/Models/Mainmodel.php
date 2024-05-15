<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Mainmodel extends Model
{
    use HasFactory;
    public static function show(){
        $users=DB::table('show')
        ->get();
        // dd($users);
        return $users;
    }
    public static function store($request){

        $data=[
            'name'=>$request->name,
            'email'=>$request->email
        ];
            $users=DB::table('show')
        ->insert($data);
        // dd($data);
        return $data;
    }
    public static function destroy($id){
        // dd("hey");
        $users=DB::table('show')
        ->where('id',$id)
        ->delete();
        return $users;
    }
    public static function exceldata($request){
        // $data =[
        //     'name'=>$request->name,
        //     'contact'=>$request->contact
        // ];
        // // dd($data);
        // $users=DB::table('excel')
        // ->insert($data);
        // return $data;
    }
    public static function testpost($request){
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,

        ];
        $users = DB::table('test')
        ->insert($data);
        return $data;
    }
}
