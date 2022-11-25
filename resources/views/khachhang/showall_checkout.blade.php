@extends('khachhang_layout')
@section('khachhang_content')

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Bordered Table -->
    <div class="card">
                    <h5 class="card-header">Danh sách đăng kí</h5>
                    <!-- <hr class="my-1" /> -->
                    <!-- <div class="card-body">
                    <a href="{{URL::to('/add-category-khu')}}" class="btn btn-outline-success">Thêm khu cho thuê</a>
                    </div> -->
                    <!-- <div class="card-body">
                                        @if ( Session::has('success') )
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                              <strong>{{ Session::get('success') }}</strong>
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                          @endif
                      </div> -->
                    <div class="card-body">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>STT</th>
                              <th>Tiêu đề</th>
                              <th>Nội dung</th>
                              <th>Thời gian</th>
                              <th>Trạng thái</th>
                              <th>Loại thông báo</th>
                              <th>Tính năng</th>
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
                                 <strong>{{  $cate_check->Tieude }}</strong>
                              </td>
                              <td>
                                 <strong>{{  $cate_check->Noidung }}</strong>
                              </td>
                              <td>
                                 <strong><?php $date = str_replace('/', '-', $cate_check->Thoigian);
                                            echo date('Y-m-d H:i:s', strtotime($date)); ?></strong>
                              </td>
                              <td>
                                 <strong><?php
                                  if($cate_check->Trangthai==1){
                              ?>
                                      <div href="#" title="Đang yêu cầu">Đang yêu cầu</div>
                              <?php
                                  }else{
                              ?>
                                      <div href="#" title="Chấp nhận yêu cầu">Chấp nhận yêu cầu</div>
                              <?php        
                                  }   
                              ?></strong>
                              </td>
                              <td>
                                 <strong><?php
                                  if($cate_check->Loaithongbao==1){
                              ?>
                                      <div href="#">Thông báo thuê</div>
                              <?php
                                  }else{
                              ?>
                                      <div href="#">Thông báo trả tiền</div>
                              <?php        
                                  }   
                              ?></strong>
                              </td>
                              <td width="10">
                                    <a class="btn btn-outline-danger" href="{{URL::to('/delete-category-khu/'.$cate_check->Mathongbao)}}"><i class="bx bx-trash me-1"></i> Xóa</a>
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