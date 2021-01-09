@extends('admin.template.masters')
@section('title')
    | Danh Sách Chành Xe
@endsection

@push('css')
<style>
    .table_thead{
        background: #075f5b;
        color: white;
    }
    
    tr.table_thead> th {
        text-align: center;
    }
    </style> 
@endpush
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <h4  style="color: #075f5b;font-weight: bold;font-size: 26px;text-align: center;margin-top: -16px;margin-bottom: 30px;">Danh sách các Chành Xe</h4>
    </div>
    <div class="col-md-12" >
       
        <div class="" style="float: right; margin:5px">
            <form action="{{ route('admin-ds-chanh-xe-search') }}" method="post" id="FindTaiXe">
                @csrf
                <input type="text" name="content" id="x_content" class="form-control" placeholder="Nhập từ khóa tìm kiếm...">
            </form>
        </div>
        @if ( Request::segment(2) == 'danh-sach-chanh-xe')
          
        <h5 style="color: #075f5b;font-weight: bold;font-size: 18px;">Hệ thống có <span> {{count($chanhxe)}} </span> Chành Xe</h5>
        @endif
        @if (Session::has('XacThuc'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('XacThuc') }}
        </div>
        @endif
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="table_thead"> 
                    <th>Thao tác</th>
                    <th>Trạng thái</th>  
                    <th>Tên Chành Xe</th>
                    <th>Tên Chủ Chành Xe</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Mã số thuế</th>
                </tr>
            </thead>
            <tbody> <?php $i=1?>
                  @foreach ($chanhxe as $item)
                      <tr>
                          <td>
                              <a href="{{ route('admin-ds-chanh-xe-ct', ['id'=>$item->cx_id]) }}" class="btn btn-danger">Xem chi tiết</a>
                        </td>
                            @if ($item->active ==1)
                            <td><span class="badge badge-success">Đã xác thực</span></td>
                            @else
                            <td><span class="badge badge-danger">Chưa xác thực</span></td>
                            @endif
                          
                          <td> <strong>{{$item->cx_tenchanhxe}} </strong> </td>
                          <td> <strong>{{$item->cx_hoten}}</strong>  </td>
                          <td> {{$item->cx_sdt}} </td>
                          <td> {{$item->cx_email}} </td>
                          @if ($item->cx_masothue==null)
                            <td><span class="badge badge-info">Chưa xác định</span></td>
                            @else
                               <td> {{$item->cx_masothue}} </td>
                          @endif
                         
                      </tr>
                  @endforeach
            </tbody>
                
        </table>
    </div>
    {{-- <div class="col-md-6">
       @if ( Request::segment(3) == 'tim-kiem-trang-thai')
           <p style="font-size: 23px;margin-top: 20px;font-weight: bold;color: red;font-style: italic;"> Tìm thấy  {{count($ctdvc)}}  kết quả</p>
       @endif
        @if ( Request::segment(3) == 'tim-kiem-noi-dung')
            <p style="font-size: 23px;margin-top: 20px;font-weight: bold;color: red;font-style: italic;"> Tìm thấy  {{count($ctdvc)}}  kết quả</p>
        @endif
    </div> --}}
</div>
@endsection
@push('script')

@endpush