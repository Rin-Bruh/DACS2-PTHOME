@extends('khachhang_layout')
@section('khachhang_content')

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Bordered Table -->
  
        <h5 class="card-header">Danh sách phòng đang thuê</h5>
        <!-- <hr class="my-1" /> -->
        
    <div class="row mb-5">
    @foreach($all_phongkh as $key => $cate_phongkh)
                <div class="col-md-6 col-lg-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h5 class="card-title">{{  $cate_phongkh->Tenphong }}</h5>
                      <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                          <h6 class="alert-heading fw-bold mb-1"><?php $date = str_replace('/', '-', $cate_phongkh->Ngaybatdau); ?>
                                 <strong title="">
                                 Ngày đăng kí <?php echo date('d-m-Y', strtotime($date)); ?>, Hạn vào ở là <?php echo date('d-m-Y', strtotime("+7 day", strtotime($date))); ?> </strong>
                          </h6>
                          <p class="mb-0">Sau khoảng thời gian trên, hệ thống sẽ xác nhận bạn không thuê phòng.</p>
                        </div>
                      </div>
                      <h6 class="card-subtitle text-muted"></h6>
                      <img class="img-fluid d-flex mx-auto my-4" src="{{URL::to('public/uploads/phongct/'.$cate_phongkh->Anh )}}">
                      <a class="btn btn-outline-info" href="{{URL::to('/info-phongkh/'.$cate_phongkh->Maphongthue)}}"></i> Thông tin phòng</a>
                      <a class="btn btn-outline-info" href="{{URL::to('/info-chuthue/'.$cate_phongkh->Maphongthue)}}"></i> Thông tin chủ thuê</a>
                      <a class="btn btn-outline-danger" href=""></i> Ngừng thuê</a>
                    </div>
                    <!-- </a> -->
                  </div>
                </div>
                @endforeach
              </div>

    <hr class="my-5" />
</div>

@endsection
