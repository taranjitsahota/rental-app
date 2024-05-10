<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Authmodel extends Model
{
    use HasFactory;
    public static function loginpost($request){
        // dd('hey');
        $data = array(

            'email'=>$request->email,
            'password'=>$request->password,
            
            
        );
        
        // dd($data);
        $users = DB::table('users')
        
        ->insert($data);
        return $users;
    }
}
