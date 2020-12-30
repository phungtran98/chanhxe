@extends('admin.template.masters')
@section('title')
    | Quản lí khách hàng
@endsection
@section('breadcrumb')
    <li>
        <a href="#" class="active">Đăng ký xe</a>
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
    <h4  style="color: #075f5b;font-weight: bold;text-align: center;margin-top: -20px;">Danh sách xe của {{$cx->cx_tenchanhxe}} </h4>
    <div class="col-md-12">
        <button class="btn btn-success" id="Add_car" data-toggle="modal" data-target="#Modal_Add_cart"> Thêm xe</button>
        <div class="" style="float: right">
            <form action="{{ route('cx-tim-kiem-xe') }}" method="post" id="FindTaiXe">
                @csrf
                <input type="text" name="x_content" id="x_content" class="form-control" placeholder="Nhập từ khóa tìm kiếm...">
            </form>
        </div>
    </div>
    <div class="row"><?php $i=1?>
        <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered" >
                <thead>
                    <tr class="table_thead">    
                        <th>STT</th>
                        <th>Hình ảnh xe</th>
                        <th>Tài xế</th>
                        <th>Số điện thoại</th>
                        <th>Biển số</th>
                        <th>Mô tả</th>
                        <th>Thao tác</th>
                        
                    </tr>
                    @foreach ($xe as $xe)
                    
                        <tr class="table_thead1">
                            <td> {{ $i}} </td>
                            <td style="width:120px">
                                <?php $str = explode('|',$xe->x_hinhanhxe) ?>
                                @for ($i = 0; $i < count($str); $i++)
                                    <img class="" src="{{asset('upload/chanhxe/').'/'.$str[$i] }}" alt=""  style="width:100%; ">
                                @endfor
                            </td>
                            <td class="tr_css"> {{$xe->tx_hoten}} </td>
                            <td class="tr_css"> {{$xe->tx_sdt}}</td>
                            <td class="tr_css"> {{$xe->x_bienso}}</td>
                            <td> {{$xe->x_mota}}</td>
                            <td style="width:160px" class="tr_css"> 
                                <a title="" class="btn btn-warning update_car" data-toggle="modal" data-target="#Modal_Update_cart" data-xe="{{$xe->x_id}}">Cập nhật</a>
                                <a title="Xóa xe" class="btn btn-danger " href="{{ route('cx-xoa-xe', ['id'=>$xe->x_id]) }}"  onclick=" return Delete_car()">Xóa</a>
                            </td>
                        </tr>
                        <?php $i=$i+1?>
                    @endforeach
                </thead>
                <tbody>
                    
                </tbody>
                    
            </table>
        </div>









        
    </div>
</div>
{{-- Thêm xe --}}
<div class="modal fade " id="Modal_Add_cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Thêm Xe</h5>
            </div>
            <div class="modal-body" >
                <form action="{{ route('cx-them-xe') }}" method="post"  enctype="multipart/form-data">
                  @csrf
             <div class="row">
                 <div class="col-md-5" >
                    {{-- <div class="form-group">
                      <label for=""> <strong>Họ tên tài xế</strong>  <span class="star-red">*</span></label>
                      <input type="text"
                        class="form-control" name="x_tentaixe" id="" required >
                    </div> --}}
                    <div class="form-group">
                      <label for=""><strong>Họ tên tài xế</strong>  <span class="star-red">*</span></label>
                      <select class="form-control" name="tx_id"  id="">
                        <option disabled selected>---Chọn tài xế---</option>
                        @foreach ($taixeShare as $item)
                            <option value=" {{$item->tx_id}} "> {{$item->tx_hoten}} </option>
                        @endforeach
                       
                      </select>
                    </div>
                    {{-- <div class="form-group">
                      <label for=""> <strong>Ảnh đại diện tài xế</strong> <span class="star-red">*</span></label>
                      <input required type="file" class="form-control" name="x_hinhanhtaixe" required>
                    </div> --}}
                    {{-- <div class="form-group">
                      <label for=""> <strong>Số điện thoại</strong> <span class="star-red">*</span></label>
                      <input type="text"
                        class="form-control" name="x_sdttaixe" id="" required>
                    </div> --}}
                    <div class="form-group">
                      <label for=""> <strong>Biến số xe</strong> <span class="star-red" >*</span></label>
                      <input type="text"
                        class="form-control" name="x_bienso" id="" placeholder="65C-999.99" required>
                    </div>
                    <div class="form-group">
                      <label for=""><strong>Mô tả</strong> <span class="star-red">*</span></label>
                      <textarea class="form-control" name="x_mota" id="" rows="3" ></textarea>
                      <input type="hidden" name="cx_id" value=" {{auth::guard('chanhxe')->id()}} ">
                    </div>
                    <div class="form-group">
                      <label for=""><strong>Chọn hình ảnh xe</strong> <span class="star-red">*</span></label>
                      <input required type="file" class="form-control" name="images_car[]"  multiple >
                    </div>
                 </div>
                 <div class="col-md-7"  id="Add_bg">
                     <img src="{{asset('vendor/users/images/logo/bg3.png')}}" alt="">
                 </div>
             </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-success">Lưu</button>
            </div>
        </form>
      </div>
    </div>
