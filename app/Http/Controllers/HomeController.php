<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FunctionListt;
use App\Models\album;
use App\Models\foto;



class HomeController extends Controller
{
    //

     public function homeView(Request $req){
        $fl = new FunctionListt;
        if($fl->sessionCheck($req) == false){
            return redirect()->intended('/login');
        }
        else{   
            $album = Album::get()->where('userid', $req->session()->get('uid'));
            return view('home', [
                'album' => $album,
            ]);
        }
    }

    public function berandaview(request $req){
        return view('beranda', [
            'foto' => Foto::orderBy(DB::raw('RAND()'))->get()
        ]);
    }
    public function getip(Request $req){
        return $req->ip();
    }
}
