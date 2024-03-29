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
            Session::put('CCCD',$result->CCCD);
            Session::put('Ngaysinh',$result->Ngaysinh);
            Session::put('SDT',$result->SDT);
            Session::put('Anhnd',$result->Anhnd);
            return Redirect::to('/khachhang-quan-ly');
        }else{
            Session::flash('error', 'Tài khoản hoặc mật khẩu không đúng!');
            return Redirect::to('/loginkh');
        } 
    }
    public function logout(){
        Session::put('Hoten',null);
        Session::put('Manguoidung',null);
        Session::put('CCCD',null);
        Session::put('Ngaysinh',null);
        Session::put('Anhnd',null);
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
            $data['Anhnd'] = $get_image;
            DB::table('nguoidung')->insert($data);
        return Redirect::to('loginkh');
        }
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
            $data['Anhnd'] = $new_image;
            DB::table('nguoidung')->where('Manguoidung',$khachhang_info_id)->update($data);
        Session::flash('success','Cập nhật thành công');
        return Redirect::to('edit-khachhang-info/'.$khachhang_info_id);
        }
        $info = pathinfo(storage_path().'/uploads/khachhang/listing-agent.jpg');
        $get_image2 = $info['basename'];
        if($get_image2){
            $data['Anhnd'] = $get_image2;
            
        DB::table('nguoidung')->where('Manguoidung',$khachhang_info_id)->update($data);
        Session::flash('success','Cập nhật thành công');
        return Redirect::to('edit-khachhang-info/'.$khachhang_info_id);
        }
    }
    public function all_checkout($khachhang_id){
        Session::put('Maphongthue',null);
        Session::put('Tenphong',null);
        $num1 = 1;
        $num2 = 2;
        $num3 = 3;
        $result = DB::table('hopdong')
        ->join('phongthue','hopdong.Maphongthue','=','phongthue.Maphongthue')
        ->join('khu','phongthue.Makhu','=','khu.Makhu')
        ->where('hopdong.Trangthaihd',$num1)->orWhere('hopdong.Trangthaihd',$num2)->orWhere('hopdong.Trangthaihd',$num3)->where('hopdong.Manguoithue',$khachhang_id)->get();
        
        $manage_checkout = view('khachhang.showall_checkout')->with('showall_checkout',$result);
        return view('khachhang_layout')->with('showall_checkout',$manage_checkout);
    }
    public function detail_hopdongkh($hopdong_id){

        $ctthongbao = DB::table('hopdong')
        ->join('phongthue','hopdong.Maphongthue','=','phongthue.Maphongthue')
        ->join('khu','phongthue.Makhu','=','khu.Makhu')
        ->join('nguoidung','khu.Machuthue','=','nguoidung.Manguoidung')
        ->join('lichsuhopdong','hopdong.Mahopdong','=','lichsuhopdong.Mahopdong')
        ->where('hopdong.Mahopdong',$hopdong_id)->get();

        return view('khachhang.detail_hopdong')->with('detail_hopdong', $ctthongbao);
    }
    public function pay_tiencoc($hopdong_id){
        $num2 = 2;
        $result2 = DB::table('hopdong')
        ->join('phongthue','hopdong.Maphongthue','=','phongthue.Maphongthue')
        ->join('khu','phongthue.Makhu','=','khu.Makhu')
        ->join('nguoidung','khu.Machuthue','=','nguoidung.Manguoidung')
        ->join('lichsuhopdong','hopdong.Mahopdong','=','lichsuhopdong.Mahopdong')
        ->where('hopdong.Trangthaihd',$num2)
        ->where('hopdong.Mahopdong',$hopdong_id)->get();

        $cate_thanhtoan = DB::table('loaikhoanthanhtoan')->orderby('Maloaikhoan','asc')->get();
        return view('khachhang.thanhtoan_tiencoc')->with('cate_thanhtoan',$cate_thanhtoan)->with('show_pay',$result2);
    }
    public function save_thanhtoan(Request $request){
        // Retrieve the validated input data...
        // $validated = $request->validated();
        $dataa = array();
        $textDataa = "KTT";
        $get_thanhtoan_id = $request->input('thanhtoan_id', $textDataa);;
        if($get_thanhtoan_id){
            $id_khoan = $get_thanhtoan_id.rand(0,9999);
            $dataa['Makhoan'] = $id_khoan;
        }
        $dataa['Mahopdong'] = $request->Mahopdong;
        $dataa['Makhoanthanhtoan'] = $request->Maloaikhoan;
        $dataa['Giatri'] = $request->Giatri;
        $dataa['Trangthai'] = '1';
        $dataa['Noidung'] = $request->Mota;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $dataa['Thoigiantra'] = date('Y-m-d H:i:s');
        $dataa['Hanthanhtoan'] = $request->Hanthanhtoan;
        $dataa['Nguoigui'] = $request->Nguoigui;
        $dataa['Nguoinhan'] = $request->Nguoinhan;
        $idhopdong = $dataa['Mahopdong'];
        $image = $request->file('Anh');
        if($image){
            $get_name_image = $image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$image->getClientOriginalExtension();
            $image->move('public/uploads/thanhtoandatcoc',$new_image);
            $dataa['Anhchungminh'] = $new_image;
            DB::table('khoanthanhtoan')->insert($dataa);

            $dataaa = array();
            $dataaa['Trangthaihd'] = '3';
            DB::table('hopdong')->where('Mahopdong',$idhopdong)->update($dataaa);

            Session::flash('success', 'Thanh toán đặt cọc thành công! Mã khoản: '. $dataa['Makhoan']);
            return Redirect::to('pay-tiencoc/'.$request->Mahopdong);
        } else {
            $info = pathinfo(storage_path().'/uploads/thanhtoandatcoc/tratienmat2.jpg');
            $get_image = $info['basename'];
            if($get_image){
                $dataa['Anhchungminh'] = $get_image;
                DB::table('khoanthanhtoan')->insert($dataa);

                $dataaa = array();
                $dataaa['Trangthaihd'] = '3';
                DB::table('hopdong')->where('Mahopdong',$idhopdong)->update($dataaa);

                Session::flash('success', 'Thanh toán đặt cọc thành công! Mã khoản: '. $dataa['Makhoan']);
                return Redirect::to('pay-tiencoc/'.$request->Mahopdong);
            }
        }
        
    }
    public function allshow_hopdong(){
        $mndkh = Session::get('Manguoidung');
        $num4 = 4;
        $ctthongbao4 = DB::table('hopdong')
        ->join('phongthue','hopdong.Maphongthue','=','phongthue.Maphongthue')
        ->join('khu','phongthue.Makhu','=','khu.Makhu')
        ->join('nguoidung','hopdong.Manguoithue','=','nguoidung.Manguoidung')
        ->where('hopdong.Trangthaihd',$num4)->where('nguoidung.Manguoidung',$mndkh)->get();
        return view('khachhang.all_showhopdong')->with('ctthongbao4',$ctthongbao4);
    }
    public function all_phongkh(){
        $mndkh = Session::get('Manguoidung');
        $num4 = 4;
        $all_phongkh = DB::table('lichsuhopdong')
        ->join('hopdong','lichsuhopdong.Mahopdong','=','hopdong.Mahopdong')
        ->join('phongthue','hopdong.Maphongthue','=','phongthue.Maphongthue')    
        ->join('nguoidung','lichsuhopdong.Machuthue','=','nguoidung.Manguoidung')
        ->where('hopdong.Trangthaihd',$num4)->where('lichsuhopdong.Makhachthue',$mndkh)->get();
        return view('khachhang.all_phongkh')->with('all_phongkh',$all_phongkh);
    }
    public function info_phongkh($phong_id){
        $info_phongkh = DB::table('phongthue')->where('Maphongthue',$phong_id)->get(); 

        $manage_phongkh = view('khachhang.info_phongkh')->with('info_phongkh',$info_phongkh);
        
        return view('khachhang_layout')->with('info_phongkh',$manage_phongkh);
    }
    public function info_chuthue($phong_id){
        $info_chuthue = DB::table('phongthue')
        ->join('khu','phongthue.Makhu','=','khu.Makhu')
        ->join('nguoidung','khu.Machuthue','=','nguoidung.Manguoidung')
        ->where('phongthue.Maphongthue',$phong_id)->get(); 

        $manage_chuthue = view('khachhang.info_chuthue')->with('info_chuthue',$info_chuthue);
        
        return view('khachhang_layout')->with('info_chuthue',$manage_chuthue);
    }
    public function all_vandekh(){
        $mndkh = Session::get('Manguoidung');
        $num4 = 4;
        $tt1 = 1;
        $tt2 = 2;
        $all_vandekh1 = DB::table('suco')
        ->join('vande','suco.Masuco','=','vande.Masuco')
        ->join('hopdong','vande.Mahopdong','=','hopdong.Mahopdong') 
        ->join('phongthue','hopdong.Maphongthue','=','phongthue.Maphongthue')   
        ->join('nguoidung','suco.Nguoitao','=','nguoidung.Manguoidung')
        ->where('hopdong.Trangthaihd',$num4)->where('suco.Nguoitao',$mndkh)->where('suco.Trangthaisc',$tt1)->get();
        
        $all_vandekh2 = DB::table('suco')
        ->join('vande','suco.Masuco','=','vande.Masuco')
        ->join('hopdong','vande.Mahopdong','=','hopdong.Mahopdong') 
        ->join('phongthue','hopdong.Maphongthue','=','phongthue.Maphongthue')   
        ->join('nguoidung','suco.Nguoitao','=','nguoidung.Manguoidung')
        ->where('hopdong.Trangthaihd',$num4)->where('suco.Nguoitao',$mndkh)->where('suco.Trangthaisc',$tt2)->get(); 

        return view('khachhang.all_vandekh')->with('all_vandekh1',$all_vandekh1)->with('all_vandekh2',$all_vandekh2);
    }
    public function add_vandekh(){
        $mndkh = Session::get('Manguoidung');
        $num4 = 4;
        $tt = DB::table('hopdong')
        ->join('phongthue','hopdong.Maphongthue','=','phongthue.Maphongthue')
        ->join('khu','phongthue.Makhu','=','khu.Makhu')
        ->join('nguoidung','hopdong.Manguoithue','=','nguoidung.Manguoidung')
        ->where('hopdong.Trangthaihd',$num4)->where('nguoidung.Manguoidung',$mndkh)->get();
        return view('khachhang.add_vandekh')->with('cate_phong',$tt);
    }
    public function save_vande(Request $request){
        $data = array();
        $textDataa = "MSC";
        $get_suco_id = $request->input('suco_id', $textDataa);;
        if($get_suco_id){
            $id_khoan = $get_suco_id.rand(0,9999);
            $data['Masuco'] = $id_khoan;
        }
        $data['Tensuco'] = $request->Tensuco;
        $data['Trangthaisc'] = '1';
        $data['Nguoitao'] = $request->Manguoidung;
        $idsuco = $data['Masuco'];
        DB::table('suco')->insert($data);

        $dataaa = array();
        $textDataaa = "MVD";
        $get_vande_id = $request->input('vande_id', $textDataaa);;
        if($get_vande_id){
            $id_vande = $get_vande_id.rand(0,9999);
            $dataaa['Mavande'] = $id_vande;
        }
        $dataaa['Masuco'] = $idsuco;
        $dataaa['Lidotuchoi'] = '';
        $dataaa['Lidochapnhan'] = '';
        $dataaa['Motavd'] = $request->Motavd;
        $dataaa['Mahopdong'] = $request->Mahopdong;
        $image = $request->file('Anh');
        if($image){
            $get_name_image = $image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$image->getClientOriginalExtension();
            $image->move('public/uploads/vande',$new_image);
            $dataaa['Anh'] = $new_image;
            DB::table('vande')->where('Masuco',$idsuco)->insert($dataaa);

            Session::flash('success', 'Tạo vấn đề - sự cố thành công! Mã sự cố: '. $data['Masuco']);
            return Redirect::to('add-vandekh');
        }
        
    }
    public function delete_vandekh($vande_id){
        $getvande = DB::table('vande')->where('Mavande',$vande_id)->first();
        if($getvande){    
            Session::put('Masuco',$getvande->Masuco);
        } 
        $suco_id = Session::get('Masuco');
        DB::table('vande')->where('Mavande',$vande_id)->delete();
        DB::table('suco')->where('Masuco',$suco_id)->delete();
        Session::flash('success','Xóa thành công! Mã sự cố: ' . $suco_id);
        return Redirect::to('all-vandekh');
    }
}
