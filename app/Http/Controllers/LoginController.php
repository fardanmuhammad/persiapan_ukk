<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengguna;
use Exception;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function loginView(Request $request){
        if($request->session()->get('username') !=null && $request->session()->get('uid') != null){
            return redirect()-> intended('/home');
        }
        else{
            return view('login');
        }
    }


    public function loginAction(Request $req){
        $row= Pengguna::firstWhere('username', '=', $req['username']) ?? [];
        $type = gettype($row);
        if($type != "object"){
            if (count($row) == 0){
                return view('login', ['status' => 404, 'error' => 'Username not found.']);
                

            }
        }
        else{
            if (Hash::check($req->password,$row->password)){
                $req->session()->put('username', $row->username);
                $req->session()->put('uid', $row->id);
                return redirect()-> intended('/home');
            }
            else{
                return view('login', ['status' => 403]);
            }
        }
    }
    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->intended('/login');
    }
    
    

    public function regist(Request $req){
        try {
            pengguna::create([
                'username' => $req->username,
                'email' => $req->email,
                'password' => Hash::make($req->password)
            ]);
    
            return redirect('/login')->with([
                'status' => 'success',
                'message' => 'Akun Berhasil Dibuat'
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return view('register', [
                'status' => 'error',
                'message' => 'Username sudah digunakan'
            ]);
        }
    }
    
    public function registView(Request $request){
        if($request->session()->get('username') !=null && $request->session()->get('uid') != null){
            return redirect()->intended('/home');
        }
        else{
            return view('register');
        }
    }

}
