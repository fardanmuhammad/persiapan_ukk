<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisibilitasController extends Controller
{
    //
    public function visibilitasPrivate()
    {
        $Visibilitas = ['Public', 'Private', 'Follower'];
        $visibility = 'Private';

        $dataAlbum = DB::table('albums')
            ->whereIn('visibilitas', $Visibilitas)
            ->where('visibilitas', $visibility)
            ->get();
        //  dd($dataAlbum);
        return view('private')->with('dataAlbum', $dataAlbum);
    
    }

    public function visibilitasFollower(){
        $visibilitas = ['Public', 'Private', 'Follower'];
        $visibility = 'Follower';

        $dataAlbum = DB::table('albums')
        ->whereIn('visibilitas', $visibilitas)
        ->where('visibilitas', $visibility)
        ->get();
        return view('follower')->with('dataAlbum', $dataAlbum);
    }

    public function visibilitasPublic(){
        $visibilitas = ['Public', 'Private','Follower'];
        $visibility = 'Pubic';

        $dataAlbum = DB::table('albums')
        ->whereIn('visibilitas', $visibilitas)
        ->where('visibilitas', $visibilitas)
        ->get();
        return view('public')->with('dataAlbum', $dataAlbum);
    }

}
