@extends('welcome')
@section('content')
<div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Home New account / Sign in </h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->
  

        <!-- register-area -->
        <div class="register-area" style="background-color: rgb(249, 249, 249);">
            <div class="container">
                
                
                <div class="col-md-5">
                    <div class="box-for overflow">                         
                        <div class="col-md-12 col-xs-12 login-blocks">
                        <?php //Hiển thị thông báo lỗi?>
                            @if ( Session::has('error') )
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ Session::get('error') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                            @endif
                            <h2>Đăng nhập với tư cách khách thuê </h2> 
                            <form action="{{URL::to('/dangnhap-checkout')}}" method="post">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="khachhang_email" type="text" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Mật khẩu</label>
                                    <input name="khachhang_password" type="password" class="form-control" id="password">
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-default"> Đăng nhập</button>
                                </div>
                            </form>
                            
                            <br>
                            
                            
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-1">
                <button class="navbar-btn nav-button wow bounceInRight login">Hoặc</button>
                </div>
                <div class="col-md-6">
                    <div class="box-for overflow">
                        <div class="col-md-12 col-xs-12 register-blocks">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                            @endif
                            <h2>Đăng kí với tư cách khách thuê</h2> 
                            <form action="{{URL::to('/add-khachhang')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                    <label for="name">Email</label>
                                    <input value="{{old('Email')}}" name="khachhang_email" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="password">Nhập lại Password</label>
                                    <input name="password_confirmation" type="password" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{old('Hoten')}}" name="khachhang_name" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="email">SĐT</label>
                                    <input value="{{old('SDT')}}"name="khachhang_phone" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="email">Ngày sinh</label>
                                    <input value="{{old('Ngaysinh')}}"name="khachhang_birth" type="date" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="email">Giới tính</label>
                                    
                                    <select name="khachhang_gioitinh">
                                        <option value="0">Nam</option>
                                            <option value="1">Nữ</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-default">Đăng kí</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
@endsection