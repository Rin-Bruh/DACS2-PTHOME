<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Product;
use Session;
use Validator;
use App\Http\Requests\regiterkhRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryKhachHang extends Controller
{
    public function registerkh(){ 
        return view('pages.register_login.registerkh');
    }
    public function show_quanly(){
        return view('khachhang_layout');
    }
    public function quanly(Request $request){
        $khachhang_email = $request->khachhang_email;
        $khachhang_password = ($request->khachhang_password);

        $vaitro_id = 'KH';
        $result=  DB::table('nguoidung')->where('Email',$khachhang_email)->where('Matkhau',$khachhang_password)->where('Mavaitro',$vaitro_id)->first();
        
        if($result){
            Session::put('Hoten',$result->Hoten);
            Session::put('Manguoidung',$result->Manguoidung);
            Session::put('Anh',$result->Anh);
            return Redirect::to('/khachhang-quan-ly');
        }else{
            Session::flash('error', 'Tài khoản hoặc mật khẩu không đúng!');
            return Redirect::to('/loginkh');
        } 
    }
    public function logout(){
        Session::put('Hoten',null);
        Session::put('Manguoidung',null);
        Session::put('Anh',null);
        Session::put('Maphongthue',null);
        Session::put('Tenphong',null);
        return Redirect::to('/loginkh');
    }

    public function save_category_khachhang(Request $request){
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

        $info = pathinfo(storage_path().'/uploads/khachhang/listing-agent.jpg');
        $get_image = $info['basename'];
        if($get_image){
            $data['Anh'] = $get_image;
            DB::table('nguoidung')->insert($data);
        return Redirect::to('loginkh');
        }
        $data['category_image'] = '';
        DB::table('nguoidung')->insert($data);
        return Redirect::to('loginkh');
    }
    public function edit_khachhang_info($khachhang_info_id){
        $edit_khachhang_info = DB::table('nguoidung')->where('Manguoidung',$khachhang_info_id)->get();
        $manage_khachhang_info = view('khachhang.edit_khachhang_info')->with('edit_khachhang_info',$edit_khachhang_info);
        return view('khachhang_layout')->with('edit_khachhang_info',$manage_khachhang_info);
    }
    public function update_khachhang_info(Request $request, $khachhang_info_id){
        $data = array();
        $data['Hoten'] = $request->Hoten;
        $data['SDT'] = $request->SDT;
        $data['Ngaysinh'] = $request->Ngaysinh;
        $get_cccd = $request->CCCD;
        if($get_cccd){
        $data['CCCD'] = $get_cccd;
        } else {
            $data['CCCD'] = '';
        }
        $data['Gioitinh'] = $request->Gioitinh;
        // $data['Anh'] = $request->Anh;
        $get_image = $request->file('Anh');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/khachhang',$new_image);
            $data['Anh'] = $new_image;
            DB::table('nguoidung')->where('Manguoidung',$khachhang_info_id)->update($data);
        Session::flash('success','Cập nhật thành công');
        return Redirect::to('edit-khachhang-info/'.$khachhang_info_id);
        }
        $info = pathinfo(storage_path().'/uploads/khachhang/listing-agent.jpg');
        $get_image2 = $info['basename'];
        if($get_image2){
            $data['Anh'] = $get_image2;
            
        DB::table('nguoidung')->where('Manguoidung',$khachhang_info_id)->update($data);
        Session::flash('success','Cập nhật thành công');
        return Redirect::to('edit-khachhang-info/'.$khachhang_info_id);
        }
    }
    
}
