<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Session;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
session_start();

class HopdongController extends Controller
{
    public function add_hopdong($hopdong_id){
        
        $add_hopdong = DB::table('hopdong')
        ->join('nguoidung','hopdong.Manguoithue','=','nguoidung.Manguoidung')
        ->join('phongthue','hopdong.Maphongthue','=','phongthue.Maphongthue')
        ->join('khu','phongthue.Makhu','=','khu.Makhu')
        ->where('hopdong.Mahopdong',$hopdong_id)->get();

        return view('chuthue.add_hopdong')->with('add_hopdong',$add_hopdong);
  
    }

    public function save_hopdong(Request $request){
        $data = array();
        $data['Mahopdong'] = $request->Mahopdong;
        $data['Giacoc'] = $request->Gia;
        $data['Trangthai'] = '1';
        $data['Machuthue'] = $request->Machuthue;
        $data['Makhachthue'] = $request->Makhachthue;
        $data['Ngayhethan'] = $request->Ngayhethan;
        DB::table('lichsuhopdong')->insert($data);

        $data_hd = array();
        $up_hopdong = $data['Mahopdong'];
        $data_hd['Trangthaihd'] = '2';
        DB::table('hopdong')->update($data_hd);

        Session::flash('success','Thêm hợp đồng thành công! Mã hợp đồng: ' . $data['Mahopdong']);
        return Redirect::to('add-hopdong/'.$request->Mahopdong);
        
      
    }
    public function show_hopdong($hopdong_id){

        $ctthongbao = DB::table('hopdong')
        ->join('phongthue','hopdong.Maphongthue','=','phongthue.Maphongthue')
        ->join('khu','phongthue.Makhu','=','khu.Makhu')
        ->join('nguoidung','khu.Machuthue','=','nguoidung.Manguoidung')
        ->join('lichsuhopdong','hopdong.Mahopdong','=','lichsuhopdong.Mahopdong')
        ->where('hopdong.Mahopdong',$hopdong_id)->get();

        return view('khachhang.showall_hopdong')->with('detail_hopdong', $ctthongbao);
    }
}
