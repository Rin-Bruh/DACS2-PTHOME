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
                            <h2>Bạn đang đăng kí với tư cách là chủ cho thuê</h2> 
                            <form action="{{URL::to('/save-category-chutro')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input value="{{old('chutro_email')}}" name="chutro_email" type="text" class="form-control"  >
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control"  >
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <div class="form-group">
                                    <label for="password">Nhập lại Password</label>
                                    <input name="password_confirmation" type="password" class="form-control"  >
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{old('chutro_name')}}" name="chutro_name" type="text" class="form-control"  >
                                </div>
                                <div class="form-group">
                                    <label for="phone">SĐT</label>
                                    <input value="{{old('chutro_phone')}}"name="chutro_phone" type="text" class="form-control"  >
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-default">Đăng kí</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-3"></div>

            </div>
        </div>
@endsection