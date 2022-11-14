<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Khoanthanhtoan', function (Blueprint $table){
            $table->foreign('NGUOIGUI')->references('MANGUOIDUNG')->on('NGUOIDUNG');
            $table->foreign('NGUOINHAN')->references('MANGUOIDUNG')->on('NGUOIDUNG');
            $table->foreign('MAHOPDONG')->references('MAHOPDONG')->on('HOPDONG');
            $table->foreign('Makhoanthanhtoan')->references('MALOAIKHOAN')->on('LOAIKHOANTHANHTOAN'); 
         });
 
        Schema::table('Nguoidung', function (Blueprint $table){
             $table->foreign('MAVAITRO')->references('MAVAITRO')->on('VAITRO');
         });
         Schema::table('THONGBAO', function (Blueprint $table){
             $table->foreign('NGUOITAO')->references('MANGUOIDUNG')->on('NGUOIDUNG');
             $table->foreign('LOAITHONGBAO')->references('MALOAITHONGBAO')->on('LOAITHONGBAO');
         });
        Schema::table('THONGBAOCHO', function (Blueprint $table){
             $table->foreign('MATHONGBAO')->references('MATHONGBAO')->on('THONGBAO');
             $table->foreign('NGUOIDUNGTHONGBAO')->references('MANGUOIDUNG')->on('NGUOIDUNG');
         });
 
         Schema::table('PHONGTHUE', function (Blueprint $table){
             $table->foreign('MANGUOIDUNG')->references('MANGUOIDUNG')->on('NGUOIDUNG');
             $table->foreign('MAHOPDONG')->references('MAHOPDONG')->on('HOPDONG');
             $table->foreign('MAKHU')->references('MAKHU')->on('KHU');
         });
 
         Schema::table('KHU', function (Blueprint $table){
             $table->foreign('MALOAIKHU')->references('MALOAIKHU')->on('LOAIKHU');
             $table->foreign('MACHUTHUE')->references('MANGUOIDUNG')->on('NGUOIDUNG');
         });
 
         Schema::table('VANDE', function (Blueprint $table){
             $table->foreign('MAHOPDONG')->references('MAHOPDONG')->on('HOPDONG');
             $table->foreign('MASUCO')->references('MASUCO')->on('SUCO');
         });
 
         Schema::table('SUCO', function (Blueprint $table){
             $table->foreign('NGUOITAO')->references('MANGUOIDUNG')->on('NGUOIDUNG');
 
         });
 
         Schema::table('LICHSUHOPDONG', function (Blueprint $table){
             $table->foreign('MAHOPDONG')->references('MAHOPDONG')->on('HOPDONG');
             $table->foreign('MAKHACHTHUE')->references('MANGUOIDUNG')->on('NGUOIDUNG');
             $table->foreign('MACHUTHUE')->references('MANGUOIDUNG')->on('NGUOIDUNG');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};