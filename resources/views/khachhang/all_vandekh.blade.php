@extends('khachhang_layout')
@section('khachhang_content')

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Bordered Table -->
    <div class="card-body">
                    <a href="{{URL::to('/add-vandekh')}}" class="btn btn-outline-success">Tạo vấn đề - sự cố</a>
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
                             
                              <th>Mã sự cố</th>
                              <th>Tên phòng</th>
                              <th>Tên sự cố</th>
                              <th>Mô tả</th>
                              <th>Trạng thái</th>
                              <th>Hành động</th>
                            </tr>
                          </thead>
                          <tbody>
                              
                           @foreach($all_vandekh1 as $key => $tt_vd)
                            <tr>
                              
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
                              {{ $tt_vd->Motavd }}
                              </td>
                              <td>
                              
                                      <span class="badge bg-label-info me-1">Đang xử lý</span>
                              
                              </td>
                              
                              <td>
                              <a onclick="return confirm('Bạn có chắc muốn xóa không?')" class="btn btn-outline-danger" href="{{URL::to('/delete-vandekh/'.$tt_vd->Mavande)}}" role="button">Xóa</a>
                                    
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
                              
                              <th>Mã sự cố</th>
                              <th>Tên phòng</th>
                              <th>Tên sự cố</th>
                              <th>Mô tả</th>
                              <th>Trạng thái</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                              
                           @foreach($all_vandekh2 as $key => $tt_vd2)
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
                              {{ $tt_vd2->Motavd }}
                              </td>
                              <td>
                              
                                      <span class="badge bg-label-success me-1">Hoàn thành</span>
                              
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