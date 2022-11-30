@extends('khachhang_layout')
@section('khachhang_content')

<div class="container-xxl flex-grow-1 container-p-y">
<div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="table-data-phongtro.html">Danh sách phòng cho thuê</a></li>
            <li class="breadcrumb-item"><a href="form-add-phongtro.html">Thanh toán</a></li>
          </ul>
        </div>
    <div class="row">
                <div class="col-12">
                  <div class="card">
                    <h4 class="card-header">Thanh toán tiền cọc</h4>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <!-- Form controls -->
                                <div class="col-md-8">
                                <div class="card mb-4">
                                    <!-- <h5 class="card-header">Form Controls</h5> -->
                                    <div class="card-body">
                                    <form action="{{URL::to('/save-thanhtoan')}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="mb-3">
                                        @if ( Session::has('success') )
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                              <strong>{{ Session::get('success') }}</strong>
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                          @endif
                                        </div>
                                        @foreach($show_pay as $key => $pay)
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Thanh toán đặt cọc cho phòng</label>
                                        <input
                                        type="text"
                                        name="Tenphong"
                                        value="{{$pay->Tenphong}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        <input type="hidden" name="Mahopdong" value="{{$pay->Mahopdong}}">
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Mã phòng</label>
                                        <input
                                        type="text"
                                        name="Maphong"
                                        value="{{$pay->Maphongthue}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        
                                        </div>
                                        
                                        <div class="form-password-toggle">
                                        <label for="defaultFormControlInput" class="form-label">Giá thuê</label>
                                        <div class="input-group">
                                        <input
                                        type="text"
                                        name="Giathue"
                                        value="{{$pay->Gia}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        <span class="input-group-text" id="basic-addon13">đ/tháng</span>
                                        </div>
                                        <div class="mb-3">
                                            </div>
                                        </div>
                                        <div class="form-password-toggle">
                                        <label for="defaultFormControlInput" class="form-label">Tiền đặt cọc</label>
                                        <div class="input-group">
                                        <input
                                        type="text"
                                        name="Giatri"
                                        value="{{$pay->Giacoc}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        <span class="input-group-text" id="basic-addon13">đ</span>
                                        </div>
                                        <div class="mb-3">
                                            </div>
                                        <div class="form-password-toggle">
                                        <label for="defaultFormControlInput" class="form-label">Hạn thanh toán</label>
                                        <div class="input-group">
                                        <span class="input-group-text" id="basic-addon13">Trước</span>
                                        <input
                                        type="text"
                                        name="Hanthanhtoan"
                                        value="<?php $date = str_replace('/', '-', $pay->Ngaybatdau);
                                            echo date('Y-m-d', strtotime($date)); ?>"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        
                                        </div>
                                        <div class="mb-3">
                                            </div>
                                        </div>
                                        <?php
                                        $name_ng = Session::get('Hoten');
                                        $id_ng = Session::get('Manguoidung');
                                        ?>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Người gửi</label>
                                        <input
                                        type="text"
                                        name="Tennguoigui"
                                        value="{{$name_ng}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        <input type="hidden" value="{{$pay->Manguoithue}}" name="Nguoigui">
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Người nhận</label>
                                        <input
                                        type="text"
                                        name="Tennguoinhan"
                                        value="{{$pay->Hoten}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        <input type="hidden" value="{{$pay->Manguoidung}}" name="Nguoinhan">
                                        </div>
                                        @endforeach
                                        <div class="mb-3">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">Khoản thanh toán</label>
                                            <select name="Maloaikhoan" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                            @foreach($cate_thanhtoan as $key => $cate_tt)
                                            <option value="{{$cate_tt->Maloaikhoan}}">{{$cate_tt->Tenloaikhoan}}</option>
                                            @endforeach
                                            
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                          <label for="formFile" class="form-label">Ảnh chứng minh</label>
                                          <input name="Anh" class="form-control" type="file" id="file-input"/>
                                          <div class="mb-3">
                                          </div>
                                          
                                        </div>
                                        
                                        <div  class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                                            <textarea name="Mota" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-outline-success">Thêm</button>
                                        <a href="{{URL::to('/all-checkout/'.$id_ng)}}" class="btn btn-outline-danger">Hủy bỏ</a>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            
                            <div class="col-md-2">
                            </div>

                            
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
@endsection