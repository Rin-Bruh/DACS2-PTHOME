@extends('detail')
@section('content')
<div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Chi tiết </h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->
@foreach($phongct_details as $key  => $value)
        <!-- property area -->
        <div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">   

                <div class="clearfix padding-top-40" >

                    <div class="col-md-8 single-property-content prp-style-1 ">
                        <div class="row">
                            <div class="light-slide-item">            
                                <div class="clearfix">
                                    <div class="favorite-and-print">
                                        <a class="add-to-fav" href="#login-modal" data-toggle="modal">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                        <a class="printer-icon " href="javascript:window.print()">
                                            <i class="fa fa-print"></i> 
                                        </a>
                                    </div> 

                                    <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                        <li data-thumb="{{URL::to('public/uploads/phongct/'.$value->Anh)}}"> 
                                            <img src="{{URL::to('public/uploads/phongct/'.$value->Anh)}}" />
                                        </li>
                                        <li data-thumb="{{URL::to('public/frontend/images/properties-img-0-2.jpg')}}"> 
                                            <img src="{{URL::to('public/frontend/images/properties-img-0-2.jpg')}}" />
                                        </li>
                                        <li data-thumb="{{URL::to('public/frontend/images/properties-img-0-5.jpg')}}"> 
                                            <img src="{{URL::to('public/frontend/images/properties-img-0-5.jpg')}}" />
                                        </li>
                                        <li data-thumb="{{URL::to('public/frontend/images/properties-img-1-1.jpg')}}"> 
                                            <img src="{{URL::to('public/frontend/images/properties-img-1-1.jpg')}}" />
                                        </li>                                         
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="single-property-wrapper">
                            <div class="single-property-header">                                          
                                <h1 class="property-title pull-left">{{$value->Tieude}}</h1>
                                <span class="property-price">{{ number_format($value->Gia).' '.'đ'}}</span>
                            </div>

                            <div class="property-meta entry-meta clearfix ">   

                                <div class="col-xs-5 col-sm-12 col-md-6">
                                    <div class="property-info-icon icon-tag col-sm-6">    
                                        <?php
                                        $khachhang_id = Session::get('Manguoidung'); 
                                        if($khachhang_id!=NULL){
                                            ?>  
                                        <a class="btn btn-primary wow bounceInRight login" role="button" data-wow-delay="0.45s"  href="{{URL::to('/checkout/'.$value->Maphongthue)}}">Đăng kí phòng</a>
                                        <?php
                                            }else{
                                        ?>
                                        <a class="btn btn-primary wow bounceInRight login" role="button" data-wow-delay="0.45s"  href="{{URL::to('/login-checkout/'.$value->Maphongthue)}}">Đăng kí phòng</a>   
                                        <?php
                                            }
                                        ?>
                                        
                                   
                                    </div>
                                    <div class="property-info-icon icon-tag col-sm-6">
                                    <form action="{{URL::to('save-cart')}}" method="POST">
                                            {{ csrf_field() }}
                                        <input type="hidden" name="phongid_hidden" value="{{$value->Maphongthue}}">
                                        <button type="submit" class="btn btn-primary wow bounceInRight login" data-wow-delay="0.45s">Yêu thích</button>
                                        </form>
                                    </div>      
                                </div>
                            </div>
                            <!-- .property-meta -->

                            <div class="section">
                                <h4 class="s-property-title">Mô tả</h4>
                                <div class="s-property-content">
                                    <p>{{$value->Mota}}</p>
                                </div>
                            </div>
                            <!-- End description area  -->

                            <div class="section additional-details">

                                <h4 class="s-property-title">Thông tin chi tiết</h4>

                                <ul class="additional-details-list clearfix">
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Mã phòng</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{$value->Maphongthue}}</span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Tên phòng</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{$value->Tenphong}}</span>
                                    </li>
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Diện tích</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{($value->Dientich).' '.'m²'}}</span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Giá thuê</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ number_format($value->Gia).' '.'đ'}}</span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Giới hạn người</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{($value->Gioihannguoi).' '.'người'}}</span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Danh mục</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{($value->Tendanhmuc)}}</span>
                                    </li> 

                                </ul>
                            </div>  
                            <!-- End additional-details area  -->

                            <!-- <div class="section property-features">      

                                <h4 class="s-property-title">Features</h4>                            
                                <ul>
                                    <li><a href="properties.html">Swimming Pool</a></li>   
                                    <li><a href="properties.html">3 Stories</a></li>
                                    <li><a href="properties.html">Central Cooling</a></li>
                                    <li><a href="properties.html">Jog Path 2</a></li>
                                    <li><a href="properties.html">2 Lawn</a></li>
                                    <li><a href="properties.html">Bike Path</a></li>
                                </ul>

                            </div>
                            

                            <div class="section property-video"> 
                                <h4 class="s-property-title">Property Video</h4> 
                                <div class="video-thumb">
                                    <a class="video-popup" href="yout" title="Virtual Tour">
                                        <img src="assets/img/property-video.jpg" class="img-responsive wp-post-image" alt="Exterior">            
                                    </a>
                                </div>
                            </div> -->
                            <!-- End video area  -->
                            <div class="similar-post-section padding-top-40">
                            <h4 class="s-property-title">Phòng thuê liên quan</h4>  
                            <div id="prop-smlr-slide_0"> 
                            
                                @foreach($relate as $key => $lienquan)
                                <div class="box-two proerty-item">
                                    <div class="item-thumb">
                                        <a href="{{URL::to('/chi-tiet-phong-tro/'.$lienquan->Maphongthue)}}" ><img src="{{URL::to('public/uploads/phongct/'.$lienquan->Anh)}}"></a>
                                    </div>
                                    <div class="item-entry overflow">
                                        <h5><a href="{{URL::to('/chi-tiet-phong-tro/'.$lienquan->Maphongthue)}}"> {{$lienquan->Tieude}} </a></h5>
                                        <div class="dot-hr"></div>
                                        <span class="pull-left"><b> Diện tích :</b> {{($lienquan->Dientich).' '.'m²'}} </span>
                                        <span class="proerty-price pull-right">{{ number_format($lienquan->Gia).' '.'đ'}}</span> 
                                    </div>
                                </div> 
                                @endforeach
                            </div>
                            </div>
                            
                        </div>
                    </div>

                    


                    <div class="col-md-4 p0">
                        <aside class="sidebar sidebar-property blog-asside-right">
                            <div class="dealer-widget">
                                <div class="dealer-content">
                                @foreach ($chutro_details as $key => $ttchutro)
                                    <div class="inner-wrapper">
                                    
                                        <div class="clear">
                                            <div class="col-xs-4 col-sm-4 dealer-face">
                                                <a href="#">
                                                    <img src="{{URL::to('public/uploads/chutro/'.$ttchutro->Anh)}}" class="img-circle">
                                                </a>
                                            </div>
                                            <div class="col-xs-8 col-sm-8 ">
                                                <h3 class="dealer-name">
                                                    <a href="">{{$ttchutro->Hoten}}</span>        
                                                </h3>
                                                <div class="dealer-social-media">
                                                    <a class="twitter" target="_blank" href="">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                    <a class="facebook" target="_blank" href="">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                    <a class="gplus" target="_blank" href="">
                                                        <i class="fa fa-google-plus"></i>
                                                    </a>
                                                    <a class="linkedin" target="_blank" href="">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a> 
                                                    <a class="instagram" target="_blank" href="">
                                                        <i class="fa fa-instagram"></i>
                                                    </a>       
                                                </div>

                                            </div>
                                        </div>
                                    
                                        <div class="clear">
                                            <ul class="dealer-contacts">                                       
                                                <li><i class="pe-7s-map-marker strong"> </i> </li>
                                                <li><i class="pe-7s-mail strong"> </i> {{$ttchutro->Email}}</li>
                                                <li><i class="pe-7s-call strong"> </i> {{$ttchutro->SDT}}</li>
                                            </ul>
                                            <!-- <p>Duis mollis  blandit tempus porttitor curabiturDuis mollis  blandit tempus porttitor curabitur , est non…</p> -->
                                        </div>
                                        
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="panel panel-default sidebar-menu similar-property-wdg wow fadeInRight animated">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Similar Properties</h3>
                                </div>
                                <div class="panel-body recent-property-widget">
                                        <!-- <ul>
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                                <a href="single.html"><img src="assets/img/demo/small-property-2.jpg"></a>
                                                <span class="property-seeker">
                                                    <b class="b-1">A</b>
                                                    <b class="b-2">S</b>
                                                </span>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                                <h6> <a href="single.html">Super nice villa </a></h6>
                                                <span class="property-price">3000000$</span>
                                            </div>
                                        </li>
                                        

                                    </ul> -->
                                </div>
                            </div>                          

                            <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                                <!-- <div class="panel-heading">
                                    <h3 class="panel-title">Ads her  </h3>
                                </div>
                                <div class="panel-body recent-property-widget">
                                    <img src="assets/img/ads.jpg">
                                </div> -->
                            </div>

                            <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                                <div class="panel-heading">
                                    <h3 class="panel-title">Smart search</h3>
                                </div>
                                <div class="panel-body search-widget">
                                    <form action="" class=" form-inline"> 
                                        <!-- <fieldset>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="text" class="form-control" placeholder="Key word">
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="row">
                                                <div class="col-xs-6">

                                                    <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select Your City">

                                                        <option>New york, CA</option>
                                                        <option>Paris</option>
                                                        <option>Casablanca</option>
                                                        <option>Tokyo</option>
                                                        <option>Marraekch</option>
                                                        <option>kyoto , shibua</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-6">

                                                    <select id="basic" class="selectpicker show-tick form-control">
                                                        <option> -Status- </option>
                                                        <option>Rent </option>
                                                        <option>Boy</option>
                                                        <option>used</option>  

                                                    </select>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label for="price-range">Price range ($):</label>
                                                    <input type="text" class="span2" value="" data-slider-min="0" 
                                                           data-slider-max="600" data-slider-step="5" 
                                                           data-slider-value="[0,450]" id="price-range" ><br />
                                                    <b class="pull-left color">2000$</b> 
                                                    <b class="pull-right color">100000$</b>                                                
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="property-geo">Property geo (m2) :</label>
                                                    <input type="text" class="span2" value="" data-slider-min="0" 
                                                           data-slider-max="600" data-slider-step="5" 
                                                           data-slider-value="[50,450]" id="property-geo" ><br />
                                                    <b class="pull-left color">40m</b> 
                                                    <b class="pull-right color">12000m</b>                                                
                                                </div>                                            
                                            </div>
                                        </fieldset>                                

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label for="price-range">Min baths :</label>
                                                    <input type="text" class="span2" value="" data-slider-min="0" 
                                                           data-slider-max="600" data-slider-step="5" 
                                                           data-slider-value="[250,450]" id="min-baths" ><br />
                                                    <b class="pull-left color">1</b> 
                                                    <b class="pull-right color">120</b>                                                
                                                </div>

                                                <div class="col-xs-6">
                                                    <label for="property-geo">Min bed :</label>
                                                    <input type="text" class="span2" value="" data-slider-min="0" 
                                                           data-slider-max="600" data-slider-step="5" 
                                                           data-slider-value="[250,450]" id="min-bed" ><br />
                                                    <b class="pull-left color">1</b> 
                                                    <b class="pull-right color">120</b>

                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox" checked> Fire Place</label>
                                                    </div> 
                                                </div>

                                                <div class="col-xs-6">
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox"> Dual Sinks</label>
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox" checked> Swimming Pool</label>
                                                    </div>
                                                </div>  
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox" checked> 2 Stories </label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label><input type="checkbox"> Laundry Room </label>
                                                    </div>
                                                </div>  
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox"> Emergency Exit</label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label>  <input type="checkbox" checked> Jog Path </label>
                                                    </div>
                                                </div>  
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label>  <input type="checkbox"> 26' Ceilings </label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-12"> 
                                                    <div class="checkbox">
                                                        <label>  <input type="checkbox"> Hurricane Shutters </label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset >
                                            <div class="row">
                                                <div class="col-xs-12">  
                                                    <input class="button btn largesearch-btn" value="Search" type="submit">
                                                </div>  
                                            </div>
                                        </fieldset>                                      -->
                                    </form>
                                </div>
                            </div>

                        </aside>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
        @endsection