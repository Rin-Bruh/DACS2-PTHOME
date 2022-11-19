@extends('admin_layout')
@section('admin_content')

<div class="container-xxl flex-grow-1 container-p-y">
<div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="table-data-phongtro.html">Liệt kê danh mục</a></li>
            <li class="breadcrumb-item"><a href="form-add-phongtro.html">Thêm danh mục</a></li>
          </ul>
        </div>
    <div class="row">
                <div class="col-12">
                  <div class="card">
                    <h4 class="card-header">Thêm danh mục</h4>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <!-- Form controls -->
                                <div class="col-md-8">
                                <div class="card mb-4">
                                    <!-- <h5 class="card-header">Form Controls</h5> -->
                                    <div class="card-body">
                                    <form action="{{URL::to('/save-category-danhmuc')}}" method="post">
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
                                        <label for="defaultFormControlInput" class="form-label">Tên danh mục</label>
                                        <input
                                        type="text"
                                        name="Tendanhmuc"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="Nhập tên danh mục"
                                        aria-describedby="defaultFormControlHelp"
                                        />
                                        <!-- <div id="defaultFormControlHelp" class="form-text">
                                        We'll never share your details with anyone else.
                                        </div> -->
                                        </div>                                       
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">Hiển thị</label>
                                            <select name="Trangthai" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                            <!-- <option selected>Open this select menu</option> -->
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiện</option>
                                            
                                            </select>
                                        </div>
                                        <button name="add_category_danhmuc" type="submit" class="btn btn-outline-success">Thêm</button>
                                        <a href="{{URL::to('/all-category-danhmuc')}}" class="btn btn-outline-danger">Hủy bỏ</a>
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