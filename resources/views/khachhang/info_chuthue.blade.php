@extends('khachhang_layout')
@section('khachhang_content')

<div class="container-xxl flex-grow-1 container-p-y">
<div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="table-data-phongtro.html">Danh sách phòng đang thuê</a></li>
            <li class="breadcrumb-item"><a href="form-add-phongtro.html">Thông tin chủ thuê</a></li>
          </ul>
        </div>
    <div class="row">
                <div class="col-12">
                  <div class="card">
                    <h4 class="card-header">Thông tin chủ thuê</h4>
                    @foreach($info_chuthue as $key => $edit_chuthue)
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
                                        <label for="defaultFormControlInput" class="form-label">Tên chủ thuê</label>
                                        <input
                                        type="text"
                                        name="Tenphong"
                                        value="{{$edit_chuthue->Hoten}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="Nhập tên phòng"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        
                                        </div>
                                        <div class="form-password-toggle">
                                        <label for="defaultFormControlInput" class="form-label">SDT</label>
                                        <div class="input-group">
                                        <input
                                        type="text"
                                        name="Gia"
                                        value="{{$edit_chuthue->SDT}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="Nhập giá thuê phòng"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        
                                        </div>
                                        </div>
                                        <div class="form-password-toggle">
                                        <label for="defaultFormControlInput" class="form-label">Địa chỉ</label>
                                        <div class="input-group">
                                        <input
                                        type="text"
                                        name="Dientich"
                                        value="{{$edit_chuthue->Diachi}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="Nhập diện tích"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />

                                        </div>
                                        </div>
                                        
                                        <div class="form-password-toggle">
                                        <label for="defaultFormControlInput" class="form-label">Email</label>
                                        <div class="input-group">
                                        <input
                                        type="text"
                                        name="Gioihannguoi"
                                        value="{{$edit_chuthue->Email}}"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="Nhập giới hạn người"
                                        aria-describedby="defaultFormControlHelp"
                                        readonly
                                        />
                                        </div>
                                        </div>
                                      
                                        <div class="mb-3">
                                          </div>
                                        
                                        <a href="{{URL::to('/all-phongkh')}}" class="btn btn-outline-danger" style="float: right;">Hủy bỏ</a>
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