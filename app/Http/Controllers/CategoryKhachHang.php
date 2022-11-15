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
    // public function quanly(Request $request){
    //     $khachhang_email = $request->khachhang_email;
    //     $khachhang_password = ($request->khachhang_password);

    //     $result=  DB::table('tbl_khachhang')->where('khachhang_email',$khachhang_email)->where('khachhang_password',$khachhang_password)->first();
        
    //     if($result){
    //         Session::put('khachhang_name',$result->khachhang_name);
    //         Session::put('khachhang_id',$result->khachhang_id);
    //         Session::put('category_image',$result->category_image);
    //         Session::put('id',$result->id);
    //         return Redirect::to('/khachhang-quan-ly');
    //     }else{
    //         // Session::put('message','Tài khoản hoặc mật khẩu không đúng');
    //         Session::flash('error', 'Tài khoản hoặc mật khẩu không đúng!');
    //         return Redirect::to('/loginkh');
    //     } 
    // }
    // public function logout(){
    //     Session::put('khachhang_name',null);
    //     Session::put('khachhang_id',null);
    //     Session::put('khachhang_phone',null);
    //     Session::put('id',null);
    //     return Redirect::to('/loginkh');
    // }

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
        $data['password'] = $request->password;
        $data['Hoten'] = $request->khachhang_name;
        $data['SDT'] = $request->khachhang_phone;
        $data['Ngaysinh'] = '';
        $data['CCCD'] = '';
        $data['Gioitinh'] = '';
        
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
        $edit_khachhang_info = DB::table('tbl_khachhang')->where('id',$khachhang_info_id)->get();
        $manage_khachhang_info = view('khachhang.edit_khachhang_info')->with('edit_khachhang_info',$edit_khachhang_info);
        return view('khachhang_layout')->with('edit_khachhang_info',$manage_khachhang_info);
    }
    public function update_khachhang_info(Request $request, $khachhang_info_id){
        $data = array();
        $data['khachhang_name'] = $request->khachhang_name;
        $data['khachhang_phone'] = $request->khachhang_phone;
        $data['category_image'] = $request->category_image;
        DB::table('tbl_khachhang')->where('id',$khachhang_info_id)->update($data);
        Session::flash('success','Cập nhật thành công');
        return Redirect::to('edit-khachhang-info/'.$khachhang_info_id);
    }
}
