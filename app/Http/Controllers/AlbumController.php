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
        $detailFoto = Foto::get()->where('albumId', $id_album);
        $album = Album::firstWhere('id', $id_album);
        $namaAlbum = explode("@", $album['nama_album'])[0];
        return view('detailAlbum', [
            'namaAlbum' => $namaAlbum,
            'albumId' => $id_album,
            'visible' => $album->visibilits,
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
                    'deskripsi_foto' => $req->deskripsi,
                    'lokasi_file' => "uploads/".explode("!!!", $req->albumName)[0]."/".$req->file("foto")->getClientOriginalName(),
                    'albumId' => explode("!!!", $req->albumName)[1],
                    'userId' => $req->session()->get('uid')
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

    public function editAlbum(Request $req){
        $id = $req->idAlbumm;
        $albumName = $req->namaAlbum;
        $deskripsi = $req->deskripsi ?? "";
        $visible = $req->visibilitas;
        $album = Album::firstWhere('id', $id);

        // rename("album_user/".$album->nama_album, "album_user/".$albumName."@".$req->session()->get('username'));

        // $album->nama_album = $albumName."@".$req->session()->get('username');
        $album->visibilitas = $visible;
        $album->deskripsi = $deskripsi;
        
        $album->save();

        return back();
    }

    public function deleteAlbum(Request $req){
        $id = $req->idAlbum;
        $album = Album::firstWhere('id', $id);
        $pathAlbum = system('cd')."\\uploads\\".$album->nama_album;
        File::cleanDirectory($pathAlbum);
        rmdir($pathAlbum);
        $foto = Foto::where('albumId', $id)->get();

        if($foto->count() >= 1){
            foreach($foto as $a){
                Foto::firstWhere('id', $a['id'])->delete();
            }
        }

        $album->delete();
        return back();
    }
    public function hapusFoto(Request $req, $id){
        $foto = foto::firstwhere('id' ,$id);
        $foto->delete();
        unlink($foto->lokasi_file);
        return  back();
    }
}
