@extends('chutro_layout')
@section('chutro_content')

<div class="container-xxl flex-grow-1 container-p-y">
<div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="table-data-phongtro.html">Danh sách phòng cho thuê</a></li>
            <li class="breadcrumb-item"><a href="form-add-phongtro.html">Thêm phòng cho thuê</a></li>
          </ul>
        </div>
    <div class="row">
                <div class="col-12">
                  <div class="card">
                    <h4 class="card-header">Thêm phòng cho thuê</h4>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <!-- Form controls -->
                                <div class="col-md-8">
                                <div class="card mb-4">
                                    <!-- <h5 class="card-header">Form Controls</h5> -->
                                    <div class="card-body">
                                    <form action="{{URL::to('/save-phongct')}}" method="post" enctype="multipart/form-data">
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
                                        <label for="defaultFormControlInput" class="form-label">Tiêu đề</label>
                                        <input
                                        type="text"
                                        name="Tieude"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="Nhập tiêu đề"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        
                                        </div>
                                        <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Tên phòng</label>
                                        <input
                                        type="text"
                                        name="Tenphong"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="Nhập tên phòng"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        
                                        </div>
                                        <div>
                                            <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                                            <textarea name="Mota" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <div class="form-password-toggle">
                                        <label for="defaultFormControlInput" class="form-label">Giá thuê</label>
                                        <div class="input-group">
                                        <input
                                        type="text"
                                        name="Gia"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="Nhập giá thuê phòng"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        <span class="input-group-text" id="basic-addon13">đ</span>
                                        </div>
                                        <div id="defaultFormControlHelp" class="form-text">
                                        Nhập đầy đủ số, ví dụ 1 triệu thì nhập là 1000000
                                        </div>
                                        </div>
                                        <div class="form-password-toggle">
                                        <label for="defaultFormControlInput" class="form-label">Diện tích</label>
                                        <div class="input-group">
                                        <input
                                        type="text"
                                        name="Dientich"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="Nhập diện tích"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        <span class="input-group-text" id="basic-addon13">m²</span>
                                        </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">Danh mục</label>
                                            <select name="Madanhmucp" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                            @foreach($cate_phong as $key => $cate)
                                            <option value="{{$cate->Madanhmuc}}">{{$cate->Tendanhmuc}}</option>
                                            @endforeach
                                            
                                            </select>
                                        </div>
                                        <div class="form-password-toggle">
                                        <label for="defaultFormControlInput" class="form-label">Giới hạn người</label>
                                        <div class="input-group">
                                        <input
                                        type="text"
                                        name="Gioihannguoi"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="Nhập giới hạn người"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        <span class="input-group-text" id="basic-addon13">người</span>
                                        </div>
                                        </div>
                                      
                                        <div class="mb-3">
                                          <label for="formFile" class="form-label">Ảnh đại diện</label>
                                          <input name="Anh" class="form-control" type="file" id="file-input"/>
                                          <div class="mb-3">
                                          </div>
                                          
                                        </div>
                                        
                                        <div class="mb-3">
                                        <?php
                                        $id = Session::get('Makhu');
                                        
                                        ?>
                                        <input type="hidden" name="Makhu" value="<?php echo $id; ?>" >
                                        </div>
                                        <!-- <div class="mb-3">
                                        <?php
                                        $idnn = Session::get('Manguoidung');
                                        
                                        ?>
                                        <input type="hidden" name="Manguoidung" value="<?php echo $idnn; ?>" >
                                        </div> -->
                                        <button name="add_category_phongct" type="submit" class="btn btn-outline-success">Thêm</button>
                                        <a href="{{URL::to('/all-phongct/'.$id)}}" class="btn btn-outline-danger">Hủy bỏ</a>
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