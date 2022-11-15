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
        // $cate_phong = DB::table('tbl_category_danhmuc')->where('category_status','1')->orderby('category_id','asc')->get();
        // $all_phong = DB::table('tbl_category_phongct')->where('category_status','1')->orderby('phong_id','desc')->limit(7)->get();
        return view('pages.home');
    }
    // public function properties(){   ->with('category',$cate_phong)->with('all_phong',$all_phong)
    //     $cate_phong = DB::table('tbl_category_danhmuc')->where('category_status','1')->orderby('category_id','asc')->get();

    //     // $all_category_phongct = DB::table('tbl_category_phongct')->join('tbl_category_danhmuc','tbl_category_phongct.category_iddanhmuc','=','tbl_category_danhmuc.category_id')->orderby('tbl_category_phongct.phong_id','desc')->get();

    //     $all_phong = DB::table('tbl_category_phongct')->where('category_status','1')->orderby('phong_id','desc')->limit(9)->get();
        
    //     return view('pages.properties')->with('category',$cate_phong)->with('all_phong',$all_phong);
    // }
    public function loginkh(){ 
        return view('pages.register_login.loginkh');
    }
    public function loginct(){ 
        return view('pages.register_login.loginct');
    }
    // public function search(Request $request){
    //     $keywords = $request->keywords_submit;
    //     $cate_phong = DB::table('tbl_category_danhmuc')->where('category_status','1')->orderby('category_id','asc')->get();

    //     $search_phong = DB::table('tbl_category_phongct')->where('category_tieude','like','%'.$keywords.'%')->orWhere('category_price','like','%'.$keywords.'%')->orWhere('category_area','like','%'.$keywords.'%')->get();
        
    //     return view('pages.phongct.search')->with('category',$cate_phong)->with('search_phong',$search_phong);
    // }
}
