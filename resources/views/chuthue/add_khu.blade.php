@extends('chutro_layout')
@section('chutro_content')

<div class="container-xxl flex-grow-1 container-p-y">
<div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="table-data-phongtro.html">Danh sách khu cho thuê</a></li>
            <li class="breadcrumb-item"><a href="form-add-phongtro.html">Thêm khu cho thuê</a></li>
          </ul>
        </div>
    <div class="row">
                <div class="col-12">
                  <div class="card">
                    <h4 class="card-header">Thêm khu cho thuê</h4>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <!-- Form controls -->
                                <div class="col-md-8">
                                <div class="card mb-4">
                                    <!-- <h5 class="card-header">Form Controls</h5> -->
                                    <div class="card-body">
                                    <form action="{{URL::to('/save-khu')}}" method="post" enctype="multipart/form-data">
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
                                        <label for="defaultFormControlInput" class="form-label">Tên khu</label>
                                        <input
                                        type="text"
                                        name="Tenkhu"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="Nhập tên khu"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Địa chỉ</label>
                                        <input
                                        type="text"
                                        name="Diachi"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="Nhập điạ chỉ"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        <!-- <div id="defaultFormControlHelp" class="form-text">
                                        We'll never share your details with anyone else.
                                        </div> -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="defaultSelect" class="form-label">Trạng thái</label>
                                            <select id="defaultSelect" class="form-select" name="Trangthai">
                                            
                                            <option value="0" >Đang hoạt động</option>
                                            
                                            <option value="1" >Tạm dừng hoạt động</option>
                                            <option value="2" >Ngưng hoạt động</option>
                                            
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="defaultSelect" class="form-label">Loại khu</label>
                                            <select id="defaultSelect" class="form-select" name="Maloaikhu">
                                            
                                            <option value="LKsv" >Khu sinh viên</option>
                                            
                                            <option value="LKcn" >Khu công nhân</option>
                                            <option value="LKvn" >Khu văn phòng</option>
                                            
                                            </select>
                                        </div>
                                        
                                        
                                        <div class="mb-3">
                                          <label for="formFile" class="form-label">Ảnh đại diện</label>
                                          <input name="Anh" class="form-control" accept="image/*" type="file" id="file-input" />
                                          <div class="mb-3">
                                          </div>
                                          
                                        </div>
                                        <div class="mb-3">
                                        <?php
                                        $id = Session::get('Manguoidung');
                                        // echo $id;
                                        ?>
                                        <input type="hidden" name="Manguoidung" value="<?php echo $id; ?>" >
                                        </div>
                                        <button name="add_khu" type="submit" class="btn btn-outline-success">Thêm</button>
                                        <a href="{{URL::to('/all-khu')}}" class="btn btn-outline-danger">Hủy bỏ</a>
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