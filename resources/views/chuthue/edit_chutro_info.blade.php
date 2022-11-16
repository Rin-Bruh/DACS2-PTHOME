@extends('chutro_layout')
@section('chutro_content')

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
                    <h4 class="card-header">Thông tin người dùng</h4>
                    @foreach($edit_chutro_info as $key => $edit_value)
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <!-- Form controls -->
                                <div class="col-md-8">
                                <div class="card mb-4">
                                    <!-- <h5 class="card-header">Form Controls</h5> -->
                                    <div class="card-body">
                                    <form action="{{URL::to('/update-chutro-info/'.$edit_value->Manguoidung)}}" method="post" enctype="multipart/form-data">
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
                                        <label for="defaultFormControlInput" class="form-label">Tên hiển thị</label>
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
                                        <label for="defaultFormControlInput" class="form-label">Ngày sinh</label>
                                        <input
                                        type="date"
                                        value="<?php $date = str_replace('/', '-', $edit_value->Ngaysinh);
                                            echo date('Y-m-d', strtotime($date)); ?>"
                                        name="Ngaysinh"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">CCCD</label>
                                        <input
                                        type="text"
                                        value="{{$edit_value->CCCD}}"
                                        name="CCCD"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        </div>
                                        <div class="mb-3">
                                            <label for="defaultSelect" class="form-label">Giới tính</label>
                                            <select id="defaultSelect" class="form-select" name="Gioitinh">
                                            
                                            <option value="0" <?php if($edit_value->Gioitinh==0) echo "selected=\"selected\"";  ?>>Nam</option>
                                            
                                            <option value="1" <?php if($edit_value->Gioitinh==1) echo "selected=\"selected\"";  ?>>Nữ</option>
                                            
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                          <label for="formFile" class="form-label">Ảnh đại diện</label>
                                          <input name="Anh" class="form-control" accept="image/*" type="file" id="file-input"/>
                                          <div class="mb-3">
                                          </div>
                                          <img class="preview-img" id="img-preview" src="{{URL::to('public/uploads/chutro/'.$edit_value->Anh)}}" />
                                        </div>
                                        <button name="update_chutro_info" type="submit" class="btn btn-outline-success">Cập nhật</button>
                                        <a href="{{URL::to('/chutro_layout')}}" class="btn btn-outline-danger">Hủy bỏ</a>
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

              <style>
                .preview-img {max-width: 150px;margin: 0 1em 1em 0;padding: 0.5em;border: 1px solid #ccc; border-radius: 3px;}
                img {
                    width: 100%;
                    object-fit: cover;
                    margin-bottom: 20px;
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