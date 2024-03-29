<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryChuTro;
use App\Http\Controllers\CategoryKhachHang;
use App\Http\Controllers\CategoryChuThue;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryDanhMuc;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    abort(404);
});

Route::get('/', [HomeController::class,'index']);
Route::get('/home',[HomeController::class,'index']);
Route::get('/properties',[HomeController::class,'properties']);
Route::post('/search',[HomeController::class,'search']);

Route::get('/loginkh',[HomeController::class,'loginkh']);
Route::get('/loginct',[HomeController::class,'loginct']);

//Danh mục 
Route::get('/danh-muc-phong-tro/{category_id}',[HomeController::class,'show_category_home']);
Route::get('/chi-tiet-phong-tro/{phongtro_id}',[HomeController::class,'details_phongtro']);

//khachhang
Route::get('/khachhang-quan-ly',[CategoryKhachHang::class,'show_quanly']);
Route::get('/logoutkh',[CategoryKhachHang::class,'logout']);
Route::post('/khachhang-quan-ly',[CategoryKhachHang::class,'quanly']);

Route::get('/registerkh',[CategoryKhachHang::class,'registerkh']);
Route::post('/save-category-khachhang',[CategoryKhachHang::class,'save_category_khachhang']);

Route::get('/edit-khachhang-info/{khachhang_info_id}',[CategoryKhachHang::class,'edit_khachhang_info']);
Route::post('/update-khachhang-info/{khachhang_info_id}',[CategoryKhachHang::class,'update_khachhang_info']); 

Route::get('/all-checkout/{khachhang_id}','App\Http\Controllers\CategoryKhachHang@all_checkout');
Route::get('/detail-hopdongkh/{hopdong_id}','App\Http\Controllers\CategoryKhachHang@detail_hopdongkh');
Route::get('/pay-tiencoc/{hopdong_id}','App\Http\Controllers\CategoryKhachHang@pay_tiencoc');
Route::post('/save-thanhtoan','App\Http\Controllers\CategoryKhachHang@save_thanhtoan');
Route::get('/allshow-hopdongkh','App\Http\Controllers\CategoryKhachHang@allshow_hopdong');
Route::get('/all-phongkh','App\Http\Controllers\CategoryKhachHang@all_phongkh');
Route::get('/info-phongkh/{phong_id}','App\Http\Controllers\CategoryKhachHang@info_phongkh');
Route::get('/info-chuthue/{phong_id}','App\Http\Controllers\CategoryKhachHang@info_chuthue');

Route::get('/all-vandekh','App\Http\Controllers\CategoryKhachHang@all_vandekh');
Route::get('/add-vandekh','App\Http\Controllers\CategoryKhachHang@add_vandekh');
Route::post('/save-vande','App\Http\Controllers\CategoryKhachHang@save_vande');
Route::get('/delete-vandekh/{vande_id}','App\Http\Controllers\CategoryKhachHang@delete_vandekh');

// chuthue
Route::get('/chutro-quan-ly',[CategoryChuThue::class,'show_quanly']);
Route::get('/logoutct',[CategoryChuThue::class,'logout']);
Route::post('/chutro-quan-ly',[CategoryChuThue::class,'quanly']);

Route::get('/registerct',[CategoryChuThue::class,'registerct']);
Route::post('/save-chutro',[CategoryChuThue::class,'save_chutro']);
Route::get('/edit-chutro-info/{chutro_info_id}',[CategoryChuThue::class,'edit_chutro_info']);
Route::post('/update-chutro-info/{chutro_info_id}',[CategoryChuThue::class,'update_chutro_info']); 

Route::get('/all-khu',[CategoryChuThue::class,'all_khu']);
Route::get('/add-khu',[CategoryChuThue::class,'add_khu']);
Route::post('/save-khu',[CategoryChuThue::class,'save_khu']);
Route::get('/edit-khu/{khu_id}',[CategoryChuThue::class,'edit_khu']);
Route::post('/update-khu/{khu_id}',[CategoryChuThue::class,'update_khu']);
Route::get('/delete-khu/{khu_id}',[CategoryChuThue::class,'delete_khu']);

