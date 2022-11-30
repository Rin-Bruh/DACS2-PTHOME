@extends('chutro_layout')
@section('chutro_content')

<div class="container-xxl flex-grow-1 container-p-y">
<div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="table-data-phongtro.html">Danh sách phòng cho thuê</a></li>
            <li class="breadcrumb-item"><a href="form-add-phongtro.html">Xác nhận thanh toán</a></li>
          </ul>
        </div>
    <div class="row">
                <div class="col-12">
                  <div class="card">
                    <h4 class="card-header">Xác nhận thanh toán tiền cọc</h4>
                    @foreach($xacnhanthanhtoan as $key => $xacnhan)
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="row">
                            <div class="col-md-4">
                            <div class="mb-4">
                            <div class="card-body">
                            <div class="mb-3">
                            </div>  
                            <div class="mb-3">
                                          <label for="formFile" class="form-label">Ảnh chứng minh</label>
                                          <img class="preview-img" id="img-preview" src="{{URL::to('public/uploads/thanhtoandatcoc/'.$xacnhan->Anhchungminh)}}" />
                            </div>
                            </div>
                            </div>
                            </div>
                            <!-- Form controls -->
                                <div class="col-md-8">
                                <div class="card mb-4">
                                    <!-- <h5 class="card-header">Form Controls</h5> -->
                                    <div class="card-body">
                                    <form action="{{URL::to('/save-xacnhan/'.$xacnhan->Mahopdong)}}" method="post" enctype="multipart/form-data">
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
                                        <label for="defaultFormControlInput" class="form-label">Thanh toán đặt cọc cho phòng</label>
                                        <input
                                        type="text"
                                        name="Tenphong"
                                        value="{{$xacnhan->Tenphong}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        <input type="hidden" name="Mahopdong" value="{{$xacnhan->Mahopdong}}">
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Mã phòng</label>
                                        <input
                                        type="text"
                                        name="Maphong"
                                        value="{{$xacnhan->Maphongthue}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Thuộc khu</label>
                                        <input
                                        type="text"
                                        name="Tenkhu"
                                        value="{{$xacnhan->Tenkhu}}"
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
                                        name="Diachi"
                                        value="{{$xacnhan->Diachi}}"
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
                                        value="{{number_format($xacnhan->Gia)}}"
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
                                        value="{{number_format($xacnhan->Giatri)}}"
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
                                        <label for="defaultFormControlInput" class="form-label">Thời gian trả</label>
                                        <div class="input-group">
                                        <input
                                        type="text"
                                        name="Hanthanhtoan"
                                        value="<?php $date = str_replace('/', '-', $xacnhan->Thoigiantra);
                                            echo date('d-m-Y H:i:s', strtotime($date)); ?>"
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
                                        ?>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Người gửi</label>
                                        <input
                                        type="text"
                                        name="Tennguoigui"
                                        value="{{$xacnhan->Hoten}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        <input type="hidden" value="{{$xacnhan->Nguoigui}}" name="Nguoigui">
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Người nhận</label>
                                        <input
                                        type="text"
                                        name="Tennguoinhan"
                                        value="{{$name_ng}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        <input type="hidden" value="{{$xacnhan->Nguoinhan}}" name="Nguoinhan">
                                        </div>
                                        
                                        <div class="mb-3">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">Khoản thanh toán</label>
                                            <select name="Maloaikhoan" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" disabled>
                                            
                                            <option value="1" <?php if($xacnhan->Makhoanthanhtoan==1) echo "selected=\"selected\"";  ?>>Khoản đặt trọ</option>

                                            <option value="2" <?php if($xacnhan->Makhoanthanhtoan==2) echo "selected=\"selected\"";  ?>>Khoản phí tiền trọ hằng tháng</option>

                                            <option value="3" <?php if($xacnhan->Makhoanthanhtoan==3) echo "selected=\"selected\"";  ?>>Khoản phí dich vụ</option>
                                            
                                            </select>
                                        </div>
                                        <div  class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                                            <textarea name="Mota" class="form-control" id="exampleFormControlTextarea1" rows="3" readonly>{{$xacnhan->Noidung}}</textarea>
                                        </div>
                                        
                                        
                                        <div class="mb-3">
                                          </div>
                                        <button type="submit" class="btn btn-outline-success">Xác nhận đã thanh toán</button>
                                        <a href="{{URL::to('/chutro-quan-ly')}}" class="btn btn-outline-danger">Hủy bỏ</a>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            
                            <div class="col-md-2">
                            </div>

                            
                        </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              </div>

              <style>
                .preview-img {max-width: 300px;margin: 0 1em 1em 0;padding: 0.5em;border-radius: 3px;}
                img {
                    height: 220%;
                    object-fit: cover;
                    /* margin-bottom: 100px; */
                }
              </style>
              <script>
                const input = document.getElementById('file-input');
                const image = document.getElementById('img-preview');

                input.addEventListener('change', (e) => {
                    if (e.target.files.length) {
                        const src = URL.createObjectURL(e.target.files[0]);
                        image.src = src;
                    }
                });
              </script>
@endsection