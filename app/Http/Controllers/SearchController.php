<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Pengguna;
use App\Models\Album;
use App\Http\Controllers\FunctionListt;
use Illuminate\support\Facades\session;
use Illuminate\support\Facades\DB;

class SearchController extends Controller
{
    public function searchView(Request $req){
        $fl = new FunctionListt;
        if($fl->sessionCheck($req) == false){
            return redirect()->intended('/login');
        } else {
            return view ('search',['foto'=>foto::orderBy(DB::raw('RAND()'))->get()]);
        }
    }

    public function cari(Request $req){
        $keyword = $req->get('keyword');
        $result = foto::where('deskripsi_foto', 'like', '%'.$keyword.'%')->get();

        return view('search',['hasil'=>$result]);
    }
}
