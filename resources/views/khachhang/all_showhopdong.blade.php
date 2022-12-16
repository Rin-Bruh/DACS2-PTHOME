@extends('khachhang_layout')
@section('khachhang_content')
<div class="container-xxl flex-grow-1 container-p-y">
<!-- Bootstrap Table with Header - Light -->
<div class="card">
                <h5 class="card-header">Danh sách hợp đồng</h5>
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
                    @foreach($ctthongbao4 as $key => $ct_tb4)
                      <tr>
                        <td><strong>{{ $ct_tb4->Mahopdong }}</strong></td>
                        <td>{{ $ct_tb4->Tenphong }}</td>
                        <td>
                        {{ $ct_tb4->Tenkhu }}
                        </td>
                        <td>
                        {{ $ct_tb4->Diachi }}
                        </td>
                        <td>
                        <a class="btn btn-outline-info" href="{{URL::to('/detail-hopdongkh/'.$ct_tb4->Mahopdong)}}" role="button">Xem lại hợp đồng</a>
                        
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
</div>

@endsection