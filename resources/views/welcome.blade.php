<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>GARO ESTATE | Home page</title>
        <meta name="description" content="GARO is a real-estate template">
        <meta name="author" content="Kimarotec">
        <meta name="keyword" content="html5, css, bootstrap, property, real-estate theme , bootstrap template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/normalize.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/fontello.css')}}">
        <link href="{{asset('public/frontend/assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/assets/fonts/icon-7-stroke/css/helper.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/assets/css/animate.css')}}" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/bootstrap-select.min.css')}}"> 
        <link rel="stylesheet" href="{{asset('public/frontend/bootstrap/css/bootstrap.css')}}">
        <!-- <link rel="stylesheet" href="{{('public/backend/assets/vendor/css/core.css')}}"> -->
        <!-- <link rel="stylesheet" href="{{('public/backend/assets/vendor/fonts/boxicons.css')}}"> -->
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/icheck.min_all.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/price-range.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/owl.carousel.css')}}">  
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/owl.theme.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/owl.transitions.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/style1.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/lightslider.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/w3s.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/responsive.css')}}">
    </head>
    <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Body content -->

        <!-- <div class="header-connect">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-8  col-xs-12">
                        <div class="header-half header-call">
                            <p>
                                <span><i class="pe-7s-call"></i> +1 234 567 7890</span>
                                <span><i class="pe-7s-mail"></i> your@company.com</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-12">
                        <div class="header-half header-social">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-vine"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>         -->
        <!--End top header -->

        <nav class="navbar navbar-default ">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="{{asset('public/frontend/assets/img/logo2.png')}}" alt=""></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                    <?php
                                        $khachhang_id = Session::get('Manguoidung'); 
                                        
                                        if($khachhang_id!=NULL){
                                            ?>  
                                         <a type="button" class="btn nav-button wow bounceInRight" aria-haspopup="true" aria-expanded="false" style="font-weight: bold" role="button" href="{{URL::to('/logoutkh')}}">
                                         Đăng xuất
                                        </a>  
                                        <?php
                                            }else{
                                        ?>
                                        <div class="btn-group">
                                        <button type="button" class="navbar-btn nav-button wow bounceInRight dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: bold">
                                        Đăng nhập <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{URL::to('/loginkh')}}">Khách hàng</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="{{URL::to('/loginct')}}">Chủ cho thuê</a></li>
                                        </ul>
                                        </div>
                                        
                                        <!-- Single button -->
                                        <div class="btn-group">
                                        <button type="button" class="navbar-btn nav-button wow bounceInRight dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: bold">
                                            Đăng kí <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{URL::to('/registerkh')}}">Khách hàng</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="{{URL::to('/registerct')}}">Chủ cho thuê</a></li>
                                           
                                        </ul>
                                        </div>
                                        
                                        <?php
                                            }
                                        ?>
                    </div>
                    <ul class="main-nav nav navbar-nav navbar-right">
                    <li class="wow fadeInDown" data-wow-delay="0.2s">
                            <a href="{{URL::to('/home')}}"   data-delay="200">Trang chủ</a>
                            
                        </li>

                        <li class="wow fadeInDown" data-wow-delay="0.2s"><a class="" href="{{URL::to('/properties')}}">Danh sách tin đăng</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.3s"><a class="" href="property.html">Property</a></li>
                        

                        <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="contact.html">Liên hệ</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->

        
            @yield('content')
        

        <!-- Footer area -->
        <div class="footer-area">

            <div class=" footer">
                <div class="container">
                    <div class="row">

                        <div class="col-md-4 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4>Về chúng tôi </h4>
                                <div class="footer-title-line"></div>

                                <!-- <img src="assets/img/footer-logo.png" alt="" class="wow pulse" data-wow-delay="1s"> -->
                                <p>PTHome tự hào có lượng dữ liệu bài đăng lớn nhất trong lĩnh vực cho thuê phòng trọ.</p>
                                <ul class="footer-adress">
                                    <li><i class="pe-7s-map-marker strong"> </i> 470 Đường Trần Đại Nghĩa, Khu đô thị, Ngũ Hành Sơn, Đà Nẵng</li>
                                    <li><i class="pe-7s-mail strong"> </i> quytt.21it@vku.udn.vn</li>
                                    <li><i class="pe-7s-call strong"> </i> (+84) 901 909 404</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4>Về PTHome </h4>
                                <div class="footer-title-line"></div>
                                <ul class="footer-menu">
                                    <li><a href="properties.html">Danh sách tin đăng</a>  </li> 
                                    <li><a href="#">Dịch vụ</a>  </li> 
                                    <li><a href="submit-property.html">Đăng tin </a></li> 
                                    <li><a href="contact.html">Liên hệ</a></li> 
                                    <li><a href="faq.html">fqa</a>  </li> 
                                     
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer news-letter">
                                <h4>Giữ liên lạc</h4>
                                <div class="footer-title-line"></div>
                                <p>Bạn muốn nhận thông báo về Email?</p>

                                <form>
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="E-mail ... ">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary subscribe" type="button"><i class="pe-7s-paper-plane pe-2x"></i></button>
                                        </span>
                                    </div>
                                    <!-- /input-group -->
                                </form> 

                                <div class="social pull-right"> 
                                    <ul>
                                        <li><a class="wow fadeInUp animated" href="https://twitter.com/kimarotec"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://www.facebook.com/kimarotec" data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://plus.google.com/kimarotec" data-wow-delay="0.3s"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://instagram.com/kimarotec" data-wow-delay="0.4s"><i class="fa fa-instagram"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://instagram.com/kimarotec" data-wow-delay="0.6s"><i class="fa fa-dribbble"></i></a></li>
                                    </ul> 
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer-copy text-center">
                <div class="container">
                    <div class="row">
                        <div class="pull-left">
                            <span> (C) <a href="http://www.KimaroTec.com">PTHome</a> , All rights reserved 2022  </span> 
                        </div> 
                        <div class="bottom-menu pull-right"> 
                            <ul> 
                                <li><a class="wow fadeInUp animated" href="{{URL::to('/home')}}" data-wow-delay="0.2s">Trang chủ</a></li>
                                <li><a class="wow fadeInUp animated" href="{{URL::to('/properties')}}" data-wow-delay="0.3s">Danh sách tin đăng</a></li>
                                <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.4s">Fqa</a></li>
                                <li><a class="wow fadeInUp animated" href="{{URL::to('/loginkh')}}" data-wow-delay="0.6s">Liên hệ</a></li>
                            </ul> 
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script src="{{asset('public/frontend/assets/js/modernizr-2.6.2.min.js')}}"></script>

        <script src="{{asset('public/frontend/assets/js/jquery-1.10.2.min.js')}}"></script> 
        <script src="{{asset('public/frontend/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/bootstrap-select.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/bootstrap-hover-dropdown.js')}}"></script>

        <script src="{{asset('public/frontend/assets/js/easypiechart.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/jquery.easypiechart.min.js')}}"></script>

        <script src="{{asset('public/frontend/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/wow.js')}}"></script>

        <script src="{{asset('public/frontend/assets/js/icheck.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/price-range.js')}}"></script>

        <script src="{{asset('public/frontend/assets/js/main.js')}}"></script>
        
        <script src="{{asset('public/frontend/assets/js/script2.js')}}"></script>
 
    </body>
</html>