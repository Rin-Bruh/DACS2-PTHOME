@extends('khachhang_layout')
@section('khachhang_content')

<div class="container-xxl flex-grow-1 container-p-y">
<div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="table-data-phongtro.html">Liệt kê danh mục</a></li>
            <li class="breadcrumb-item"><a href="form-add-phongtro.html">Thông tin người dùng</a></li>
          </ul>
        </div>
    <div class="row">
                <div class="col-12">
                  <div class="card">
                    <h4 class="card-header">Đăng kí phòng</h4>
                    @foreach($khachhang_info as $key => $edit_value)
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <!-- Form controls -->
                                <div class="col-md-8">
                                <div class="card mb-4">
                                    <!-- <h5 class="card-header">Form Controls</h5> -->
                                    <div class="card-body">
                                    <form action="{{URL::to('/add-checkout/'.$edit_value->Manguoidung)}}" method="post" enctype="multipart/form-data">
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
                                        <label for="defaultFormControlInput" class="form-label">Mã thành viên</label>
                                        <input
                                        type="text"
                                        value="{{$edit_value->Manguoidung}}"
                                        name="Manguoidung"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Tên người thuê</label>
                                        <input
                                        type="text"
                                        value="{{$edit_value->Hoten}}"
                                        name="Hoten"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Số điện thoại</label>
                                        <input
                                        type="text"
                                        value="{{$edit_value->SDT}}"
                                        name="SDT"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Email</label>
                                        <input
                                        type="text"
                                        value="{{$edit_value->Email}}"
                                        name="Email"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Tiêu đề</label>
                                        <input
                                        type="text"
                                        name="Tieude"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        value="Đặt phòng thuê"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        
                                        </div>
                                        <?php
                                        $idd = Session::get('Tenphong');
                                        ?>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Tên phòng</label>
                                        <input
                                        type="text"
                                        name="Tenphong"
                                        value="{{$idd}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"   
                                        readonly />
                                        
                                        </div>
                                        <?php
                                        $iddd = Session::get('Maphongthue');
                                        ?>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Mã phòng</label>
                                        <input
                                        type="text"
                                        name="Maphongthue"
                                        value="{{$iddd}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Ngày bắt đầu thuê</label>
                                        <input
                                        type="date"
                                        name="Ngaybatdau"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        </div>
                                        <div>
                                            <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                                            <textarea name="Noidung" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                          </div>
                                        <button name="add_checkout" type="submit" class="btn btn-outline-success">Đăng kí</button>
                                        <a href="{{URL::to('/all_checkout')}}" class="btn btn-outline-danger">Hủy bỏ</a>
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