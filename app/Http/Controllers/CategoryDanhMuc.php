<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Product;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryDanhMuc extends Controller
{
    public function AuthLogin(){
        $id_nguoidung = Session::get('Manguoidung');
        if($id_nguoidung){
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_danhmuc(){
        $this->AuthLogin();
        return view('admin.add_category_danhmuc');
    }
    public function all_category_danhmuc(){
        $this->AuthLogin();
        $all_category_danhmuc = DB::table('danhmuc')->get();
        $manage_category_danhmuc = view('admin.all_category_danhmuc')->with('all_category_danhmuc',$all_category_danhmuc);
        return view('admin_layout')->with('all_category_danhmuc',$manage_category_danhmuc);
    }
    public function save_category_danhmuc(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['Tendanhmuc'] = $request->Tendanhmuc;
        $textData = "DM";
        if($textData){
            $madanhmuc = $textData.rand(0,99);
            $data['Madanhmuc'] = $madanhmuc;
        }
        $data['Trangthai'] = $request->Trangthai;
        
        
        DB::table('danhmuc')->insert($data);
        Session::flash('success', 'Thêm '. $data['Tendanhmuc'] .' thành công!');
        return Redirect::to('add-category-danhmuc');
    }
    public function unactive_category_danhmuc($category_danhmuc_id){
        $this->AuthLogin();
        DB::table('danhmuc')->where('Madanhmuc',$category_danhmuc_id)->update(['Trangthai'=>0]);
        Session::flash('success','Ẩn thành công');
        return Redirect::to('all-category-danhmuc');
    }
    public function active_category_danhmuc($category_danhmuc_id){
        $this->AuthLogin();
        DB::table('danhmuc')->where('Madanhmuc',$category_danhmuc_id)->update(['Trangthai'=>1]);
        Session::flash('success','Hiển thị thành công');
        return Redirect::to('all-category-danhmuc');
    }
    public function edit_category_danhmuc($category_danhmuc_id){
        $this->AuthLogin();
        $edit_category_danhmuc = DB::table('danhmuc')->where('Madanhmuc',$category_danhmuc_id)->get();
        $manage_category_danhmuc = view('admin.edit_category_danhmuc')->with('edit_category_danhmuc',$edit_category_danhmuc);
        return view('admin_layout')->with('edit_category_danhmuc',$manage_category_danhmuc);
    }
    public function update_category_danhmuc(Request $request, $category_danhmuc_id){
        $this->AuthLogin();
        $data = array();
        $data['Tendanhmuc'] = $request->Tendanhmuc;
        DB::table('danhmuc')->where('Madanhmuc',$category_danhmuc_id)->update($data);
        Session::flash('success','Cập nhật thành công');
        return Redirect::to('all-category-danhmuc');
    }
    public function delete_category_danhmuc($category_danhmuc_id){
        $this->AuthLogin();
        DB::table('danhmuc')->where('Madanhmuc',$category_danhmuc_id)->delete();
        Session::flash('success','Xóa thành công');
        return Redirect::to('all-category-danhmuc');
    }
}
