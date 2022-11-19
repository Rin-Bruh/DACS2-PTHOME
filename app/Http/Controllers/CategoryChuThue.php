<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Product;
use Session;
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
    public function show_quanly(){
        return view('chutro_layout');
    }
    public function quanly(Request $request){
        $chutro_email = $request->chutro_email;
        $chutro_password = ($request->chutro_password);

        $result=  DB::table('nguoidung')->where('Email',$chutro_email)->where('Matkhau',$chutro_password)->first();
        
        if($result){
            Session::put('Hoten',$result->Hoten);
            Session::put('Manguoidung',$result->Manguoidung);
            Session::put('Anh',$result->Anh);
            return Redirect::to('/chutro-quan-ly');
        }else{ 
            Session::flash('error', 'Tài khoản hoặc mật khẩu không đúng!');
            return Redirect::to('/loginct');
        }
    }
    public function logout(){
        Session::put('Hoten',null);
        Session::put('Manguoidung',null);
        Session::put('Anh',null);
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
            $data['Anh'] = $get_image;
            DB::table('nguoidung')->insert($data);
        return Redirect::to('loginkh');
        }
        $data['category_image'] = '';
        DB::table('nguoidung')->insert($data);
        return Redirect::to('loginkh');
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
            $data['Anh'] = $new_image;
            DB::table('nguoidung')->where('Manguoidung',$chutro_info_id)->update($data);
        Session::flash('success','Cập nhật thành công');
        return Redirect::to('edit-chutro-info/'.$chutro_info_id);
        }
        $info = pathinfo(storage_path().'/uploads/chutro/listing-agent.jpg');
        $get_image2 = $info['basename'];
        if($get_image2){
            $data['Anh'] = $get_image2;
            
        DB::table('nguoidung')->where('Manguoidung',$chutro_info_id)->update($data);
        Session::flash('success','Cập nhật thành công');
        return Redirect::to('edit-chutro-info/'.$chutro_info_id);
        }
    }
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
        // $get_khu_id = $request->input('khu_id', $textData);;
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
    public function all_phongct($khupt_id){
        // $id = Session::get('khu_id');
        $result=  DB::table('khu')->where('Makhu',$khupt_id)->first();
        if($result){    
            Session::put('Makhu',$result->Makhu);
        }
        
        $all_phongct = DB::table('phongthue')->join('danhmuc','phongthue.Madanhmuc','=','danhmuc.Madanhmuc')->where('phongthue.Makhu',$khupt_id )->orderby('phongthue.Maphongthue','desc')->get();
        
        $manage_phongct = view('chuthue.all_phongct')->with('all_phongct',$all_phongct);
        return view('chutro_layout')->with('all_phongct',$manage_phongct);
    }
    public function add_category_phongct(){
        // $result=  DB::table('tbl_category_khu')->where('khu_id',$khupt_id)->first();
        // if($result){
        //     Session::put('khu_id',$result->khu_id);
        // }
        $cate_phong = DB::table('danhmuc')->orderby('Madanhmuc','asc')->get();
        
        return view('chuthue.add_phongct')->with('cate_phong',$cate_phong);
    }
    // public function save_category_phongct(Request $request){
    //     $data = array();
    //     $textData = "P";
    //     $get_phongct_id = $request->input('category_phongct_id', $textData);;
    //     if($get_phongct_id){
    //         $name_phongct = $get_phongct_id.rand(0,99999);
    //         $data['phong_id'] = $name_phongct;
    //     }
    //     $data['category_tieude'] = $request->phongct_tieude;
    //     $data['nane_phongct'] = $request->phongct_name;
    //     $data['category_desc'] = $request->phongct_desc;
    //     $data['category_price'] = $request->phongct_price;
    //     $data['category_area'] = $request->phongct_area;
    //     $data['category_iddanhmuc'] = $request->phong_cate;
    //     $data['category_limitpeople'] = $request->phongct_limitpeople;
    //     $data['category_idkhu'] = $request->khu_id;
    //     $data['category_sharedroom'] = '';
    //     $data['category_presentpeople'] = '';
    //     $data['category_idrenter'] = '';
    //     $data['category_status'] = '1';
    //     $get_image = $request->file('category_image');
    //     if($get_image){
    //         $get_name_image = $get_image->getClientOriginalName();
    //         $name_image = current(explode('.',$get_name_image));
    //         $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    //         $get_image->move('public/uploads/phongct',$new_image);
    //         $data['image_phongct'] = $new_image;
    //         DB::table('tbl_category_phongct')->insert($data);
    //     Session::flash('success','Thêm '. $data['nane_phongct'] .' thành công!');
    //     return Redirect::to('add-category-phongct');
    //     }
    //     $data['category_image'] = '';
    //     DB::table('tbl_category_phongct')->insert($data);
    //     Session::flash('success', 'Thêm '. $data['category_name'] .' thành công!');
    //     return Redirect::to('add-category-phongct');
    // }
    // //End Function Admin Page


    // public function show_category_home($category_id){

    //     $cate_phong = DB::table('tbl_category_danhmuc')->where('category_status','1')->orderby('category_id','asc')->get();

    //     $category_by_id = DB::table('tbl_category_phongct')->join('tbl_category_danhmuc','tbl_category_danhmuc.category_id','=','tbl_category_phongct.category_iddanhmuc')->where('tbl_category_phongct.category_iddanhmuc',$category_id)->get();

    //     $category_name = DB::table('tbl_category_danhmuc')->where('tbl_category_danhmuc.category_id',$category_id)->limit(1)->get();

    //     return view('pages.category.show_category')->with('category',$cate_phong)->with('category_by_id',$category_by_id)->with('category_name',$category_name);  
    // }
    // public function details_phongtro($phongtro_id){
    //     $details_phongct = DB::table('tbl_category_phongct')->join('tbl_category_danhmuc','tbl_category_phongct.category_iddanhmuc','=','tbl_category_danhmuc.category_id')->where('tbl_category_phongct.phong_id',$phongtro_id)->get();

    //     $details_khu = DB::table('tbl_category_khu')->join('tbl_category_phongct','tbl_category_khu.khu_id','=','tbl_category_phongct.category_idkhu')->where('tbl_category_phongct.phong_id',$phongtro_id)->get();

    //     foreach($details_khu as $key  => $khu){
    //         $khu_id = $khu->khu_id;
    //     }

    //     $details_chutro = DB::table('tbl_chutro')->join('tbl_category_khu','tbl_chutro.chutro_id','=','tbl_category_khu.chutro_id')->where('tbl_category_khu.khu_id',$khu_id)->get();

    //     foreach($details_phongct as $key  => $value){
    //         $category_id = $value->category_id;
    //     }

    //     $related_phongct = DB::table('tbl_category_phongct')->join('tbl_category_danhmuc','tbl_category_phongct.category_iddanhmuc','=','tbl_category_danhmuc.category_id')->where('tbl_category_danhmuc.category_id',$category_id)->whereNotIn('tbl_category_phongct.phong_id',[$phongtro_id])->get();

    //     return view('pages.phongct.show_details')->with('phongct_details',$details_phongct)->with('relate',$related_phongct)->with('chutro_details', $details_chutro);
    // }
}
