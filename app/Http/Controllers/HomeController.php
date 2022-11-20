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

class HomeController extends Controller
{
    public function index(){ 
        $cate_phong = DB::table('danhmuc')->where('Trangthai','1')->orderby('Madanhmuc','asc')->get();
        $all_phong = DB::table('phongthue')->where('Trangthai','1')->orderby('Maphongthue','desc')->limit(7)->get();
        return view('pages.home')->with('category',$cate_phong)->with('all_phong',$all_phong);
    }
    public function properties(){   
        $cate_phong = DB::table('danhmuc')->where('Trangthai','1')->orderby('Madanhmuc','asc')->get();

        // $all_category_phongct = DB::table('tbl_category_phongct')->join('tbl_category_danhmuc','tbl_category_phongct.category_iddanhmuc','=','tbl_category_danhmuc.category_id')->orderby('tbl_category_phongct.phong_id','desc')->get();

        $all_phong = DB::table('phongthue')->where('Trangthai','1')->orderby('Maphongthue','desc')->limit(9)->get();
        
        return view('pages.properties')->with('category',$cate_phong)->with('all_phong',$all_phong);
    }
    public function loginkh(){ 
        return view('pages.register_login.loginkh');
    }
    public function loginct(){ 
        return view('pages.register_login.loginct');
    }
    public function search(Request $request){
        $keywords = $request->keywords_submit;
        $cate_phong = DB::table('danhmuc')->where('Trangthai','1')->orderby('Madanhmuc','asc')->get();

        $search_phong = DB::table('phongthue')->where('Tieude','like','%'.$keywords.'%')->orWhere('Gia','like','%'.$keywords.'%')->get();
        
        return view('pages.phongct.search')->with('category',$cate_phong)->with('search_phong',$search_phong);
    }

    public function show_category_home($category_id){

        $cate_phong = DB::table('danhmuc')->where('Trangthai','1')->orderby('Madanhmuc','asc')->get();

        $category_by_id = DB::table('phongthue')->join('danhmuc','danhmuc.Madanhmuc','=','phongthue.Madanhmuc')->where('phongthue.Madanhmuc',$category_id)->get();

        $category_name = DB::table('danhmuc')->where('danhmuc.Madanhmuc',$category_id)->limit(1)->get();

        return view('pages.category.show_category')->with('category',$cate_phong)->with('category_by_id',$category_by_id)->with('category_name',$category_name);  
    }
    public function details_phongtro($phongtro_id){
        $details_phongct = DB::table('phongthue')->join('danhmuc','phongthue.Madanhmuc','=','danhmuc.Madanhmuc')->where('phongthue.Maphongthue',$phongtro_id)->get();
        foreach($details_phongct as $key  => $value){
            $Madanhmuc = $value->Madanhmuc;
        }

        $details_khu = DB::table('khu')->join('phongthue','khu.Makhu','=','phongthue.Makhu')->where('phongthue.Maphongthue',$phongtro_id)->get();
        foreach($details_khu as $key  => $khu){
            $khu_id = $khu->Makhu;
        }

        $details_chutro = DB::table('nguoidung')->join('khu','nguoidung.Manguoidung','=','khu.Machuthue')->where('khu.Makhu',$khu_id)->get();

        
        $related_phongct = DB::table('phongthue')->join('danhmuc','phongthue.Madanhmuc','=','danhmuc.Madanhmuc')->where('danhmuc.Madanhmuc',$Madanhmuc)->whereNotIn('phongthue.Maphongthue',[$phongtro_id])->get();

        return view('pages.phongct.show_details')->with('phongct_details',$details_phongct)->with('relate',$related_phongct)->with('chutro_details', $details_chutro);
    }
}
