@extends('khachhang_layout')
@section('khachhang_content')

<div class="container-xxl flex-grow-1 container-p-y">
<div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="table-data-phongtro.html">Danh sách Vấn đề - Sự cố</a></li>
            <li class="breadcrumb-item"><a href="form-add-phongtro.html">Tạo vấn đề sự cố</a></li>
          </ul>
        </div>
    <div class="row">
                <div class="col-12">
                  <div class="card">
                    <h4 class="card-header">Tạo vấn đề sự cố</h4>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <!-- Form controls -->
                                <div class="col-md-8">
                                <div class="card mb-4">
                                    <!-- <h5 class="card-header">Form Controls</h5> -->
                                    <div class="card-body">
                                    <form action="{{URL::to('/save-vande')}}" method="post" enctype="multipart/form-data">
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
                                        <label for="defaultFormControlInput" class="form-label">Tên vấn đề - sự cố</label>
                                        <input
                                        type="text"
                                        name="Tensuco"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="Nhập tên vấn đề - sự cố"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Mô tả</label>
                                        <input
                                        type="text"
                                        name="Motavd"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="Mô tả ngắn gọn"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        <!-- <div id="defaultFormControlHelp" class="form-text">
                                        We'll never share your details with anyone else.
                                        </div> -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="defaultSelect" class="form-label">Phòng</label>
                                            <select id="defaultSelect" class="form-select" name="Mahopdong">
                                            
                                            @foreach($cate_phong as $key => $cate)
                                            <option value="{{$cate->Mahopdong}}">{{$cate->Tenphong}}</option>
                                            @endforeach
                                            
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                          <label for="formFile" class="form-label">Ảnh chứng minh</label>
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
                                        <button name="add_khu" type="submit" class="btn btn-outline-success">Tạo</button>
                                        <a href="{{URL::to('/all-vandekh')}}" class="btn btn-outline-danger">Hủy</a>
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