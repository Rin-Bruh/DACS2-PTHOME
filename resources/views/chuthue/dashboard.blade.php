@extends('chutro_layout')
@section('chutro_content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">UI elements /</span> Accordion</h4>

    <!-- <div aria-live="polite" aria-atomic="true">

        <div class="toast-container top-0 end-0 p-3">

            @foreach($thongbao_info as $key => $info_tb)

            <div class="bs-toast toast bg-warning show" role="alert" aria-live="assertive" aria-atomic="true"
                data-bs-delay="1000">
                <div class="toast-header">
                    <i class="bx bx-bell me-2"></i>
                    <div class="me-auto fw-semibold">{{$info_tb->Tenloaithongbao}}</div>
                    <small>11 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">{{$info_tb->Noidung}}<div class="mt-2 pt-2 border-top">
                <button type="button" class="btn btn-primary btn-sm">Xem chi tiết</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="toast">Đóng</button>
                </div>
                </div>
            </div>

            @endforeach
        </div>
    </div> -->
    <div class="card">
        <div class="card-body">
            <!-- Enable Scrolling & Backdrop Offcanvas -->
            <div class="col-lg-4 col-md-6">
                <!-- <small class="text-light fw-semibold mb-3">Thông báo</small> -->
                
                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasBoth" aria-controls="offcanvasBoth">
                        Thông báo
                    </button>
                    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasBoth"
                        aria-labelledby="offcanvasBothLabel">
                        <div class="offcanvas-header">
                            <h5 id="offcanvasBothLabel" class="offcanvas-title">Thông báo</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body my-auto mx-0">
                            <div class="toast-container">
                                @foreach($thongbao_info as $key => $info_tb)
                                <div class="bs-toast toast fade bg-info show" role="alert" aria-live="assertive"
                                    aria-atomic="true">
                                    <div class="toast-header">
                                        <i class="bx bx-bell me-2"></i>
                                        <div class="me-auto fw-semibold">{{$info_tb->Tenloaithongbao}}</div>
                                        <small>11 mins ago</small>
                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="toast"
                                            aria-label="Close"></button> -->
                                    </div>
                                    <div class="toast-body">{{$info_tb->Noidung}}<div class="mt-2 pt-2 border-top">
                                    <button type="button" class="btn btn-primary btn-sm">Xem chi tiết</button>
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="toast">Đóng</button>
                                    </div>
                                </div>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
               
            </div>
</div>
    </div>
    <!-- Accordion -->
    <h5 class="mt-4">Accordion</h5>
    <div class="row">
        <div class="col-md mb-4 mb-md-0">
            <small class="text-light fw-semibold">Basic Accordion</small>
            <div class="accordion mt-3" id="accordionExample">
                <div class="card accordion-item active">
                    <h2 class="accordion-header" id="headingOne">
                        <button type="button" class="accordion-button" data-bs-toggle="collapse"
                            data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
                            Accordion Item 1
                        </button>
                    </h2>

                    <div id="accordionOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Lemon drops chocolate cake gummies carrot cake chupa chups muffin topping. Sesame snaps
                            icing
                            marzipan gummi bears macaroon dragée danish caramels powder. Bear claw dragée pastry topping
                            soufflé. Wafer gummi bears marshmallow pastry pie.
                        </div>
                    </div>
                </div>
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                            data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                            Accordion Item 2
                        </button>
                    </h2>
                    <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Dessert ice cream donut oat cake jelly-o pie sugar plum cheesecake. Bear claw dragée oat
                            cake
                            dragée ice cream halvah tootsie roll. Danish cake oat cake pie macaroon tart donut gummies.
                            Jelly beans candy canes carrot cake. Fruitcake chocolate chupa chups.
                        </div>
                    </div>
                </div>
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                            data-bs-target="#accordionThree" aria-expanded="false" aria-controls="accordionThree">
                            Accordion Item 3
                        </button>
                    </h2>
                    <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Oat cake toffee chocolate bar jujubes. Marshmallow brownie lemon drops cheesecake. Bonbon
                            gingerbread marshmallow sweet jelly beans muffin. Sweet roll bear claw candy canes oat cake
                            dragée caramels. Ice cream wafer danish cookie caramels muffin.
                        </div>
                    </div>
                </div>
                <!-- <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                          <i class="bx bx-bell me-2"></i>
                          <div class="me-auto fw-semibold">Bootstrap</div>
                          <small>11 mins ago</small>
                          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                          Fruitcake chocolate bar tootsie roll gummies gummies jelly beans cake.
                        </div>
                      </div> -->
            </div>

        </div>
        
    </div>
</div>
<!-- <style>
.toast-container {
position: fixed;
right: 20px;
top: 20px;
z-index: 1095;
}

.toast:not(.showing):not(.show) {
display: none !important;
}

</style> -->
@endsection
