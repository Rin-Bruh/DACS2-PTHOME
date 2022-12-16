@extends('welcome')
@section('content')
<div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title"></h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="properties-area recent-property" style="background-color: #FFF;">
            <div class="container">   
                <div class="row">
                    <div class="col-md-9 padding-top-40 properties-page">
                        <div class="section clear"> 
                            <div class="col-xs-10 page-subheader sorting pl0">
                                
                            </div>

                            <div class="col-xs-2 layout-switcher">
                                <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i>  </a>
                                <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>                          
                            </div><!--/ .layout-switcher-->
                        </div>

                        <div class="section clear"> 
                            <div id="list-type" class="proerty-th">
                                @foreach($all_phong as $key => $phong)
                                <div class="col-sm-6 col-md-4 p0">
                                    <div class="box-two proerty-item">
                                        <div class="item-thumb selectProduct"  data-title="{{($phong->Maphongthue)}}" data-id="{{($phong->Maphongthue)}}" data-size="{{($phong->Dientich).' '.'m²'}}" data-weight="Có" data-processor="{{($phong->Mota)}}" data-battery="{{ number_format($phong->Gia).' '.'đ'}}" data-address="Núi Thành,
                                        Hòa Cường Nam, Hải Châu, Đà Nẵng" data-danhgia="⭐⭐⭐⭐⭐">
                                            <a class="w3-btn-floating w3-light-grey addButtonCircular addToCompare">+</a>
                                            <a href="{{URL::to('/chi-tiet-phong-tro/'.$phong->Maphongthue)}}" ><img src="{{URL::to('/public/uploads/phongct/'.$phong->Anh)}}" class="imgFill productImg"></a>
                                        </div>

                                        <div class="item-entry overflow">
                                            <div class="selectProduct w3-padding" data-title="{{($phong->Maphongthue)}}" data-id="{{($phong->Maphongthue)}}" data-size="{{($phong->Dientich).' '.'m²'}}" data-weight="Có" data-processor="{{($phong->Mota)}}" data-battery="{{ number_format($phong->Gia).' '.'đ'}}" data-address="Núi Thành, Hòa Cường Nam, Hải Châu, Đà Nẵng" >
                                            <h5 style="text-transform: none; text-align: justify; display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;"><a href="{{URL::to('/chi-tiet-phong-tro/'.$phong->Maphongthue)}}"> {{($phong->Tieude)}} </a></h5>
                                            <div class="dot-hr"></div>
                                            <span class="pull-left"><b> Diện tích :</b>  {{($phong->Dientich).' '.'m²'}} </span>
                                            <span class="proerty-price pull-right"> {{ number_format($phong->Gia).' '.'đ'}}</span>
                                            <p style="display: none;">{{($phong->Mota)}}</p>
                                            </div>
                                        </div>
                                    </div>                               
                                </div>
                                @endforeach
                                </div>
                             <!--preview panel-->
                        <div class="w3-container  w3-center">
                            <div class="w3-row w3-card-4 w3-grey w3-round-large w3-border comparePanle w3-margin-top">
                                <div class="w3-row">
                                    <div div class="w3-col l9 m8 s6 w3-margin-top">
                                        <h4>Đã thêm để so sánh</h4>
                                    </div>
                                    <div class="w3-col l3 m4 s6 w3-margin-top">
                                 
                                        <button class="w3-btn w3-round-small w3-white w3-border notActive cmprBtn" disabled>So Sánh</button>
                                    </div>
                                </div>
                                <div class=" titleMargin w3-container comparePan">
                                </div>
                            </div>
                        </div>
                        <!--end of preview panel-->

                        <!-- comparision popup-->
                        <div id="id01" class="w3-animate-zoom w3-white w3-modal modPos">
                            <div class="w3-container">
                                <a onclick="document.getElementById('id01').style.display='none'" class="whiteFont w3-padding w3-closebtn closeBtn">×</a>
                            </div>
                            <div class="w3-row contentPop w3-margin-top">
                            </div>

                        </div>
                        <!--end of comparision popup-->

                        <!--  warning model  -->
                        <div id="WarningModal" class="w3-modal">
                            <div class="w3-modal-content warningModal">
                            <header class="w3-container w3-teal">
                            <h3><span>⚠ </span>Lỗi</h3>
                            </header>
                            <div class="w3-container" style="margin-top: 70px;">
                            <h4>Cho phép tối đa ba dịch vụ để so sánh</h4>
                            </div>
                            <footer class="w3-container w3-right-align">
                                <button id="warningModalClose" onclick="document.getElementById('id01').style.display='none'" class="w3-btn w3-hexagonBlue w3-margin-bottom  ">Ok</button>
                            </footer>
                            </div>
                        </div>
                        <!--  end of warning model  -->
                        </div>

                        <div class="section">
                            <div class="pull-right">
                                <div class="pagination">
                                    <ul>
                                        <li><a href="#">Prev</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> 


                    <div class="col-md-3 pl0 padding-top-40">
                        <div class="blog-asside-right pl0">
                            <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                                <div class="panel-heading">
                                    <h3 class="panel-title">Tìm kiếm</h3>
                                </div>
                                <div class="panel-body search-widget">
                                <form action="{{URL::to('/search')}}" class=" form-inline" method="post"> 
                                    {{csrf_field()}}
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="text" name="keywords_submit" class="form-control" placeholder="Từ khóa">
                                                </div>
                                            </div>
                                        </fieldset>


                                        <fieldset >
                                            <div class="row">
                                                <div class="col-xs-12">  
                                                    <input class="button btn largesearch-btn" value="Tìm kiếm"  name="search_items" type="submit">
                                                </div>  
                                            </div>
                                        </fieldset> 
                                </form> 
                                        
                                        
                                        <fieldset class="padding-5">
                                            <div class="row">
                                                @foreach($category as $key => $cate)
                                                <div class="col-xs-12"> 
                                                    <div class="checkbox"> 
                                                        <label><a href="{{URL::to('/danh-muc-phong-tro/'.$cate->Madanhmuc)}}">{{$cate->Tendanhmuc}}</a></label>
                                                    </div>
                                                </div>  
                                                @endforeach
                                            </div>
                                        </fieldset>
                                    
                                </div>
                            </div>

                            <!-- <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Mới nhất</h3>
                                </div>
                                <div class="panel-body recent-property-widget">
                                    <ul>
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
                                        <li>
                                            <div class="col-md-3 col-sm-3  col-xs-3 blg-thumb p0">
                                                <a href="single.html"><img src="assets/img/demo/small-property-1.jpg"></a>
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
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                                <a href="single.html"><img src="assets/img/demo/small-property-3.jpg"></a>
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

                                    </ul>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>           
            </div>
        </div>
       
        @endsection