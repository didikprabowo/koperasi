<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Admin;
use Hash;
class AdminController extends Controller
{
    public function index(){
        return view('auth');    
    }
    public function login(Request $request){
        $email =  $request->email;
        $password   =  $request->password;
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:3'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/anggota');
        }else{
            return redirect('auth');
        }
        // return back();
}
    public function logout(){
        Auth::guard('admin')->logout();
        Session::flash('message', 'Anda Telah Keluar'); 
        Session::flash('alert-class', 'alert-info');
        return redirect('auth');
    }
    
}
