@extends('chutro_layout')
@section('chutro_content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- <div aria-live="polite" aria-atomic="true">

        <div class="toast-container top-0 end-0 p-3">

            @foreach($thongbao_info as $key => $info_tb)

            <div class="bs-toast toast bg-warning show" role="alert" aria-live="assertive" aria-atomic="true"
                data-bs-delay="1000">
                <div class="toast-header">
                    <i class="bx bx-bell me-2"></i>
                    <div class="me-auto fw-semibold">{{$info_tb->Tenloaithongbao}}</div>
                    <small>11 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">{{$info_tb->Noidung}}<div class="mt-2 pt-2 border-top">
                <button type="button" class="btn btn-primary btn-sm">Xem chi tiết</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="toast">Đóng</button>
                </div>
                </div>
            </div>

            @endforeach
        </div>
    </div> -->
    <div class="card">
        <div class="card-body">
            <!-- Enable Scrolling & Backdrop Offcanvas -->
            <div class="col-lg-4 col-md-6">
                <!-- <small class="text-light fw-semibold mb-3">Thông báo</small> -->
                
                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasBoth" aria-controls="offcanvasBoth">
                        Thông báo
                    </button>
                    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasBoth"
                        aria-labelledby="offcanvasBothLabel">
                        <div class="offcanvas-header">
                            <h5 id="offcanvasBothLabel" class="offcanvas-title">Thông báo</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body my-auto mx-0">
                            <div class="toast-container">
                                @foreach($thongbao_info as $key => $info_tb)
                                <div class="bs-toast toast fade bg-info show" role="alert" aria-live="assertive"
                                    aria-atomic="true">
                                    <div class="toast-header">
                                        <i class="bx bx-bell me-2"></i>
                                        <div class="me-auto fw-semibold">{{$info_tb->Tenloaithongbao}}</div>                                       
                                        <small>Vài phút trước</small>
                                        <button type="button" class="btn-close" data-bs-dismiss="toast"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="toast-body">{{$info_tb->Tieude}}
                                      </div>
                                    <div class="toast-body">{{$info_tb->Noidung}}
                                </div>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>

                   
                        
               
            </div>
        </div>
    </div>
    <hr class="my-5" />

              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">Đăng kí thuê</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>Mã yêu cầu</th>
                        <th>Phòng yêu cầu thuê</th>
                        <th>Ngày bắt đầu thuê</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($ctthongbao as $key => $ct_tb)
                      <tr>
                        <td><strong>{{ $ct_tb->Mahopdong }}</strong></td>
                        <td>{{ $ct_tb->Tenphong }}</td>
                        <td>
                        <?php $date = str_replace('/', '-', $ct_tb->Ngaybatdau);
                                            echo date('d-m-Y', strtotime($date)); ?>
                        </td>
                        <td>
                        <?php
                                  if($ct_tb->Trangthaihd==1){
                              ?>
                                      <span class="badge bg-label-info me-1">Chờ xác nhận</span>
                              <?php
                                  }else{
                              ?>
                                      <span class="badge bg-label-success me-1">Đã xác nhận</span>
                              <?php        
                                  }   
                              ?>
                          </td>
                        <td>
                        <a class="btn btn-outline-success" href="{{URL::to('/add-hopdong/'.$ct_tb->Mahopdong)}}" role="button">Xác nhận thuê</a>
                        <a class="btn btn-outline-danger" href="{{URL::to('/delete-hopdong/'.$ct_tb->Mahopdong)}}" role="button"><i class="bx bx-trash me-1"></i> Từ chối</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>


              <hr class="my-5" />

              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">Chờ thanh toán</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>Mã hợp đồng</th>
                        <th>Phòng yêu cầu thuê</th>
                        <th>Ngày bắt đầu thuê</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($ctthongbao2 as $key => $ct_tb2)
                      <tr>
                        <td><strong>{{ $ct_tb2->Mahopdong }}</strong></td>
                        <td>{{ $ct_tb2->Tenphong }}</td>
                        <td>
                        <?php $date = str_replace('/', '-', $ct_tb2->Ngaybatdau);
                                            echo date('d-m-Y', strtotime($date)); ?>
                        </td>
                        <td>
                        <?php
                                  if($ct_tb2->Trangthaihd==2){
                              ?>
                                      <span class="badge bg-label-info me-1">Chờ thanh toán</span>
                              <?php
                                  }else{
                              ?>
                                      <span class="badge bg-label-success me-1"></span>
                              <?php        
                                  }   
                              ?>
                          </td>
                        <td>
                        <a class="btn btn-outline-success" href="{{URL::to('/show-hopdong/'.$ct_tb2->Mahopdong)}}" role="button">Xem lại hợp đồng</a>
                        <a class="btn btn-outline-danger" href="{{URL::to('/delete-hopdong/'.$ct_tb2->Mahopdong)}}" role="button"><i class="bx bx-trash me-1"></i> Xóa</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <hr class="my-5" />

              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">Xác nhận thanh toán</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>Mã hợp đồng</th>
                        <th>Phòng yêu cầu thuê</th>
                        <th>Ngày bắt đầu thuê</th>
                        <th style="text-align: center;">Trạng thái</th>
                        <th style="text-align: center;">Hành động</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($ctthongbao3 as $key => $ct_tb3)
                      <tr>
                        <td><strong>{{ $ct_tb3->Mahopdong }}</strong></td>
                        <td>{{ $ct_tb3->Tenphong }}</td>
                        <td>
                        <?php $date = str_replace('/', '-', $ct_tb3->Ngaybatdau);
                                            echo date('d-m-Y', strtotime($date)); ?>
                        </td>
                        <td>
                                      <span class="badge bg-label-info me-1" title="Vui lòng xác nhận thanh toán">Đang xử lý thanh toán</span>
                          </td>
                        <td>
                        <a class="btn btn-outline-info" href="{{URL::to('/show-hopdong/'.$ct_tb3->Mahopdong)}}" role="button">Xem lại hợp đồng</a>
                        <a class="btn btn-outline-success" href="{{URL::to('/xacnhan-tt/'.$ct_tb3->Mahopdong)}}" role="button"> Xác nhận thanh toán</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
</div>


<!-- <style>
.toast-container {
position: fixed;
right: 20px;
top: 20px;
z-index: 1095;
}

.toast:not(.showing):not(.show) {
display: none !important;
}

</style> -->
@endsection
