<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Session;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    public function login_checkout($maphong){
        $kq =  DB::table('phongthue')->where('Maphongthue',$maphong)->first();
        if($kq){
            Session::put('Maphongthue',$kq->Maphongthue);
            Session::put('Tenphong',$kq->Tenphong);
        }
        return view('pages.checkout.login_checkout');
    }
    public function dangxuat_checkout(){
        Session::put('Hoten',null);
        Session::put('Anh',null);
        Session::put('Manguoidung',null);
        return Redirect::to('/properties');
    }
    public function dangnhap_checkout(Request $request){
        $khachhang_email = $request->khachhang_email;
        $khachhang_password = ($request->khachhang_password);

        $vaitro_id = 'KH';
        $result=  DB::table('nguoidung')->where('Email',$khachhang_email)->where('Matkhau',$khachhang_password)->where('Mavaitro',$vaitro_id)->first();
        $maaphong = Session::get('Maphongthue');
        if($result){
            Session::put('Hoten',$result->Hoten);
            Session::put('Anh',$result->Anh);
            Session::put('Manguoidung',$result->Manguoidung);
            return Redirect::to('/checkout/'.$maaphong);
        }else{
            Session::flash('error', 'Tài khoản hoặc mật khẩu không đúng!');
            return Redirect::to('/login_checkout/'.$maaphong);
        } 
    }
    public function add_khachhang(Request $request){
        // Retrieve the validated input data...
        // $validated = $request->validated();
        $data = array();
        $textData = "KH";
        $get_khachhang_id = $request->input('category_khachhang_id', $textData);;
        if($get_khachhang_id){
            $name_khachhang = $get_khachhang_id.rand(0,9999);
            $data['Manguoidung'] = $name_khachhang;
        }
        $data['Email'] = $request->khachhang_email;
        $data['Matkhau'] = $request->password;
        $data['Hoten'] = $request->khachhang_name;
        $data['SDT'] = $request->khachhang_phone;
        $data['Ngaysinh'] = $request->khachhang_birth;
        $data['CCCD'] = '';
        $data['Gioitinh'] = $request->khachhang_gioitinh;
        
        $textData = "KH";
        $get_khachhang_id = $request->input('category_khachhang_vaitro', $textData);;
        if($get_khachhang_id){
            $data['Mavaitro'] = $get_khachhang_id;
        }
        $maaphong = Session::get('Maphongthue');
        $info = pathinfo(storage_path().'/uploads/khachhang/listing-agent.jpg');
        $get_image = $info['basename'];
        if($get_image){
            $data['Anh'] = $get_image;
            $insert_khachhang = DB::table('nguoidung')->insertGetId($data);
            Session::put('Manguoidung',$insert_khachhang->Manguoidung);
            Session::put('Anh',$insert_khachhang->Anh);
            Session::put('Hoten',$insert_khachhang->Tennguoidung);
            return Redirect::to('/checkout/'.$maaphong);
        }
        $data['category_image'] = '';
        $Manguoidung = DB::table('nguoidung')->insertGetId($data);
            Session::put('Manguoidung',$insert_khachhang->Manguoidung);
            Session::put('Anh',$insert_khachhang->Anh);
            Session::put('Hoten',$insert_khachhang->khachhang_name);
            return Redirect::to('/checkout/'.$maaphong);
    }
    public function checkout($maphong){
        $kqq =  DB::table('phongthue')->where('Maphongthue',$maphong)->first();
        if($kqq){
            Session::put('Maphongthue',$kqq->Maphongthue);
            Session::put('Tenphong',$kqq->Tenphong);
        }
        $khachhang_id = Session::get('Manguoidung');
        $khachhang_info = DB::table('nguoidung')->where('Manguoidung',$khachhang_id)->get();
        $checkout_khachhang = view('khachhang.show_checkout')->with('khachhang_info',$khachhang_info);
        return view('khachhang_layout')->with('khachhang_info',$checkout_khachhang);
    }
    public function add_thongbao(Request $request, $khachhang_id){
        
        $data = array();
        $textData = "MTB";
        $get_thongbao_id = $request->input('ma_thongbao', $textData);;
        if($get_thongbao_id){
            $name_thongbao = $get_thongbao_id.rand(0,9999);
            $data['Mathongbao'] = $name_thongbao;
        }
        $data['Tieude'] = $request->Tieude;
        $data['Noidung'] = $request->Noidung;
        $data['Trangthai'] = '1';
        $data['Loaithongbao'] = '1';
        $data['Nguoitao'] = $request->Manguoidung;
        DB::table('thongbao')->insert($data);
        $Tenphong1 = $request->Tenphong;
        $Maphongthue1 = $request->Maphongthue;

        $data_phong = array();
        $data_phong['Trangthai'] = '2';
        $Manguoitao =  $data['Nguoitao'];
        $getkhu = DB::table('khu')->join('nguoidung','khu.Machuthue','=','nguoidung.Manguoidung')->where('nguoidung.Manguoidung',$Manguoitao)->first();
        if($getkhu){    
            Session::put('Makhu',$getkhu->Makhu);
        } 
        $khu_id = Session::get('Makhu');

        $getphong = DB::table('phongthue')->join('khu','phongthue.Makhu','=','khu.Makhu')->where('khu.Makhu',$khu_id)->where('Maphongthue',$Maphongthue1)->first();
        if($getphong){    
            Session::put('Maphongthue',$getphong->Maphongthue);
        } 
        $phong_id = Session::get('Maphongthue');

        DB::table('phongthue')->where('Maphongthue',$phong_id)->update($data_phong);


        
        Session::flash('success','Đăng kí '. $Tenphong1 .' thành công! Vui lòng chờ chủ thuê phản hồi');
        return Redirect::to('/checkout/'.$request->Maphongthue);
    }
}
