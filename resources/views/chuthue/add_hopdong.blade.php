@extends('chutro_layout')
@section('chutro_content')

<div class="container-xxl flex-grow-1 container-p-y">
<div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/chutro-quan-ly')}}">Danh sách khu cho thuê</a></li>
            <li class="breadcrumb-item"><a href="form-add-phongtro.html">Xác nhận cho thuê</a></li>
          </ul>
        </div>
        <div class="row">
                <div class="col-12">
                  <div class="card">
                    <h4 class="card-header">Thêm hợp đồng</h4>
                    @foreach($add_hopdong as $key => $edit_vl)
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <!-- Form controls -->
                                <div class="col-md-8">
                                <div class="card mb-4">
                                    <!-- <h5 class="card-header">Form Controls</h5> -->
                                    <div class="card-body">
                                    <form action="{{URL::to('/save-hopdong')}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="mb-3">
                                        @if ( Session::has('success') )
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                              <strong>{{ Session::get('success') }}</strong>
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                          @endif
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Mã hợp đồng</label>
                                        <input
                                        type="text"
                                        value="{{$edit_vl->Mahopdong}}"
                                        name="Mahopdong"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Đại diện bên cho thuê (Bên A)</label>
                                        <small class="text-light fw-semibold d-block">Họ và tên</small>
                                        <?php
                                        $name_chuthue = Session::get('Hoten');
                                        $sdt_chuthue = Session::get('SDT');
                                        $id_chuthue = Session::get('Manguoidung');
                                        ?>
                                        <input
                                        type="text"
                                        value="{{$name_chuthue}}"
                                        name="Hoten"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        </div>
                                        <input type="hidden" name="Machuthue" value="{{ $id_chuthue }}">
                                        <div class="mb-3">
                                        <small class="text-light fw-semibold d-block">Số điện thoại</small>
                                        <input
                                        type="text"
                                        value="{{$sdt_chuthue}}"
                                        name="SDT"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Đại diện bên thuê (Bên B)</label>
                                        <small class="text-light fw-semibold d-block">Họ và tên</small>
                                        <input
                                        type="text"
                                        value="{{$edit_vl->Hoten}}"
                                        name="Hoten"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        </div>
                                        <input type="hidden" name="Makhachthue" value="{{ $edit_vl->Manguoidung }}">
                                        <div class="mb-3">
                                        <small class="text-light fw-semibold d-block">Số điện thoại</small>
                                        <input
                                        type="text"
                                        value="{{$edit_vl->SDT}}"
                                        name="SDT"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        </div>
                                        <div class="mb-3">
                                        <small class="text-light fw-semibold d-block">CCCD</small>
                                        <input
                                        type="text"
                                        value="{{$edit_vl->CCCD}}"
                                        name="CCCD"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Phòng thuê</label>
                                        <input
                                        type="text"
                                        value="{{$edit_vl->Tenphong}}"
                                        name="Tenphong"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Mã phòng thuê</label>
                                        <input
                                        type="text"
                                        value="{{$edit_vl->Maphongthue}}"
                                        name="Maphongthue"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Địa chỉ</label>
                                        <input
                                        type="text"
                                        value="{{$edit_vl->Diachi}}"
                                        name="Diachi"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Giá  thuê</label>
                                        <input
                                        type="text"
                                        value="{{$edit_vl->Gia}}"
                                        name="Gia"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Tiền đặt cọc</label>
                                        <input
                                        type="text"
                                        name="Gia"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Ngày bắt đầu thuê</label>
                                        <input
                                        type="date"
                                        value="<?php $date = str_replace('/', '-', $edit_vl->Ngaybatdau);
                                            echo date('Y-m-d', strtotime($date)); ?>"
                                        name="Ngaybatdau"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Ngày hết hạn</label>
                                        <input
                                        type="date"
                                        value=""
                                        name="Ngayhethan"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        </div>
                                        
                                        <button name="update_chutro_info" type="submit" class="btn btn-outline-success">Thêm</button>
                                        <a href="{{URL::to('/chutro-quan-ly')}}" class="btn btn-outline-danger">Hủy</a>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            
                            <div class="col-md-2">
                            </div>

                            
                        </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              </div>

             
@endsection