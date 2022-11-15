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
                <div class="col-md-3"></div>
                
                <div class="col-md-6">
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
                            <h2>Bạn đang đăng nhập với tư cách khách hàng </h2> 
                            <form action="{{URL::to('/khachhang-quan-ly')}}" method="post">
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

                <div class="col-md-3"></div>

            </div>
        </div>
@endsection