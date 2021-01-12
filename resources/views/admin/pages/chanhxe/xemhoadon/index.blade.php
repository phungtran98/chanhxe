@extends('admin.template.masters')
@section('title')
    | Quản lí khách hàng
@endsection
@section('breadcrumb')
    <li>
        <a href="#" class="active">Hóa đơn đã lập</a>
    </li>
@endsection
@push('css')
<style>
    .Action_submit a {
        margin: 0px 5px;
    }
    #Add_car{
        margin-left: -14px;
        margin-bottom: 7px;
    }
    /* #Add_bg{
        background: url(../vendor/users/images/logo/bg4.jpg);
        background-size: contain;
    } */
    .table_thead{
    background: #075f5b;
    color: white;
}

tr.table_thead> th {
    text-align: center;
}
tr.table_thead1 > td{
    font-size: 15px;;
}
.tr_css {
    /* padding-left: 20px !important; */
    font-weight: bold;
    line-height: 63px !important;
}
</style>  
@endpush
@section('content')
<div class="directory-info-row" style="margin-top: 0">
    <div class="col-md-12">
        @if (session('error'))
    <div class="alert alert-danger" role="alert">
            {{ session('error') }}
    </div>
@endif

@if (session('mss'))
    <div class="alert alert-success" role="alert">
        {{ session('mss') }}
    </div>
@endif
    </div>
    <h4  style="color: #075f5b;font-weight: bold;text-align: center;margin-top: -20px;">Danh sách hóa đơn đã in</h4>
    <div class="col-md-12">
        <div class="" style="float: right">
            <form action="{{ route('cx-tim-kiem-xe') }}" method="post" id="FindTaiXe">
                @csrf
                <input type="text" name="x_content" id="x_content" class="form-control" placeholder="Nhập từ khóa tìm kiếm...">
            </form>
        </div>
    </div>
    <div class="row"><?php $ii=1?>
        <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered" >
                <thead>
                    <tr class="table_thead">    
                        <th>STT</th>
                        <th>Tên hóa đơn</th>
                        <th>Thao tác</th>
                    </tr>
              
                </thead>
                <tbody> <?php $i=1?>
                    @foreach ($hoadon as $item)
                        <tr>
                            <td>  {{$i++}} </td>
                            <td style="text-align: center">  <strong>{{$item->xhd_ten}}</strong>  </td>
                            <td style="width:200px">
                                <a href=" {{asset('hoadon/pdf').'/'.$item->xhd_ten}} " target="_blank" class="btn btn-warning"> xem chi tiết</a>
                                <a onclick="return XoaHD()" href=" {{ route('cx-xem-hoa-don-xoa', ['id'=>$item->xhd_id]) }}"  class="btn btn-danger"> Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                    
            </table>
        </div>









        
    </div>
</div>


@endsection
@push('script')
<script>

      //Tìm kiếm
      $('#x_content').keypress(function (e) {
        if (e.which == 13) {
            $('form#FindTaiXe').submit();
        }
    });


    // Xóa xe
    function XoaHD(){
        if(confirm("Bạn có muốn xóa hóa đơn này ? "))
            return true
        return false;
    }


</script>
@endpush