<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    //
    // public function profil(Request $req){
    //     return view('profile');
    //     if ($req->session()->get('username') == null && $req->session()->get('uid') == null){
    //         return redirect()->intended('/');
    //     }
    //     else{
    //         return view('profile');
    //     }
    // }

     public function tampilprofile(Request $req){
         $profile = DB::table('penggunas')->where('id',$req->session()->get('uid'))->select('penggunas.*')->get();
         return view('profile', compact('profile'));
     }
}