Route::get('/all-phongct/{khupt_id}',[CategoryChuThue::class,'all_phongct']);
Route::get('/add-phongct',[CategoryChuThue::class,'add_phongct']);
Route::post('/save-phongct',[CategoryChuThue::class,'save_phongct']);
Route::get('/edit-phongct/{phongct_id}',[CategoryChuThue::class,'edit_phongct']);
Route::post('/update-phongct/{phongct_id}',[CategoryChuThue::class,'update_phongct']);
Route::get('/delete-phongct/{phongct_id}',[CategoryChuThue::class,'delete_phongct']);

Route::get('/xacnhan-tt/{hopdong_id}','App\Http\Controllers\CategoryChuThue@xacnhan_tt');
Route::post('/save-xacnhan/{hopdong_id}','App\Http\Controllers\CategoryChuThue@save_xacnhan');

Route::get('/allshow-hopdong','App\Http\Controllers\CategoryChuThue@allshow_hopdong');
Route::get('/detail-hopdongct/{hopdong_id}','App\Http\Controllers\CategoryChuThue@detail_hopdongct');
Route::get('/all-thanhtoan','App\Http\Controllers\CategoryChuThue@all_thanhtoan');

Route::get('/all-vandect','App\Http\Controllers\CategoryChuThue@all_vandect');
Route::get('/complete-vandect/{suco_id}','App\Http\Controllers\CategoryChuThue@complete_vandect');

// Backend
Route::get('/admin',[AdminController::class, 'index']);
Route::get('/dashboard',[AdminController::class, 'show_dashboard']);
Route::get('/logout',[AdminController::class, 'logout']);
Route::post('/admin-dashboard',[AdminController::class, 'dashboard']);


//Category danhmuc
Route::get('/add-category-danhmuc',[CategoryDanhMuc::class,'add_category_danhmuc']);
Route::get('/edit-category-danhmuc/{category_danhmuc_id}',[CategoryDanhMuc::class,'edit_category_danhmuc']);
Route::get('/delete-category-danhmuc/{category_danhmuc_id}',[CategoryDanhMuc::class,'delete_category_danhmuc']);
Route::get('/all-category-danhmuc',[CategoryDanhMuc::class,'all_category_danhmuc']);

Route::get('/unactive-category-danhmuc/{category_danhmuc_id}',[CategoryDanhMuc::class,'unactive_category_danhmuc']);
Route::get('/active-category-danhmuc/{category_danhmuc_id}',[CategoryDanhMuc::class,'active_category_danhmuc']);

Route::post('/save-category-danhmuc',[CategoryDanhMuc::class,'save_category_danhmuc']); 
Route::post('/update-category-danhmuc/{category_danhmuc_id}',[CategoryDanhMuc::class,'update_category_danhmuc']); 

// yeu thich
// Route::post('/save-cart','App\Http\Controllers\CartController@save_cart');

//checkout
Route::get('/login-checkout/{maphong}','App\Http\Controllers\CheckoutController@login_checkout');
// Route::get('/login-checkout',[CheckoutController::class,'login_checkout']);
Route::get('/add-khachhang','App\Http\Controllers\CheckoutController@add_khachhang');
Route::post('/dangnhap-checkout','App\Http\Controllers\CheckoutController@dangnhap_checkout');

Route::get('/checkout/{maphong}','App\Http\Controllers\CheckoutController@checkout');


Route::post('/add-checkout/{khachhang_id}','App\Http\Controllers\CheckoutController@add_checkout');

// hopdong
Route::get('/add-hopdong/{hopdong_id}','App\Http\Controllers\HopdongController@add_hopdong');
Route::post('/save-hopdong','App\Http\Controllers\HopdongController@save_hopdong');
