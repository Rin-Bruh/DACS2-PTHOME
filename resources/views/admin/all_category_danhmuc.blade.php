@extends('admin_layout')
@section('admin_content')

    <div class="container-xxl flex-grow-1 container-p-y">
    <!-- Bordered Table -->
    <div class="card">
                    <h5 class="card-header">Danh sách danh mục</h5>
                    <div class="card-body">
                                        @if ( Session::has('success') )
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                              <strong>{{ Session::get('success') }}</strong>
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                          @endif
                      </div>
                    <div class="card-body">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>STT</th>
                              <th>Tên danh mục</th>
                              <th>Trạng thái</th>
                              <th>Tính năng</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $count = 1;
                            ?>
                            @foreach($all_category_danhmuc as $key => $cate_pro)
                            <tr>
                              <td><?php echo $count; $count++; ?></td>
                              <td>
                                 <strong>{{  $cate_pro->Tendanhmuc }}</strong>
                              </td>
                              
                              <td><?php
                                  if($cate_pro->Trangthai==1){
                              ?>
                                      <a href="{{URL::to('/unactive-category-danhmuc/'.$cate_pro->Madanhmuc)}}" title="Hiện"><span class="fa-eye-styling fa fa-eye"></span></a>
                              <?php
                                  }else{
                              ?>
                                      <a href="{{URL::to('/active-category-danhmuc/'.$cate_pro->Madanhmuc)}}" title="Ẩn"><span class="fa-eye-styling fa fa-eye-slash"></span></a>
                              <?php        
                                  }   
                              ?></td>
                              <td>
                                <div class="dropdown">
                                  <button
                                    type="button"
                                    class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown"
                                  >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{URL::to('/edit-category-danhmuc/'.$cate_pro->Madanhmuc)}}"
                                      ><i class="bx bx-edit-alt me-1"></i> Sửa</a
                                    >
                                    <a class="dropdown-item" href="{{URL::to('/delete-category-danhmuc/'.$cate_pro->Madanhmuc)}}"
                                      ><i class="bx bx-trash me-1"></i> Xóa</a
                                    >
                                  </div>
                                </div>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <!--/ Bordered Table -->

                  <hr class="my-5" />
              </div>

@endsection