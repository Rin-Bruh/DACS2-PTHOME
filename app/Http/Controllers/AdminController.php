<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function index(){
        return view('admin_login');
    }
    public function show_dashboard(){
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        $admin_email = $request->Email;
        $admin_password = md5($request->Matkhau);

        $result=  DB::table('nguoidung')->where('Email',$admin_email)->where('Matkhau',$admin_password)->first();
        // return view('admin.dashboard');
        if($result){
            Session::put('Hoten',$result->Hoten);
            Session::put('Anh',$result->Anh);
            Session::put('Manguoidung',$result->Manguoidung);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Tài khoản hoặc mật khẩu không đúng');
            return Redirect::to('/admin');
        }
    }
    public function logout(){
        Session::put('Hoten',null);
        Session::put('Anh',null);
        Session::put('Manguoidung',null);
        return Redirect::to('/admin');
    }
}
