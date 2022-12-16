@extends('khachhang_layout')
@section('khachhang_content')

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Bordered Table -->
    <div class="card">
                    <h5 class="card-header">Danh sách đăng kí</h5>
                    <div class="card-body">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>STT</th>
                              <th>Mã yêu cầu</th>
                              <th>Phòng yêu cầu thuê</th>
                              <th>Ngày bắt đầu thuê</th>
                              <th>Trạng thái</th>
                              <th>Hành động</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php 
                                $count = 1;
                              ?>
                            @foreach($showall_checkout as $key => $cate_check)
                            <tr>
                              <td> <?php 
                               echo $count;
                               $count++;
                              ?></td>
                              <td>
                                 <strong>{{  $cate_check->Mahopdong }}</strong>
                              </td>
                              <td>
                                 <strong>{{  $cate_check->Tenphong }}</strong>
                              </td>
                              <td>
                              <?php $date = str_replace('/', '-', $cate_check->Ngaybatdau); ?>
                                 <strong title="Hạn vào ở là <?php echo date('d-m-Y', strtotime("+7 day", strtotime($date))); ?>">
                                     <?php echo date('d-m-Y', strtotime($date)); ?></strong>
                              </td>
                              <td>
                                 <strong><?php
                                  if($cate_check->Trangthaihd==1){
                              ?>
                                      <div href="#" title="Đang yêu cầu">Đang yêu cầu</div>
                              <?php
                                  }else if($cate_check->Trangthaihd==2){
                              ?>
                                      <div href="#" title="Thanh toán trước ngày <?php echo date('d-m-Y', strtotime($date)); ?>">Chờ thanh toán</div>
                              <?php
                                  }else if($cate_check->Trangthaihd==3){
                              ?>
                                      <div href="#" title="Đang xử lý thanh toán">Đang xử lý</div>
                              <?php        
                                  }   
                              ?></strong>
                              </td>
                              
                              <td width="10">
                              <?php
                                  if($cate_check->Trangthaihd==1){
                              ?>
                                      <a class="btn btn-outline-info disabled" href="{{URL::to('/detail-hopdongkh/'.$cate_check->Mahopdong)}}"> Xem hợp đồng</a>
                                      <a class="btn btn-outline-success disabled" href="{{URL::to('/pay-tiencoc/'.$cate_check->Mahopdong)}}"> Thanh toán</a>
                                      <a class="btn btn-outline-danger" href="{{URL::to('/delete-category-khu')}}"> Hủy yêu cầu</a>
                              <?php
                                  }else if($cate_check->Trangthaihd==2){
                              ?>
                                      <a class="btn btn-outline-info" href="{{URL::to('/detail-hopdongkh/'.$cate_check->Mahopdong)}}"> Xem hợp đồng</a>
                                      <a class="btn btn-outline-success" href="{{URL::to('/pay-tiencoc/'.$cate_check->Mahopdong)}}"> Thanh toán</a>
                                      <a class="btn btn-outline-danger" href="{{URL::to('/delete-category-khu')}}"> Hủy yêu cầu</a>
                                      <?php
                                  }else if($cate_check->Trangthaihd==3){
                              ?>
                                      <a class="btn btn-outline-info" href="{{URL::to('/detail-hopdongkh/'.$cate_check->Mahopdong)}}"> Xem hợp đồng</a>
                                      <a class="btn btn-outline-success disabled" href="{{URL::to('/pay-tiencoc/'.$cate_check->Mahopdong)}}"> Thanh toán</a>
                                      <a class="btn btn-outline-danger disabled" href="{{URL::to('/delete-category-khu')}}"> Hủy yêu cầu</a>
                              <?php        
                                  }   
                              ?>
                                    
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <!--/ Bordered Table -->

                  <hr class="my-5" />
              </div>

              
@endsection