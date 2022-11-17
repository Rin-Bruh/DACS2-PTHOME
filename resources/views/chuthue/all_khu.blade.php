@extends('chutro_layout')
@section('chutro_content')

    <div class="container-xxl flex-grow-1 container-p-y">
    <!-- Bordered Table -->
                    <h5 class="card-header">Danh sách khu cho thuê</h5>
                    <!-- <hr class="my-1" /> -->
                    <div class="card-body">
                    <a href="{{URL::to('/add-khu')}}" class="btn btn-outline-success">Thêm khu cho thuê</a>
                    </div>
                    
              <div class="row mb-5">
              @foreach($all_khu as $key => $cate_pro)
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                    <a href="{{URL::to('/edit-khu/'.$cate_pro->Makhu)}}">
                    <div class="card-body">
                      <h5 class="card-title">{{  $cate_pro->Tenkhu }}</h5>
                      <h6 class="card-subtitle text-muted">{{  $cate_pro->Diachi }}</h6>
                      <img class="img-fluid d-flex mx-auto my-4" src="{{URL::to('public/uploads/khu/'.$cate_pro->Anh )}}" alt="Card image cap">
                      
                      <!-- <p class="card-text"><?php
                                  if($cate_pro->Maloaikhu=='LKsv'){
                              ?>
                                Khu sinh viên
                               <?php
                                  }else if($cate_pro->Maloaikhu=='LKcn'){
                              ?>
                                Khu công nhân
                              <?php
                                  }else if($cate_pro->Maloaikhu=='LKvn'){
                              ?>
                                Khu văn phòng
                              <?php        
                                  }   
                              ?>
                      </p> -->
                      <a href="{{URL::to('/all-phongct/'.$cate_pro->Makhu)}}" class="btn btn-outline-success">Danh sách phòng cho thuê</a>
                      <a class="btn btn-outline-danger" href="{{URL::to('/delete-khu/'.$cate_pro->Makhu)}}"><i class="bx bx-trash me-1"></i> Xóa</a>
                    </div>
                    </a>
                  </div>
                </div>
                @endforeach
              </div>
                  
                  <!--/ Bordered Table -->

                  <hr class="my-5" />
              </div>

@endsection