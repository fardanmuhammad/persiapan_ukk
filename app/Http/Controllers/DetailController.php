<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Like;
use App\Models\Komentar;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function detailFoto(Request $req, $id){
        $foto = Foto::with(['komentars', 'likes'])->firstWhere('id', $id);
        $ceklike = false;
        foreach($foto->likes as $like){
            if($req->session()->get('uid') == $like->userId){
                $ceklike = true;
            }
            elseif($req->session()->get('uid') == $like->userId){
                $ceklike = false;
            }
        }
        return view('detailFoto', [
            'foto' => $foto,
            'ceklike' => $ceklike
        ]);
    }
    
    public function addLike(Request $req, $id){
        $isChecked = $req->input('is_checked') == "true" ? true : false;
        if ($isChecked == true){
            like::create([
                'fotoId' => $id,
                'userId' => $req->session()->get('uid'),
                'likeType' => "App\Models\Foto"
            ]);
            return response()->json(['messege' =>"success di like, like nya $isChecked"], 200);
        }
    }
    public function unlike(Request $req, $id){
        like::where('userId', '=', $req->session()->get('uid'))->where('fotoId', '=', $id)->delete();
        return response()->json(['message' => "sukses dihapus"], 200);
    }
    public function addKomentar(Request $req, $id){
        Komentar::create([
            'fotoId' => $id,
            'userId' => $req->session()->get('uid'),
            'komentarType' => "App\Models\Foto",
            'komentar' => $req->komentar
        ]);
        return response()->json([
            'message' => "sukses"
        ], 200);
}
public function downloadFile(Request $req, $id){
    $lokasi_file = Foto::firstWhere('id', $id);
    return response()->download($lokasi_file['lokasi_file']);
}
}
