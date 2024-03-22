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
            $album = Album::where('userid', $req->session()->get('uid'))->get();
            $profile = DB::table('penggunas')->where('id', $req->session()->get('uid'))->select('penggunas.*')->get();
            $rawFoto = Foto::with('albums')->whereHas('albums', function($query){
                $query->where('visibilitas', '=', 'Public');
            })->inRandomOrder()->get();
            return view('home', [
                'album' => $album,
                'foto' => $rawFoto,
                'profile' => $profile
            ]);
        }
    }

    public function berandaview(request $req){
        $rawFoto = Foto::with('albums')->whereHas('albums', function($query){
            $query->where('visibilitas', '=', 'Public');
        })->inRandomOrder()->get();
        return view('beranda', [
            'foto' => $rawFoto
        ]);
    }
    public function getip(Request $req){
        return $req->ip();
    }
}
