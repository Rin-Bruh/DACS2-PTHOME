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
    public function up(){   
        // INSERT TABLE VAITRO
        DB::table('vaitro')->insert(
            array(
                'Mavaitro' => 'AD',
                'Tenvaitro' => 'Admin'
            )
        );
        DB::table('vaitro')->insert(
            array(
                'Mavaitro' => 'CT',
                'Tenvaitro' => 'Chủ thuê'
            )
        );
        DB::table('vaitro')->insert(
            array(
                'Mavaitro' => 'KH',
                'Tenvaitro' => 'Khách hàng'
            )
        );

        // INSERT TABLE NGUOIDUNG
        DB::table('nguoidung')->insert(
            array(
                'Manguoidung' => 'AD1111',
                'Email' => 'truongquy167@gmail.com',
                'Matkhau' => 'Hoan@1111',
                'SDT' => '0901999344',
                'Hoten' => 'TrongQuy',
                'ngaysinh'  => '2003-11-07',
                'Mavaitro' => 'AD',
                'Anh' => 'Quy3.jpg',
                'CCCD' => '457567463',
                'Gioitinh' => 0

            )
        );

        DB::table('nguoidung')->insert(
            array(
                'Manguoidung' => 'CT1573',
                'Email' => 'truongquy1223@gmail.com',
                'Matkhau' => 'Hoan@1111',
                'SDT' => '0901999334',
                'Hoten' => 'Luân C',
                'ngaysinh'  => '2003-12-01',
                'Mavaitro' => 'CT',
                'Anh' => 'buicay.jpg',
                'CCCD' => '457567463222',
                'Gioitinh' => 0,
            )
        );

        DB::table('nguoidung')->insert(
            array(
                'Manguoidung' => 'KH7757',
                'Email' => 'truongquy111@gmail.com',
                'Matkhau' => 'Hoan@1111',
                'SDT' => '0901999334',
                'Hoten' => 'HOAN LE',
                'ngaysinh'  => '2003-05-11',
                'Mavaitro' => 'KH',
                'Anh' => 'Quy1.jpg',
                'CCCD' => '457567463223',
                'Gioitinh' => 1
            )
        );

        // insert table loai khu
        DB::table('Loaikhu')->insert(
            array(
                'Maloaikhu' => 'LKcn',
                'Tenloaikhu' => 'Khu Công nhân',
                'Trangthai' => 0
            )
        );
        DB::table('Loaikhu')->insert(
            array(
                'Maloaikhu' => 'LKsv',
                'Tenloaikhu' => 'Khu sinh viên',
                'Trangthai' => 0
            )
        );
        DB::table('Loaikhu')->insert(
            array(
                'Maloaikhu' => 'LKvn',
                'Tenloaikhu' => 'Khu văn phòng',
                'Trangthai' => 0
            )
        );
        
        // insert table danh mục
        
        DB::table('Danhmuc')->insert(
            array(
                'Madanhmuc' => 'DM47',
                'Tendanhmuc' => 'Phòng trọ',
                'Trangthai' => 0
            )
        );
        DB::table('Danhmuc')->insert(
            array(
                'Madanhmuc' => 'DM53',
                'Tendanhmuc' => 'Cho thuê căn hộ',
                'Trangthai' => 0
            )
        );
        DB::table('Danhmuc')->insert(
            array(
                'Madanhmuc' => 'DM90',
                'Tendanhmuc' => 'Cho thuê mặt bằng',
                'Trangthai' => 0
            )
        );
        DB::table('Danhmuc')->insert(
            array(
                'Madanhmuc' => 'DM94',
                'Tendanhmuc' => 'Cho thuê nguyên căn',
                'Trangthai' => 0
            )
        );

        // thêm khu 

        DB::table('Khu')->insert(
            array(
                'Makhu' => 'K36676',
                'Tenkhu' => 'Khu A',
                'Diachi' => '32 Phạm Văn Đồng, Hải Châu, Đà Nẵng',
                'Trangthai' => 0,
                'Anh' => 'nha-tro-cho-thue.jpg',
                'Maloaikhu' => 'LKsv',
                'Machuthue' => 'CT1573'
            )
        );

        // insert table thêm phòng
        DB::table('phongthue')->insert(
            array(
                'Maphongthue' => 'P62240',
                'Tenphong' => 'Phòng 1',
                'Tieude'=> 'Cho thuê phòng trọ gần ĐH Việt - Hàn',
                'Mota' => 'Cho thuê...........',
                'Madanhmuc' => 'DM47',
                'Makhu' => 'K36676',
                'Gia' => '2300000',
                'Dientich' => '20.5',
                'Anh' => '3_16054284358.jpg
                ',
                'Dangchiase' => 0,
                'Gioihannguoi' => 2,
                'Trangthai' => 1,
                'Songuoihientai' => 0
            )
        );

        DB::table('phongthue')->insert(
            array(
                'Maphongthue' => 'P34078',
                'Tenphong' => 'Phòng 2',
                'Tieude'=> 'Cho thuê phòng trọ gần ĐH Kinh tế',
                'Mota' => 'Phòng trọ.......',
                'Madanhmuc' => 'DM47',
                'Makhu' => 'K36676',
                'Gia' => '1800000',
                'Dientich' => '22',
                'Anh' => 'properties-img-2-165.jpg',
                'Dangchiase' => 0,
                'Gioihannguoi' => 3,
                'Trangthai' => 1,
                'Songuoihientai' => 0
            )
        );

        DB::table('loaikhoanthanhtoan')->insert(
            array(
                'Maloaikhoan' => '1',
                'Tenloaikhoan' => 'Thanh toán tiền mặt'
            )
        );

        DB::table('loaikhoanthanhtoan')->insert(
            array(
                'Maloaikhoan' => '2',
                'Tenloaikhoan' => 'Thanh toán chuyển khoản'
            )
        );

        DB::table('loaithongbao')->insert(
            array(
                'Maloaithongbao' => '1',
                'Tenloaithongbao' => 'Thông báo thuê'
            )
        );

        
        
        
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