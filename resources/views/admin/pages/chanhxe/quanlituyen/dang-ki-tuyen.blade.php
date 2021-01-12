@extends('admin.template.masters')
@section('title')
    | Quản lí tuyến
@endsection
@section('breadcrumb')
    <li>
        <a href="{{ route('cx-tuyen-xe') }}" class="active">Đăng ký tuyến</a>
    </li>
@endsection
@push('css')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<style>
    .add-form{
        margin: 10px 0;
        width: 100%;
    }
    input#start {
    width: 84%;
    }
   
    .btn-cx {
    background: #64cca6;
    border-color: #64cca6;
    margin: 18px 0;
    margin-top: -4px;
}
    .btn-cx:hover {
    background: #424f63;
    border-color:#64cca6; 
}
#Location-table tr > th {
    text-align: center;
    background: #64cca6;
    color: white;
}
textarea {
    resize: none;
    }
#left_tuyen > img {
    width: 100%;
    margin-left: -30px;
}
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                Đăng kí tuyến
                  <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <form action="{{ route('cx-tuyen-xe-submit') }}" method="POST">
                    @csrf
                    <div class="row">
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
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tuyến đi <span class="star-red">*</span></label>
                                        <select class="form-control selectpicker" name="tuyendi" id="TuyenDi" data-live-search="true">
                                            <option selected disabled >-- Tuyến đi --</option>
                                            @foreach ($tinh as $item)
                                                <option value=" {{$item->t_ten}} ">{{$item->t_ten}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tuyến đến <span class="star-red">*</span></label>
                                        <select class="form-control selectpicker" name="tuyenden" id="TuyenDen" data-live-search="true">
                                            <option selected disabled >-- Tuyến đến --</option>
                                            @foreach ($tinh as $item)
                                                <option value=" {{$item->t_ten}} ">{{$item->t_ten}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Chọn xe <span class="star-red">*</span></label>
                                        <select class="form-control selectpicker" name="banso" id="Xe" data-live-search="true">
                                            <option selected disabled >-- Bản số xe --</option>
                                            @foreach ($xe as $item)
                                                <option value=" {{$item->x_id}} ">{{$item->x_bienso}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="">Mô tả <span class="star-red">*</span></label>
                                      <textarea class="form-control" name="mota" id="editor" rows="6" resize></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-success btn-cx btn-block" type="submit">Thêm</button>
                                </div>
                                {{-- <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Vị trí kho</label>
                                        <input type="text"class="form-control" name="" id="start" placeholder="Nhập vào địa chỉ">
                                        <button class="btn btn-success" id="Add-address">Thêm</button>
                                        <input type="hidden"class="form-control" name="" id="Lat" >
                                        <input type="hidden"class="form-control" name="" id="Lng" >
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div id="left_tuyen">
                                <img src="{{asset('images/d.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered " id="Location-table">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Tuyến</th>
                                        <th>Biển Số Xe</th>
                                        <th>Thao tác</th>
                                    </tr>
                                    </thead>
                                    <?php  $i=1;?>
                                    <tbody id="Out_Location">
                                        @foreach ($data as $item)

                                            <tr>
                                                <td> {{$i++}} </td>
                                                <td> <a href="" title="Xem chi tiết"> </a>{{$item->t_tentuyen}} </td>
                                                <td style="text-align: center">   <a href="" title="Xem chi tiết" style="color: black">{{$item->x_bienso }}<i class="fa fa-truck" style="font-size:17px; color:#424f63 ; margin-left:10px"  ></i></a></td>
                                                <td style="width:190px"> 
                                                    <a href="{{ route('cx-chi-tiet-kho', ['id'=>$item->t_id]) }}" class="btn btn-warning">Đăng kí Kho</a>
                                                    <a href="{{ route('cx-tuyen-xoa', ['id'=>$item->t_id]) }}" class="btn btn-danger" onclick="return XoaTuyen()">Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>

@endsection
@push('script')
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    function XoaTuyen(){
        if(confirm('Bạn có muốn xóa Tuyến này ?')){
            return true;
        }
        else
        {
            return false;
        }
    }
    CKEDITOR.replace( 'editor' );

</script>
  

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(function () {
            $('select').selectpicker();
        });
    </script>
@endpush