</div>
{{-- Cập nhật xe --}}
<div class="modal fade " id="Modal_Update_cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin xe</h5>
            </div>
            <div class="modal-body" >
                <form action="{{ route('cx-cap-nhap-xe') }}" method="post"  enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-md-5" >
                    <div class="form-group">
                        <label for=""><strong>Họ tên tài xế</strong>  <span class="star-red">*</span></label>
                        <select class="form-control" name="tx_id"  id="ChonTenID">
                          @foreach ($taixeShare as $item)
                              <option value=" {{$item->tx_id}} "> {{$item->tx_hoten}} </option>
                          @endforeach
                         
                        </select>
                      </div>
                    <div class="form-group">
                    <label for=""> <strong>Biến số xe</strong> <span class="star-red" >*</span></label>
                    <input type="text"
                        class="form-control" name="x_bienso" id="x_bienso" >
                    </div>
                    <div class="form-group">
                    <label for=""><strong>Mô tả</strong> <span class="star-red">*</span></label>
                    <textarea class="form-control" name="x_mota" id="x_mota" rows="3" ></textarea>
                    <input type="hidden" name="cx_id" value=" {{auth::guard('chanhxe')->id()}} ">
                    </div>
                    <div class="form-group">
                    <label for=""><strong>Chọn hình ảnh xe</strong> <span class="star-red">*</span></label>
                    <input  type="file" class="form-control" name="images_car[]"  multiple >
                    <img src="" style="width: 44%;margin: 15px;" alt="" id="HinhXe">
                    <input  type="hidden" class="form-control" name="x_id" id="x_id_x"  >
                    </div>
                </div>
                <div class="col-md-7"  id="Add_bg">
                    <img src="{{asset('vendor/users/images/logo/bg3.png')}}" alt="">
                    <img src="{{asset('vendor/users/images/logo/bg3.png')}}" alt="">
                    {{-- <img src="{{asset('vendor/users/images/logo/bg3.png')}}" alt=""> --}}
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-warning">Cập nhật</button>
            </div>
        </form>
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
    function Delete_car(){
        if(confirm("Bạn có muốn xóa Xe này ? "))
            return true
        return false;
    }

    $(document).ready(function () {
        
        $('.update_car').click(function (e) { 
            e.preventDefault();
            var x_id = $(this).attr('data-xe');
            // alert(x_id);
            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                type: "post",
                url: " {{route('cx-ajax-xe')}} ",
                data: {x_id:x_id},
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $('#ChonTenID').append('<option value=" '+response.tx_id+ '" selected>'+response.tx_hoten+ '</option>');
                    $('#x_bienso').val(response.x_bienso);
                    $('#x_mota').val(response.x_mota);
                    $('#x_id_x').val(x_id);
                    $('#HinhXe').attr('src','http://localhost:8080/chanhxe/public/upload/chanhxe/taixe/'+response.x_hinhanhxe);
                }
            });
        });

    });
</script>
@endpush