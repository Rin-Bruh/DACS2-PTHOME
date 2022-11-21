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
    public function AuthLogin(){
        $id_nguoidung = Session::get('Manguoidung');
        if($id_nguoidung){
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function index(){
        return view('admin_login');
    }
    public function show_dashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        $admin_email = $request->Email;
        $admin_password = md5($request->Matkhau);
        $vaitro_id = 'AD';

        $result=  DB::table('nguoidung')->where('Email',$admin_email)->where('Matkhau',$admin_password)->where('Mavaitro',$vaitro_id)->first();
        // return view('admin.dashboard');
        if($result){
            Session::put('Hoten',$result->Hoten);
            Session::put('Anh',$result->Anh);
            Session::put('Manguoidung',$result->Manguoidung);
            return Redirect::to('/dashboard');
        }else{
            Session::flash('error','Tài khoản hoặc mật khẩu không đúng');
            return Redirect::to('/admin');
        }
    }
    public function logout(){
        $this->AuthLogin();
        Session::put('Hoten',null);
        Session::put('Anh',null);
        Session::put('Manguoidung',null);
        return Redirect::to('/admin');
    }
}
