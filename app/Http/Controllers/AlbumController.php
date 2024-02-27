<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PhpParser\Builder\Function_;
use App\Models\album;
use App\Models\foto;

class AlbumController extends Controller {

    public function albumView(Request $req, $id_album){
        $detailFoto = Foto::get()->where('albumid', $id_album);
        $album = Album::firstWhere('id', $id_album);
        $namaAlbum = explode("@", $album['nama_album'])[0];
        return view('detailAlbum', [
            'namaAlbum' => $namaAlbum,
            'detailFoto' => $detailFoto
        ]);
    }

    
    public function direktory (Request $req){
        try {
            mkdir("uploads/".$req->album_name."@".$req->session()->get('username'));
            album::create([
                'nama_album'=> $req->album_name."@".$req->session()->get('username'),
                'userid'=>$req->session()->get('uid'),
                'visibilitas'=>$req->visible,
            ]);
            return redirect()->intended("/home");
        }catch(Exception $e){
            return redirect()->intended('/home')->with([
                'status_code' =>401,
                'message'=>"Album Sudah Ada"
            ]);
        }
    }
    private $ekstensi = ['jpg', 'jpeg', 'png'];

    private function cekEkstensi (Request $req){
        $res=false;
        for($a = 0; $a < count($this->ekstensi); $a++){
            if($this->ekstensi[$a] == $req->file("foto")->getClientOriginalExtension()){
                $res = true;
                return $res;
            }
        }
        return $res;
    }

    public function uploadfoto(Request $req){
        if($this->cekEkstensi($req) == true){
            try{
                $file = $req->file("foto");
                $file->move("uploads/".explode("!!!",$req->albumName)[0], $file->getClientOriginalName());
                foto::create([
                    'judul_foto' => $req->file("foto")->getClientOriginalName(),
                    'lokasi_file' => "uploads/".explode("!!!", $req->albumName)[0]."/".$req->file("foto")->getClientOriginalName(),
                    'albumid' => explode("!!!", $req->albumName)[1],
                    'userid' => $req->session()->get('uid')
                ]);
                return redirect()->intended('/home')->with([
                    'status' => 200
                ]);
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
        else{
            return redirect()->intended('/home')->with([
                'status' => 403
            ]);
        }
    }
}
