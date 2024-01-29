<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function profil(Request $req){
        return view('profile');
        if ($req->session()->get('username') == null && $req->session()->get('uid') == null){
            return redirect()->intended('/');
        }
        else{
            return view('profile');
        }
    }
}
