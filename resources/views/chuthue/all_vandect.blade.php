@extends('chutro_layout')
@section('chutro_content')

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Bordered Table -->
    <div class="card-body">
                    <!-- <a href="{{URL::to('/add-vandekh')}}" class="btn btn-outline-success">Tạo vấn đề - sự cố</a> -->
                    </div>
                    <div class="mb-3">
                                        @if ( Session::has('success') )
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                              <strong>{{ Session::get('success') }}</strong>
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                          @endif
                                        </div>
    <div class="card">
                    <h5 class="card-header">Danh sách Vấn đề - Sự cố</h5>
                    <div class="card-body">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <!-- <th>STT</th> -->
                              <th style="width:10px;">Mã sự cố</th>
                              <th style="width:20px;">Tên phòng</th>
                              <th>Tên sự cố</th>
                              <th>Mô tả</th>
                              <th style="width:20px;">Trạng thái</th>
                              <th>Hành động</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php 
                                $count = 1;
                              ?>
                           @foreach($all_vandect1 as $key => $tt_vd)
                            <tr>
                              <!-- <td> <?php 
                               echo $count;
                               $count++;
                              ?></td> -->
                              <td>
                                 <strong>{{ $tt_vd->Masuco }}</strong>
                              </td>
                              <td>
                                 <strong>{{ $tt_vd->Tenphong }}</strong>
                              </td>
                              <td>
                                 <strong>{{ $tt_vd->Tensuco }}</strong>
                              </td>
                              <td>
                              <strong>{{ $tt_vd->Motavd }}</strong>
                              </td>
                              <td>
                              
                                      <span class="badge bg-label-info me-1">Đang xử lý</span>
                              
                              </td>
                              
                              <td>
                              
                              <a onclick="return confirm('Vấn đề - sự cố sẽ hoàn thành, Bạn chắc chứ?')" href="{{URL::to('/complete-vandect/'.$tt_vd->Masuco)}}" role="button" class="btn btn-outline-success">Hoàn thành</a>
                                 
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
                  <div class="card">
                    <h5 class="card-header">Lịch sử Vấn đề - Sự cố</h5>
                    <div class="card-body">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <!-- <th>STT</th> -->
                              <th style="width:10px;">Mã sự cố</th>
                              <th style="width:20px;">Tên phòng</th>
                              <th>Tên sự cố</th>
                              <th>Mô tả</th>
                              <th style="width:20px;">Trạng thái</th>
                              <th>Hành động</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php 
                                $count = 1;
                              ?>
                           @foreach($all_vandect2 as $key => $tt_vd2)
                            <tr>
                              <td>
                                 <strong>{{ $tt_vd2->Masuco }}</strong>
                              </td>
                              <td>
                                 <strong>{{ $tt_vd2->Tenphong }}</strong>
                              </td>
                              <td>
                                 <strong>{{ $tt_vd2->Tensuco }}</strong>
                              </td>
                              <td>
                              <strong>{{ $tt_vd2->Motavd }}</strong>
                              </td>
                              <td>
                                   
                                      <span class="badge bg-label-success me-1">Đã hoàn thành</span>
                              
                              </td>
                              
                              <td>
                              
                              <a onclick="return confirm('Vấn đề - sự cố sẽ được xóa, Bạn chắc chứ?')" href="{{URL::to('/delete-vandect/'.$tt_vd2->Masuco)}}" role="button" class="btn btn-outline-danger">Xóa</a>
                               
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