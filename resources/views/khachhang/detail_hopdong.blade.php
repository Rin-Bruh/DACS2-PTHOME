@extends('khachhang_layout')
@section('khachhang_content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <!-- Enable Scrolling & Backdrop Offcanvas -->
            <div class="col-lg-4 col-md-6">
                <!-- <small class="text-light fw-semibold mb-3">Thông báo</small> -->

                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth"
                    aria-controls="offcanvasBoth" onclick="printPage()">
                    In
                </button>
            </div>
        </div>
    </div>
    <?php
                        $name_khach = Session::get('Hoten');
                        $cccd_khach = Session::get('CCCD');
                        $sdt_khach = Session::get('SDT');
                        $ngaysinh_khach = Session::get('Ngaysinh');  

                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $ngay_hientai = date('d');
                        $thang_hientai = date('m');
                        $nam_hientai = date('Y');
                        ?>
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6" id="data">
            <div class="h-100">
                <div class="card-body">
                  @foreach($detail_hopdong as $key => $cate_detail)
                    <h5 style="text-align: center;">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h5>
                    <h6 style="text-align: center;">Độc lập – Tự do – Hạnh phúc</h6>
                    <h4 style="text-align: center; margin-top: 50px;">HỢP ĐỒNG THUÊ PHÒNG TRỌ</h4>
                    <p style=" margin-top: 50px;">Hôm nay ngày {{$ngay_hientai}} tháng {{$thang_hientai}} năm {{$nam_hientai}}.; Tại địa chỉ: {{$cate_detail->Diachi}} <br>

                        Chúng tôi gồm: <br>

                        1.Đại diện bên cho thuê phòng trọ (Bên A): <br>

                        Ông/bà: {{$cate_detail->Hoten}} <br>

                        Số CCCD: {{$cate_detail->CCCD}} <br>

                        Số điện thoại: {{$cate_detail->SDT}} <br>

                        2. Bên thuê phòng trọ (Bên B): <br>

                        Ông/bà: {{$name_khach}} <br>
                        Sinh ngày: <?php $date = str_replace('/', '-', $ngaysinh_khach);
                                            echo date('d-m-Y', strtotime($date)); ?> <br>

                        Số CCCD: {{$cccd_khach}} <br>

                        Số điện thoại: {{$sdt_khach}} <br>

                        Sau khi bàn bạc trên tinh thần dân chủ, hai bên cùng có lợi, cùng thống nhất như sau: <br>

                        Bên A đồng ý cho bên B thuê 01 phòng ở tại địa chỉ: {{$cate_detail->Diachi}} <br>


                        Giá thuê: {{ number_format($cate_detail->Gia).' '.'đ/tháng'}}  <br>

                        
                        Tiền đặt cọc : {{ number_format($cate_detail->Giacoc).' '.'đ'}} <br>

                        Hợp đồng có giá trị kể từ ngày <?php $date = str_replace('/', '-', $cate_detail->Ngaybatdau);
                                            echo date('d', strtotime($date)); ?> tháng <?php $date = str_replace('/', '-', $cate_detail->Ngaybatdau);
                                            echo date('m', strtotime($date)); ?> năm <?php $date = str_replace('/', '-', $cate_detail->Ngaybatdau);
                                            echo date('Y', strtotime($date)); ?>. đến ngày <?php $date = str_replace('/', '-', $cate_detail->Ngayhethan);
                                            echo date('d', strtotime($date)); ?> tháng <?php $date = str_replace('/', '-', $cate_detail->Ngayhethan);
                                            echo date('m', strtotime($date)); ?> năm <?php $date = str_replace('/', '-', $cate_detail->Ngayhethan);
                                            echo date('Y', strtotime($date)); ?>.</p>


                        TRÁCH NHIỆM CHUNG <br>

                        - Hai bên phải tạo điều kiện cho nhau thực hiện hợp đồng. <br>

                        - Trong thời gian hợp đồng còn hiệu lực nếu bên nào vi phạm các điều khoản đã thỏa thuận thì bên còn lại có quyền đơn phương chấm dứt hợp đồng; nếu sự vi phạm hợp đồng đó gây tổn thất cho bên bị vi phạm hợp đồng thì bên vi phạm hợp đồng phải bồi thường thiệt hại. <br>

                        - Một trong hai bên muốn chấm dứt hợp đồng trước thời hạn thì phải báo trước cho bên kia ít nhất 30 ngày và hai bên phải có sự thống nhất. <br>

                        - Bên A phải trả lại tiền đặt cọc cho bên B. <br>

                        - Bên nào vi phạm điều khoản chung thì phải chịu trách nhiệm trước pháp luật. <br>

                        - Hợp đồng được lập thành 02 bản có giá trị pháp lý như nhau, mỗi bên giữ một bản. <br>

                    <p style="text-align: center; margin-top: 5rem; margin-bottom: 5rem;">ĐẠI DIỆN BÊN B
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ĐẠI DIỆN BÊN A</p>
                        @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-3">
        </div>
    </div>

</div>
<script type="text/javascript">
    function printPage() {
        var body = document.getElementById('body').innerHTML;
        var data = document.getElementById('data').innerHTML;
        document.getElementById('body').innerHTML = data;
        window.print();
        document.getElementById('body').innerHTML = body;
    }

</script>

@endsection
