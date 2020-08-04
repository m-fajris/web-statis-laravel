<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }

    public function welcome(Request $request){
        //var_dump($request);
        //dd($request["alamat"]);

        return view('welcome', ["nama_depan" => $request["nama_depan"]],["nama_belakang" => $request["nama_belakang"]]);
    }

}
