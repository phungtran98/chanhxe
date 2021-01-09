@extends('admin.template.masters')
@section('title')
    | Quản lí khách hàng
@endsection
@section('breadcrumb')
    <li>
        <a href="#" class="active">Tài xế</a>
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
    <h4  style="color: #075f5b;font-weight: bold;text-align: center;margin-top: -20px;">Danh sách Tài Xế   </h4>
    <div class="col-md-12">
        <button class="btn btn-success" id="Add_car" data-toggle="modal" data-target="#Modal_Add_cart"> Thêm tài xế</button>
        <div class="" style="float: right">
            <form action="{{ route('cx-tim-kiem-tai-xe') }}" method="post" id="FindTaiXe">
                @csrf
                <input type="text" name="tx_content" id="tx_content" class="form-control" placeholder="Nhập từ khóa tìm kiếm...">
            </form>
        </div>
    </div>
    <div class="row"><?php $i=1?>
        <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered" >
                <thead>
                    <tr class="table_thead">    
                        <th>STT</th>
                        {{-- <th>Hình ảnh</th> --}}
                        <th>Họ tên</th>
                        {{-- <th>Bằng láy</th> --}}
                        <th>Số điện thoại</th>
                        <th>Số địa chỉ</th>
                        <th>Thao tác</th>
                    </tr>
                  
                </thead> <?php $i=1?>
                <tbody>
                    @foreach ($taixe as $item)
                        <tr>
                            <td> {{$i++}} </td>
                            {{-- <td > <img style="width:100px; height:auto" src="{{asset('upload/chanhxe/taixe/'.$item->tx_hinhanh)}}" alt=""> </td> --}}
                            <td> <strong>{{$item->tx_hoten}}</strong>  </td>
                            {{-- <td> <img style="width:100px; height:auto" src="{{asset('upload/chanhxe/taixe/'.$item->tx_vanbang)}}" alt=""> </td> --}}
                            <td> {{$item->tx_sdt}} </td>
                            <td> {{$item->tx_diachi}} </td>
                            <td style="width:200px"> 
                                <a href="#" class="btn btn-warning update_Taixe" data-toggle="modal" data-target="#Modal_Update_Carer"  data-tx_id="{{$item->tx_id}}">Xem chi tiết</a> 
                                <a onclick="return XoaTaiXe()" href="{{ route('cx-xoa-tai-xe', ['id'=>$item->tx_id]) }}" class="btn btn-danger">Xóa</a> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                    
            </table>
        </div> 
    </div>
</div>
{{-- Thêm tài xế --}}
<div class="modal fade " id="Modal_Add_cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Thêm Tài Xế</h5>
            </div>
            <div class="modal-body" >
                <form action="{{ route('cx-them-tai-xe') }}" method="post"  enctype="multipart/form-data">
                  @csrf
             <div class="row">
                 <div class="col-md-5" >
                    <div class="form-group">
                      <label for=""> <strong>Họ tên tài xế</strong>  <span class="star-red">*</span></label>
                      <input type="text"
                        class="form-control" name="tx_hoten" id="" required >
                    </div>
                    <div class="form-group">
                      <label for=""> <strong>Ảnh đại diện tài xế</strong> <span class="star-red">*</span></label>
                      <input required type="file" class="form-control" name="tx_hinhanh" required>
                    </div>
                    <div class="form-group">
                      <label for=""> <strong>Số điện thoại</strong> <span class="star-red">*</span></label>
                      <input type="text"
                        class="form-control" name="tx_sdt" id="" required>
                    </div>
                    <div class="form-group">
                      <label for=""> <strong>Địa chỉ</strong> <span class="star-red">*</span></label>
                      <input type="text"
                        class="form-control" name="tx_diachi" id="GetLocal" placeholder="Nhập địa chỉ..." >
                    </div>
                    <div class="form-group">
                      <label for=""><strong>Hình ảnh bằng láy</strong> <span class="star-red">*</span></label>
                      <input required type="file" class="form-control" name="tx_vanbang"   >
                    </div>
                 </div>
                 <div class="col-md-7"  id="Add_bg">
                    <img src="{{asset('vendor/users/images/logo/bg3.png')}}" alt="">
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
{{-- Cập nhật tài xế --}}
<div class="modal fade " id="Modal_Update_Carer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin tài xế</h5>
            </div>
            <div class="modal-body" >
                <form action="{{ route('cx-cap-nhap-tai-xe') }}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-5" >
                        <div class="form-group">
                          <label for=""> <strong>Họ tên tài xế</strong>  <span class="star-red">*</span></label>
                          <input type="text"
                            class="form-control" name="tx_hoten" id="tx_hoten" required >
                            <input type="hidden" name="tx_id" id="tx_id">
                        </div>
                        <div class="form-group">
                          <label for=""> <strong>Ảnh đại diện tài xế</strong> <span class="star-red">*</span></label>
                          <input  type="file" class="form-control" name="tx_hinhanh" >
                        </div>
                        <div class="form-group">
                          <label for=""> <strong>Số điện thoại</strong> <span class="star-red">*</span></label>
                          <input type="text"
                            class="form-control" name="tx_sdt" id="tx_sdt" required>
                        </div>
                        <div class="form-group">
                          <label for=""> <strong>Địa chỉ</strong> <span class="star-red">*</span></label>
                          <input type="text"
                            class="form-control" name="tx_diachi" id="tx_diachi"  required>
                        </div>
                        <div class="form-group">
                          <label for=""><strong>Hình ảnh bằng láy</strong> <span class="star-red">*</span></label>
                          <input  type="file" class="form-control" name="tx_vanbang"   >
                        </div>
                     </div>
                     <div class="col-md-7"  id="Add_bg">
                         <h5>Ảnh tài xế</h5>
                        <img style="width:150px;" src="" alt="" id="tx_hinhanh">
                        <h5>Ảnh bằng láy</h5>
                        <img style="width:150px;" src="" alt="" id="tx_vanbang">
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
    $('#tx_content').keypress(function (e) {
        if (e.which == 13) {
            $('form#FindTaiXe').submit();
        }
    });
    // Xóa xe
    function XoaTaiXe(){
        if(confirm("Bạn có muốn xóa Xe này ? "))
            return true
        return false;
    }

    $(document).ready(function () {
        
        $('.update_Taixe').click(function (e) { 
            e.preventDefault();
            var tx_id = $(this).attr('data-tx_id');
            // alert(x_id);
            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                type: "post",
                url: " {{route('cx-ajax-tai-xe')}} ",
                data: {tx_id:tx_id},
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $('#tx_hoten').val(response.tx_hoten);
                    $('#tx_sdt').val(response.tx_sdt);
                    $('#tx_hinhanh').attr('src','http://localhost:8080/chanhxe/public/upload/chanhxe/taixe/'+response.tx_hinhanh);
                    $('#tx_vanbang').attr('src','http://localhost:8080/chanhxe/public/upload/chanhxe/taixe/'+response.tx_vanbang);
                    $('#tx_diachi').val(response.tx_diachi);
                    $('#tx_id').val(tx_id);
                }
            });
        });

    });
</script>
@endpush