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
        <h4  style="color: #075f5b;font-weight: bold;font-size: 26px;text-align: center;margin-top: -16px;margin-bottom: 30px;">Doanh thu của các Chành Xe</h4>
    </div>
    <div class="col-md-6">
        <form action="{{ route('admin-thong-ke-submit') }}" method="post" id="GetChanhXeSub">
            @csrf
            <div class="form-group">
              <select class="form-control" name="cx_id" id="GetChanhXe" style="width:60%;margin-top: 3px;">
                @foreach ($chanhxe as $item)
                    <option value="  {{$item->cx_id}} "> <strong>{{$item->cx_tenchanhxe}}</strong>  </option>
                @endforeach
              </select>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <div class="" style="float: right; margin:5px">
            <form action="" method="post" id="FindTaiXe">
                @csrf
                <input type="text" name="content" id="x_content" class="form-control" placeholder="Nhập từ khóa tìm kiếm...">
            </form>
        </div>
     
    </div>
    <div class="col-md-12" >
      
        
        @if (Session::has('XacThuc'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('XacThuc') }}
        </div>
        @endif
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="table_thead"> 
                    <th>Tên Chành Xe</th>
                    <th>Tên Chủ Chành Xe</th>
                    <th>Tổng danh thu (VNĐ)</th>
                </tr>
            </thead>
            <tbody> <?php $i=1?>
                
      
                    <tr>
                        <td style="text-align: center"> <strong>{{$chanhxe1->cx_tenchanhxe}}</strong>  </td>
                        <td style="text-align: center"> <strong>{{$chanhxe1->cx_hoten}} </strong> </td>
                        <td style="text-align: center;font-size: 17px;font-weight: 700;"> {{ number_format($tongDoanhThu) }} </td>
                    </tr> 
    
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
<script>
    $('#GetChanhXe').change(function (e) { 
        e.preventDefault();
        this.form.submit();
    });
</script>
@endpush