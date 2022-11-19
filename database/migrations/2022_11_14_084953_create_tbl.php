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


        // Create a new migration
        Schema::create('Nguoidung', function (Blueprint $tbl){
            
            $tbl->String('Manguoidung',20)->primary();
            $tbl->String('Email',50);
            $tbl->String('Matkhau',50);
            $tbl->String('SDT',10);
            $tbl->String('Hoten',50);
            $tbl->dateTime('Ngaysinh');
            $tbl->String('Mavaitro',20);
            $tbl->text('Anh');
            $tbl->String('CCCD',12);
            $tbl->tinyInteger('Gioitinh');
        });


        Schema::create('Vaitro', function (Blueprint $tbl){
            
            $tbl->String('Mavaitro',20)->primary();
            $tbl->String('Tenvaitro',50);
        });


        Schema::create('Khoanthanhtoan', function (Blueprint $tbl){
            
            $tbl->String('Makhoan',20)->primary();
            $tbl->String('Mahopdong',20);
            $tbl->String('Makhoanthanhtoan',20);
            $tbl->Integer('Giatri');
            $tbl->tinyInteger('Trangthai');
            $tbl->text('Noidung');
            $tbl->dateTime('Thoigiantra');
            $tbl->dateTime('Hanthanhtoan');
            $tbl->String('Nguoigui',20);
            $tbl->String('Nguoinhan',20);
        });


        Schema::create('loaikhoanthanhtoan', function (Blueprint $tbl){
            
            $tbl->String('Maloaikhoan',20)->primary();
            $tbl->String('Tenloaikhoan',50);
        });


        Schema::create('Thongbao' ,function (Blueprint $tbl){
            
            $tbl->String('Mathongbao',20)->primary();
            $tbl->text('Noidung');
            $tbl->String('Tieude',250);
            $tbl->dateTime('Thoigian');
            $tbl->tinyInteger('Trangthai');
            $tbl->String('Loaithongbao',20);
            $tbl->String('Nguoitao',20);
        });


        Schema::create('Thongbaocho', function (Blueprint $tbl){
            
            $tbl->String('Nguoidungthongbao',20);
            $tbl->String('Mathongbao',20);
            $tbl->tinyInteger('Trangthai');
        });


        Schema::create('Loaithongbao', function (Blueprint $tbl){
            
            $tbl->String('Maloaithongbao', 20)->primary();
            $tbl->String('Tenloaithongbao', 50);
        });


        Schema::create('Phongthue', function (Blueprint $tbl){
            
            $tbl->String('Maphongthue',20)->primary();
            $tbl->String('Tenphong',250);
            $tbl->String('Tieude',250);
            $tbl->text('Mota');
            $tbl->String('Madanhmuc',20);
            $tbl->String('Makhu',20);
            $tbl->Integer('Gia');
            $tbl->Float('Dientich');
            $tbl->text('Anh');
            $tbl->boolean('Dangchiase');
            $tbl->tinyInteger('Gioihannguoi');
            $tbl->tinyInteger('Trangthai');
            $tbl->integer('Songuoihientai');
            
            
        });
        
        Schema::create('Danhmuc', function (Blueprint $tbl){
            $tbl->String('Madanhmuc',20)->primary();
            $tbl->String('Tendanhmuc',20);
            $tbl->tinyInteger('Trangthai');
        });

        Schema::create('Khu', function (Blueprint $tbl){
            
            $tbl->String('Makhu',20)->primary();
            $tbl->String('Tenkhu',250);
            $tbl->String('Diachi',250);
            $tbl->tinyInteger('Trangthai');
            $tbl->text('Anh');
            $tbl->String('Maloaikhu',20);
            $tbl->String('Machuthue',20);
        });

        Schema::create('Loaikhu', function (Blueprint $tbl){
            
            $tbl->String('Maloaikhu',20)->primary();
            $tbl->String('Tenloaikhu',20);
            $tbl->tinyInteger('Trangthai');
        });

        Schema::create('Hopdong', function (Blueprint $tbl){
            
            $tbl->String('Mahopdong',20)->primary();
            $tbl->dateTime('Ngayki');
            $tbl->tinyInteger('Trangthai');
            $tbl->dateTime('Ngaybatdau');
            $tbl->String('Maphongthue',20);
            $tbl->String('Manguoidung',20);
        });


        Schema::create('Vande', function (Blueprint $tbl){
            
            $tbl->String('Mavande',20)->primary();
            $tbl->String('Masuco',20);
            $tbl->text('Mota');
            $tbl->text('Anh');
            $tbl->text('Lidotuchoi');
            $tbl->text('Lidochapnhan');
            $tbl->String('Mahopdong',20);
        });


        Schema::create('Suco', function (Blueprint $tbl){
            
            $tbl->String('Masuco',20)->primary();
            $tbl->String('Tensuco',250);
            $tbl->tinyInteger('Trangthai');
            $tbl->String('Nguoitao',20);
        });


        Schema::create('Lichsuhopdong', function (Blueprint $tbl){
            
            $tbl->String('Mahopdong',20);
            $tbl->Integer('Gia');
            $tbl->tinyInteger('Trangthai');
            $tbl->String('Machuthue',20);
            $tbl->String('Makhachthue',20);
            $tbl->text('Anh');
            $tbl->text('Mota');
            $tbl->dateTime('Ngayhethan');
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl');
    }
};