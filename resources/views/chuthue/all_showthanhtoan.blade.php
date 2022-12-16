@extends('chutro_layout')
@section('chutro_content')
<div class="container-xxl flex-grow-1 container-p-y">

              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">Danh sách đã trả khoản đặt cọc</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>Mã hợp đồng</th>
                        <th>Phòng thuê</th>
                        <th>Thuộc khu</th>
                        <th>Địa chỉ</th>
                        <th>Hành động</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($ctthanhtoan as $key => $ct_tt)
                      <tr>
                        <td><strong>{{ $ct_tt->Mahopdong }}</strong></td>
                        <td>{{ $ct_tt->Tenphong }}</td>
                        <td>
                        {{ $ct_tt->Tenkhu }}
                        </td>
                        <td>
                        {{ $ct_tt->Diachi }}
                        </td>
                        <td>
                        <a class="btn btn-outline-info" href="{{URL::to('/xacnhan-tt/'.$ct_tt->Mahopdong)}}" role="button">Chi tiết thanh toán</a>
                        
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>


              <hr class="my-5" />

              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">Danh sách khoản phí trọ hằng tháng</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>Mã hợp đồng</th>
                        <th>Phòng yêu cầu thuê</th>
                        <th>Ngày bắt đầu thuê</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    
                      <tr>
                        <td><strong></strong></td>
                        <td></td>
                        <td>
                        
                        </td>
                        <td>
                        
                          </td>
                        <td>
                        <a class="btn btn-outline-success" href="" role="button">Xem lại hợp đồng</a>
                        <a class="btn btn-outline-danger" href="" role="button"><i class="bx bx-trash me-1"></i> Xóa</a>
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <hr class="my-5" />

              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">Danh sách khoản phí dịch vụ</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>Mã hợp đồng</th>
                        <th>Phòng yêu cầu thuê</th>
                        <th>Ngày bắt đầu thuê</th>
                        <th style="text-align: center;">Trạng thái</th>
                        <th style="text-align: center;">Hành động</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    
                      <tr>
                        <td><strong></strong></td>
                        <td></td>
                        <td>
                        
                        </td>
                        <td>
                                      <span class="badge bg-label-info me-1" title="Vui lòng xác nhận thanh toán">Đang xử lý thanh toán</span>
                          </td>
                        <td>
                        <a class="btn btn-outline-info" href="" role="button">Xem lại hợp đồng</a>
                        <a class="btn btn-outline-success" href="" role="button"> Xác nhận thanh toán</a>
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
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
