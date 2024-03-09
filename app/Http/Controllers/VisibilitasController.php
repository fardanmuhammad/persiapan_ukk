<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Album;
use App\Http\Controllers\FunctionListt;

class VisibilitasController extends Controller
{
    //
    public function visibilitasPrivate(Request $req){
        $visibilitas = ['Public', 'Private', 'Follower'];
        $visibility = 'Private';

        $album = Album::whereIn('visibilitas', $visibilitas)
        ->where('visibilitas', $visibility) 
        ->where('userid', $req->session()->get('uid'))
        ->get();
        return view('private', [
            'album' => $album,
        ]);
    }   
    

    public function visibilitasFollower(Request $req){
        $visibilitas = ['Public', 'Private', 'Follower'];
        $visibility = 'Follower';

        $album = Album::whereIn('visibilitas', $visibilitas)
        ->where('visibilitas', $visibility) 
        ->where('userid', $req->session()->get('uid'))
        ->get();
        return view('follower', [
            'album' => $album,
        ]);
    }   
    public function visibilitasPublic(Request $req){
        $visibilitas = ['Public', 'Private', 'Follower'];
        $visibility = 'Public';

            $album = Album::whereIn('visibilitas', $visibilitas)
            ->where('visibilitas', $visibility) 
            ->where('userid', $req->session()->get('uid'))
            ->get();
            return view('public', [
                'album' => $album,
            ]);
        }   
    }


