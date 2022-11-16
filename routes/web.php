<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('/home','App\Http\Controllers\HomeController@index');
// Route::get('/properties','App\Http\Controllers\HomeController@properties');
// Route::post('/search','App\Http\Controllers\HomeController@search');

Route::get('/loginkh','App\Http\Controllers\HomeController@loginkh');
Route::get('/loginct','App\Http\Controllers\HomeController@loginct');

//Danh mục 
// Route::get('/danh-muc-phong-tro/{category_id}','App\Http\Controllers\CategoryChuTro@show_category_home');
// Route::get('/chi-tiet-phong-tro/{phongtro_id}','App\Http\Controllers\CategoryChuTro@details_phongtro');

//khachhang
Route::get('/khachhang-quan-ly','App\Http\Controllers\CategoryKhachHang@show_quanly');
Route::get('/logoutkh','App\Http\Controllers\CategoryKhachHang@logout');
Route::post('/khachhang-quan-ly','App\Http\Controllers\CategoryKhachHang@quanly');

Route::get('/registerkh','App\Http\Controllers\CategoryKhachHang@registerkh');
Route::post('/save-category-khachhang','App\Http\Controllers\CategoryKhachHang@save_category_khachhang');

Route::get('/edit-khachhang-info/{khachhang_info_id}','App\Http\Controllers\CategoryKhachHang@edit_khachhang_info');
Route::post('/update-khachhang-info/{khachhang_info_id}','App\Http\Controllers\CategoryKhachHang@update_khachhang_info'); 

// chuthue
Route::get('/chutro-quan-ly','App\Http\Controllers\CategoryChuThue@show_quanly');
Route::get('/logoutct','App\Http\Controllers\CategoryChuThue@logout');
Route::post('/chutro-quan-ly','App\Http\Controllers\CategoryChuThue@quanly');

Route::get('/registerct','App\Http\Controllers\CategoryChuThue@registerct');
Route::post('/save-chutro','App\Http\Controllers\CategoryChuThue@save_chutro');
Route::get('/edit-chutro-info/{chutro_info_id}','App\Http\Controllers\CategoryChuThue@edit_chutro_info');
Route::post('/update-chutro-info/{chutro_info_id}','App\Http\Controllers\CategoryChuThue@update_chutro_info'); 

// Route::get('/all-category-khu','App\Http\Controllers\CategoryChuTro@all_category_khu');
// Route::get('/add-category-khu','App\Http\Controllers\CategoryChuTro@add_category_khu');
// Route::post('/save-category-khu','App\Http\Controllers\CategoryChuTro@save_category_khu');
// Route::get('/edit-category-khu/{category_khu_id}','App\Http\Controllers\CategoryChuTro@edit_category_khu');
// Route::post('/update-category-khu/{category_khu_id}','App\Http\Controllers\CategoryChuTro@update_category_khu');
// Route::get('/delete-category-khu/{category_khu_id}','App\Http\Controllers\CategoryChuTro@delete_category_khu');

// Route::get('/all-category-phongct/{khupt_id}','App\Http\Controllers\CategoryChuTro@all_category_phongct');
// Route::get('/add-category-phongct','App\Http\Controllers\CategoryChuTro@add_category_phongct');
// Route::post('/save-category-phongct','App\Http\Controllers\CategoryChuTro@save_category_phongct');
// Route::get('/edit-category-phongct/{category_phongct_id}','App\Http\Controllers\CategoryChuTro@edit_category_phongct');
// Route::post('/update-category-phongct/{category_phongct_id}','App\Http\Controllers\CategoryChuTro@update_category_phongct');
// Route::get('/delete-category-phongct/{category_phongct_id}','App\Http\Controllers\CategoryChuTro@delete_category_phongct');



// Backend
Route::get('/admin','App\Http\Controllers\AdminController@index');
// Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');
// Route::get('/logout','App\Http\Controllers\AdminController@logout');
// Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');


//Category danhmuc
// Route::get('/add-category-danhmuc','App\Http\Controllers\CategoryDanhMuc@add_category_danhmuc');
// Route::get('/edit-category-danhmuc/{category_danhmuc_id}','App\Http\Controllers\CategoryDanhMuc@edit_category_danhmuc');
// Route::get('/delete-category-danhmuc/{category_danhmuc_id}','App\Http\Controllers\CategoryDanhMuc@delete_category_danhmuc');
// Route::get('/all-category-danhmuc','App\Http\Controllers\CategoryDanhMuc@all_category_danhmuc');

// Route::get('/unactive-category-danhmuc/{category_danhmuc_id}','App\Http\Controllers\CategoryDanhMuc@unactive_category_danhmuc');
// Route::get('/active-category-danhmuc/{category_danhmuc_id}','App\Http\Controllers\CategoryDanhMuc@active_category_danhmuc');

// Route::post('/save-category-danhmuc','App\Http\Controllers\CategoryDanhMuc@save_category_danhmuc'); 
// Route::post('/update-category-danhmuc/{category_danhmuc_id}','App\Http\Controllers\CategoryDanhMuc@update_category_danhmuc'); 

