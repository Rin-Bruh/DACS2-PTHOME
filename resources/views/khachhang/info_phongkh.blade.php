@extends('khachhang_layout')
@section('khachhang_content')

<div class="container-xxl flex-grow-1 container-p-y">
<div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="table-data-phongtro.html">Danh sách phòng đang thuê</a></li>
            <li class="breadcrumb-item"><a href="form-add-phongtro.html">Thông tin phòng thuê</a></li>
          </ul>
        </div>
    <div class="row">
                <div class="col-12">
                  <div class="card">
                    <h4 class="card-header">Thông tin phòng thuê</h4>
                    @foreach($info_phongkh as $key => $edit_phong)
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <!-- Form controls -->
                                <div class="col-md-8">
                                <div class="card mb-4">
                                    <!-- <h5 class="card-header">Form Controls</h5> -->
                                    <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
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
                                        <label for="defaultFormControlInput" class="form-label">Tên phòng</label>
                                        <input
                                        type="text"
                                        name="Tenphong"
                                        value="{{$edit_phong->Tenphong}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="Nhập tên phòng"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        
                                        </div>
                                        <div class="form-password-toggle">
                                        <label for="defaultFormControlInput" class="form-label">Giá thuê</label>
                                        <div class="input-group">
                                        <input
                                        type="text"
                                        name="Gia"
                                        value="{{$edit_phong->Gia}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="Nhập giá thuê phòng"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        <span class="input-group-text" id="basic-addon13">đ</span>
                                        </div>
                                        </div>
                                        <div class="form-password-toggle">
                                        <label for="defaultFormControlInput" class="form-label">Diện tích</label>
                                        <div class="input-group">
                                        <input
                                        type="text"
                                        name="Dientich"
                                        value="{{$edit_phong->Dientich}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="Nhập diện tích"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        <span class="input-group-text" id="basic-addon13">m²</span>
                                        </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">Danh mục</label>
                                            <select name="Madanhmucp" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" disabled>
                                           
                                            <option value="DM47" <?php if($edit_phong->Madanhmuc=='DM47') echo "selected=\"selected\"";  ?>>Phòng trọ</option>
                                            <option value="DM53" <?php if($edit_phong->Madanhmuc=='DM53') echo "selected=\"selected\"";  ?>>Cho thuê căn hộ</option>
                                            <option value="DM90" <?php if($edit_phong->Madanhmuc=='DM90') echo "selected=\"selected\"";  ?>>Cho thuê mặt bằng</option>
                                            <option value="DM94" <?php if($edit_phong->Madanhmuc=='DM94') echo "selected=\"selected\"";  ?>>Cho thuê nguyên căn</option>
                                          
                                            
                                            </select>
                                        </div>
                                        <div class="form-password-toggle">
                                        <label for="defaultFormControlInput" class="form-label">Giới hạn người</label>
                                        <div class="input-group">
                                        <input
                                        type="text"
                                        name="Gioihannguoi"
                                        value="{{$edit_phong->Gioihannguoi}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="Nhập giới hạn người"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        <span class="input-group-text" id="basic-addon13">người</span>
                                        </div>
                                        </div>
                                      
                                        <div class="mb-3">
                                          <label for="formFile" class="form-label">Ảnh đại diện</label>
                                          
                                          <div class="mb-3">
                                          </div>
                                          <img class="preview-img" id="img-preview" src="{{URL::to('public/uploads/phongct/'.$edit_phong->Anh)}}" />
                                        </div>
                                        
                                        <a href="{{URL::to('/all-phongkh')}}" class="btn btn-outline-danger">Hủy bỏ</a>
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