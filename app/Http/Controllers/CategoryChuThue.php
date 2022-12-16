<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Product;
use Session;
use Carbon\Carbon;
use Validator;
use App\Http\Requests\regiterctRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryChuThue extends Controller
{
    public function registerct(){ 
        return view('pages.register_login.registerct');
    }
    public function quanly(Request $request){
        $chutro_email = $request->chutro_email;
        $chutro_password = ($request->chutro_password);

        $vaitro_id = 'CT';
        $result=  DB::table('nguoidung')
        ->where('Email',$chutro_email)
        ->where('Matkhau',$chutro_password)
        ->where('Mavaitro',$vaitro_id)->first();
        
        if($result){
            Session::put('Hoten',$result->Hoten);
            Session::put('Manguoidung',$result->Manguoidung);
            Session::put('SDT',$result->SDT);
            Session::put('Anhnd',$result->Anhnd );
            return Redirect::to('/chutro-quan-ly');
        }else{ 
            Session::flash('error', 'Tài khoản hoặc mật khẩu không đúng!');
            return Redirect::to('/loginct');
        }
    }
    public function show_quanly(){
        $mnd = Session::get('Manguoidung');
        $num1 = 1;
        $num2 = 2;
        $num3 = 3;
        $thongbao_info = DB::table('thongbao')
        ->join('loaithongbao','thongbao.Loaithongbao','=','loaithongbao.Maloaithongbao')
        ->join('thongbaocho','thongbao.Mathongbao','=','thongbaocho.Mathongbao')
        ->where('thongbaocho.Trangthai',$num1)
        ->where('thongbaocho.Nguoidungthongbao',$mnd)
        ->orderby('thongbao.Thoigian','desc')
        ->get();
        
        $ctthongbao = DB::table('hopdong')
        ->join('phongthue','hopdong.Maphongthue','=','phongthue.Maphongthue')
        ->join('khu','phongthue.Makhu','=','khu.Makhu')
        ->join('nguoidung','khu.Machuthue','=','nguoidung.Manguoidung')
        ->where('hopdong.Trangthaihd',$num1)->where('nguoidung.Manguoidung',$mnd)->get();

        $ctthongbao2 = DB::table('hopdong')
        ->join('phongthue','hopdong.Maphongthue','=','phongthue.Maphongthue')
        ->join('khu','phongthue.Makhu','=','khu.Makhu')
        ->join('nguoidung','khu.Machuthue','=','nguoidung.Manguoidung')
        ->where('hopdong.Trangthaihd',$num2)->where('nguoidung.Manguoidung',$mnd)->get();

        $ctthongbao3 = DB::table('hopdong')
        ->join('phongthue','hopdong.Maphongthue','=','phongthue.Maphongthue')
        ->join('khu','phongthue.Makhu','=','khu.Makhu')
        ->join('nguoidung','khu.Machuthue','=','nguoidung.Manguoidung')
        ->where('hopdong.Trangthaihd',$num3)->where('nguoidung.Manguoidung',$mnd)->get();

        return view('chuthue.dashboard')->with('thongbao_info', $thongbao_info)->with('ctthongbao',$ctthongbao)->with('ctthongbao2',$ctthongbao2)->with('ctthongbao3',$ctthongbao3);
    }
    public function logout(){
        Session::put('Hoten',null);
        Session::put('Manguoidung',null);
        Session::put('SDT',null);
        Session::put('Anhnd',null);
        return Redirect::to('/loginct');
    }

    public function save_chutro(Request $request){
        // Retrieve the validated input data...
        // $validated = $request->validated();
        $data = array();
        $textData = "CT";
        $get_chuthue_id = $request->input('category_chuthue_id', $textData);;
        if($get_chuthue_id){
            $name_chuthue = $get_chuthue_id.rand(0,9999);
            $data['Manguoidung'] = $name_chuthue;
        }
        $data['Email'] = $request->khachhang_email;
        $data['Matkhau'] = $request->password;
        $data['Hoten'] = $request->khachhang_name;
        $data['SDT'] = $request->khachhang_phone;
        $data['Ngaysinh'] = $request->khachhang_birth;
        $data['CCCD'] = '';
        $data['Gioitinh'] = $request->khachhang_gioitinh;

        $textData = "CT";
        $get_chuthue_id = $request->input('category_chuthue_vaitro', $textData);;
        if($get_chuthue_id){
            $data['Mavaitro'] = $get_chuthue_id;
        }

        $info = pathinfo(storage_path().'/uploads/khachhang/listing-agent.jpg');
        $get_image = $info['basename'];
        if($get_image){
            $data['Anhnd'] = $get_image;
            DB::table('nguoidung')->insert($data);
        return Redirect::to('loginct');
        }
        $data['category_image'] = '';
        DB::table('nguoidung')->insert($data);
        return Redirect::to('loginct');
    }
    public function edit_chutro_info($chutro_info_id){
        $edit_chutro_info = DB::table('nguoidung')->where('Manguoidung',$chutro_info_id)->get();
        $manage_chutro_info = view('chuthue.edit_chutro_info')->with('edit_chutro_info',$edit_chutro_info);
        return view('chutro_layout')->with('edit_chutro_info',$manage_chutro_info);
    }
    public function update_chutro_info(Request $request, $chutro_info_id){
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
        $get_image = $request->file('Anh');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/chutro',$new_image);
            $data['Anhnd'] = $new_image;
            DB::table('nguoidung')->where('Manguoidung',$chutro_info_id)->update($data);
        Session::flash('success','Cập nhật thành công');
        return Redirect::to('edit-chutro-info/'.$chutro_info_id);
        }
        $info = pathinfo(storage_path().'/uploads/chutro/listing-agent.jpg');
        $get_image2 = $info['basename'];
        if($get_image2){
            $data['Anhnd'] = $get_image2;
            
        DB::table('nguoidung')->where('Manguoidung',$chutro_info_id)->update($data);
        Session::flash('success','Cập nhật thành công');
        return Redirect::to('edit-chutro-info/'.$chutro_info_id);
        }
    }
    // -----------begin khu-------------------------------
    public function all_khu(){
        $id = Session::get('Manguoidung');
        
        $all_khu = DB::table('khu')->where('Machuthue',$id)->get();
        $manage_khu = view('chuthue.all_khu')->with('all_khu',$all_khu);
        
        $result=  DB::table('khu')->where('Machuthue',$id)->first();
        if($result){    
            Session::put('Makhu',$result->Makhu);
        }
        return view('chutro_layout')->with('all_khu',$manage_khu);
    }
    public function add_khu(){
        return view('chuthue.add_khu');
    }
    public function save_khu(Request $request){
        $data = array();
        $textData = "K";
        if($textData){
            $khu_id = $textData.rand(0,99999);
            $data['Makhu'] = $khu_id;
        }
        $data['Tenkhu'] = $request->Tenkhu;
        $data['Diachi'] = $request->Diachi;
        $data['Trangthai'] = $request->Trangthai;
        $data['Maloaikhu'] = $request->Maloaikhu;
        $data['Machuthue'] = $request->Manguoidung;
        $get_image = $request->file('Anh');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/khu',$new_image);
            $data['Anh'] = $new_image;
            DB::table('khu')->insert($data);
        Session::flash('success','Thêm '. $data['Tenkhu'] .' thành công!');
        return Redirect::to('add-khu');
        }
        DB::table('khu')->insert($data);
        Session::flash('success','Thêm '. $data['Tenkhu'] .' thành công!');
        return Redirect::to('add-khu');
    }
    public function edit_khu($khu_id){
        $edit_khu = DB::table('khu')->where('Makhu',$khu_id)->get();
        $manage_khu = view('chuthue.edit_khu')->with('edit_khu',$edit_khu);
        return view('chutro_layout')->with('edit_khu',$manage_khu);
    }
    public function update_khu(Request $request, $khu_id){
        $data = array();
        $data['Tenkhu'] = $request->Tenkhu;
        $data['Diachi'] = $request->Diachi;
        $data['Trangthai'] = $request->Trangthai;
        $data['Maloaikhu'] = $request->Maloaikhu;
        $get_image = $request->file('Anh');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/khu',$new_image);
            $data['Anh'] = $new_image;
        DB::table('khu')->where('Makhu',$khu_id)->update($data);
        Session::flash('success','Cập nhật thành công');
        return Redirect::to('edit-khu/'.$khu_id);
        }
        DB::table('khu')->where('Makhu',$khu_id)->update($data);
        Session::flash('success','Cập nhật thành công');
        return Redirect::to('edit-khu/'.$khu_id);
    }
    public function delete_khu($khu_id){
        DB::table('khu')->where('Makhu',$khu_id)->delete();
        Session::flash('success','Xóa thành công');
        return Redirect::to('all-khu');
    }
    // end khu

    // --------------begin phong cho thuê-----------------------------------
    public function all_phongct($khupt_id){
        $result=  DB::table('khu')->where('Makhu',$khupt_id)->first();
        if($result){    
            Session::put('Makhu',$result->Makhu);
        }     
        $details_nguoidung = DB::table('nguoidung')->join('khu','nguoidung.Manguoidung','=','khu.Machuthue')->where('khu.Makhu',$khupt_id)->first();
        if($details_nguoidung){    
            Session::put('Manguoidung',$details_nguoidung->Manguoidung);
        } 
        $all_phongct = DB::table('phongthue')->join('danhmuc','phongthue.Madanhmuc','=','danhmuc.Madanhmuc')->where('phongthue.Makhu',$khupt_id )->orderby('phongthue.Maphongthue','desc')->get();
        
        $manage_phongct = view('chuthue.all_phongct')->with('all_phongct',$all_phongct);
        return view('chutro_layout')->with('all_phongct',$manage_phongct);
    }
    public function add_phongct(){
        $cate_phong = DB::table('danhmuc')->orderby('Madanhmuc','asc')->get();
        
        return view('chuthue.add_phongct')->with('cate_phong',$cate_phong);
    }
    public function save_phongct(Request $request){
        $data = array();
        $get_phongct_id = "P";
        if($get_phongct_id){
            $id_phongct = $get_phongct_id.rand(0,99999);
            $data['Maphongthue'] = $id_phongct;
        }
        $data['Tieude'] = $request->Tieude;
        $data['Tenphong'] = $request->Tenphong;
        $data['Mota'] = $request->Mota;
        $data['Gia'] = $request->Gia;
        $data['Dientich'] = $request->Dientich;
        $data['Madanhmuc'] = $request->Madanhmucp;
        $data['Gioihannguoi'] = $request->Gioihannguoi;
        $data['Makhu'] = $request->Makhu;
        // $data['Manguoidung'] = $request->Manguoidung;
        $data['Dangchiase'] = 1;
        $data['Songuoihientai'] = '1';
        $data['Trangthai'] = '1';
        $get_image = $request->file('Anh');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/phongct',$new_image);
            $data['Anh'] = $new_image;
            DB::table('phongthue')->insert($data);
        Session::flash('success','Thêm '. $data['Tenphong'] .' thành công!');
        return Redirect::to('add-phongct');
        }
        $data['Anh'] = '';
        DB::table('phongthue')->insert($data);
        Session::flash('success', 'Thêm '. $data['Tenphong'] .' thành công!');
        return Redirect::to('add-phongct');
    }
    public function edit_phongct($phongct_id){
        $edit_phongct = DB::table('phongthue')->where('Maphongthue',$phongct_id)->get(); 

        $manage_phongct = view('chuthue.edit_phongct')->with('edit_phongct',$edit_phongct);
        
        return view('chutro_layout')->with('edit_phongct',$manage_phongct);
    }
    public function update_phongct(Request $request, $phongct_id){
        $data = array();
        $data['Tieude'] = $request->Tieude;
        $data['Tenphong'] = $request->Tenphong;
        $data['Mota'] = $request->Mota;
        $data['Gia'] = $request->Gia;
        $data['Dientich'] = $request->Dientich;
        $data['Madanhmuc'] = $request->Madanhmucp;
        $data['Gioihannguoi'] = $request->Gioihannguoi;
        $get_image = $request->file('Anh');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/phongct',$new_image);
            $data['Anh'] = $new_image;
        DB::table('phongthue')->where('Maphongthue',$phongct_id)->update($data);
        Session::flash('success','Cập nhật thành công');
        return Redirect::to('edit-phongct/'.$phongct_id);
        }
        DB::table('phongthue')->where('Maphongthue',$phongct_id)->update($data);
        Session::flash('success','Cập nhật thành công');
        return Redirect::to('edit-phongct/'.$phongct_id);
    }
    public function delete_phongct($phongct_id){
        DB::table('phongthue')->where('Maphongthue',$phongct_id)->delete();
        Session::flash('success','Xóa thành công');
        return Redirect::to('all-phongct');
    }
    // //End Function Admin Page

    public function xacnhan_tt($hopdong_id){
        $num = 1;
        $result1 = DB::table('khoanthanhtoan')
        ->join('hopdong','khoanthanhtoan.Mahopdong','=','hopdong.Mahopdong')
        ->join('phongthue','hopdong.Maphongthue','=','phongthue.Maphongthue')
        ->join('khu','phongthue.Makhu','=','khu.Makhu')
        ->join('nguoidung','khoanthanhtoan.Nguoigui','=','nguoidung.Manguoidung')
        ->where('khoanthanhtoan.Mahopdong',$hopdong_id)->where('khoanthanhtoan.Makhoanthanhtoan',$num)->get();

        return view('chuthue.xacnhan_thanhtoan')->with('xacnhanthanhtoan',$result1);
    }
    public function save_xacnhan(Request $request, $hopdong_id){
        $num4 = 4;
        $updatehd = array();
        $updatehd['Trangthaihd'] = '4';
        $updatehd['Maphongthue'] = $request->Maphong;
        DB::table('hopdong')->where('Mahopdong',$hopdong_id)->update($updatehd);

        $idphong = $updatehd['Maphongthue'];
        $updatephong = array();
        $updatephong['Trangthai'] = '3';
        DB::table('phongthue')->where('Maphongthue',$idphong)->update($updatephong);
        Session::flash('success', 'Xác nhận thanh toán thành công! Mã hợp đồng: '. $hopdong_id);
            return Redirect::to('xacnhan-tt/'.$hopdong_id);
    }
    public function allshow_hopdong(){
        $mnd = Session::get('Manguoidung');
        $num4 = 4;
        $ctthongbao4 = DB::table('hopdong')
        ->join('phongthue','hopdong.Maphongthue','=','phongthue.Maphongthue')
        ->join('khu','phongthue.Makhu','=','khu.Makhu')
        ->join('nguoidung','khu.Machuthue','=','nguoidung.Manguoidung')
        ->where('hopdong.Trangthaihd',$num4)->where('nguoidung.Manguoidung',$mnd)->get();
        return view('chuthue.all_showhopdong')->with('ctthongbao4',$ctthongbao4);
    }
    public function detail_hopdongct($hopdong_id){

        $ctthongbao = DB::table('hopdong')
        ->join('phongthue','hopdong.Maphongthue','=','phongthue.Maphongthue')
        ->join('khu','phongthue.Makhu','=','khu.Makhu')
        ->join('nguoidung','khu.Machuthue','=','nguoidung.Manguoidung')
        ->join('lichsuhopdong','hopdong.Mahopdong','=','lichsuhopdong.Mahopdong')
        ->where('hopdong.Mahopdong',$hopdong_id)->get();

        $hopdongdetail = view('chuthue.detail_hopdong')->with('detail_hopdong', $ctthongbao);
         return view('chutro_layout')->with('detail_hopdong', $hopdongdetail);
    }
    public function all_thanhtoan(){
        $mnd = Session::get('Manguoidung');
        $num4 = 4;
        $ctallthanhtoan = DB::table('hopdong')
        ->join('phongthue','hopdong.Maphongthue','=','phongthue.Maphongthue')
        ->join('khu','phongthue.Makhu','=','khu.Makhu')
        ->join('nguoidung','khu.Machuthue','=','nguoidung.Manguoidung')
        ->where('hopdong.Trangthaihd',$num4)->where('nguoidung.Manguoidung',$mnd)->get();
        return view('chuthue.all_showthanhtoan')->with('ctthanhtoan',$ctallthanhtoan);
    }

    public function all_vandect(){
        $mndct = Session::get('Manguoidung');
        $num4 = 4;
        $tt1 = 1;
        $tt2 = 2;
        $all_vandect1 = DB::table('suco')
        ->join('vande','suco.Masuco','=','vande.Masuco')
        ->join('hopdong','vande.Mahopdong','=','hopdong.Mahopdong')
        ->join('lichsuhopdong','hopdong.Mahopdong','=','lichsuhopdong.Mahopdong')    
        ->join('phongthue','hopdong.Maphongthue','=','phongthue.Maphongthue')
        ->where('hopdong.Trangthaihd',$num4)->where('lichsuhopdong.Machuthue',$mndct)->where('suco.Trangthaisc',$tt1)->get();
        
        $all_vandect2 = DB::table('suco')
        ->join('vande','suco.Masuco','=','vande.Masuco')
        ->join('hopdong','vande.Mahopdong','=','hopdong.Mahopdong')
        ->join('lichsuhopdong','hopdong.Mahopdong','=','lichsuhopdong.Mahopdong')    
        ->join('phongthue','hopdong.Maphongthue','=','phongthue.Maphongthue')
        ->where('hopdong.Trangthaihd',$num4)->where('lichsuhopdong.Machuthue',$mndct)->where('suco.Trangthaisc',$tt2)->get();

        return view('chuthue.all_vandect')->with('all_vandect1',$all_vandect1)->with('all_vandect2',$all_vandect2);
    }
    public function complete_vandect($suco_id){
        DB::table('suco')->where('Masuco',$suco_id)->update(['Trangthaisc'=>2]);
        Session::flash('success','Sự cố - vấn đề đã khắc phục!');
        return Redirect::to('all-vandect');
    }
}
