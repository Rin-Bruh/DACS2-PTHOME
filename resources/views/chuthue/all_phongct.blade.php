@extends('chutro_layout')
@section('chutro_content')

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Bordered Table -->
  
        <h5 class="card-header">Danh sách phòng cho thuê</h5>
        <!-- <hr class="my-1" /> -->
        <div class="card-header">
        
            <a href="{{URL::to('/add-phongct')}}" class="btn btn-outline-success">Thêm phòng cho thuê</a>
           
        </div>
        
    <div class="row mb-5">
    @foreach($all_phongct as $key => $cate_phongct)
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                    <a href="{{URL::to('/edit-phongct/'.$cate_phongct->Maphongthue)}}">
                    <div class="card-body">
                      <h5 class="card-title">{{  $cate_phongct->Tieude }}</h5>
                      <h6 class="card-subtitle text-muted">{{  $cate_phongct->Tenphong }}</h6>
                      <img class="img-fluid d-flex mx-auto my-4" src="{{URL::to('public/uploads/phongct/'.$cate_phongct->Anh )}}" alt="Card image cap">
                      
                      <a class="btn btn-outline-danger" href="{{URL::to('/delete-phongct/'.$cate_phongct->Maphongthue)}}"><i class="bx bx-trash me-1"></i> Xóa</a>
                    </div>
                    </a>
                  </div>
                </div>
                @endforeach
              </div>

    <hr class="my-5" />
</div>

@endsection
