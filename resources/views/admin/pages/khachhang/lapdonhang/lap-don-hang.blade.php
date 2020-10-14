@extends('admin.template.masters')
@section('title')
    | Lập Hóa Đơn
@endsection
@section('breadcrumb')
    <li>
        <a href="#" class="active">Tạo đơn hàng</a>
    </li>
@endsection
@push('css')
    <style>
        .star-red{
            color:red;
        }
        .user-oder{
            
        }
        input#KG {
            text-align: center;
            font-size: 16px;
            font-weight: 700;
        }
    </style>
@endpush
@section('content')
<form method="get" action="">
    <div class="row">
        <div class="col-md-6">
            {{-- Thông tin người gửi --}}
            <div class="col-md-12">
                <div class="panel ">
                    <div class="panel-heading">
                        <div class="user-send">
                            <img src=" {{asset('images/u-send.png')}} " alt="">
                            <p class="float-right user-oder" style="display:inline-block">Người gửi:</p>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Họ tên người gửi <span class="star-red">*</span></label>
                                    <input type="text"
                                    class="form-control" name="kh_hoten" id=""  value=" {{$khachhang->kh_hoten}} ">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p>Địa điểm lấy hàng hóa <span class="star-red">*</span></p>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text"
                                    class="form-control" name="" id="getPlace"  placeholder="30/4, Xuân Khánh,..">
                                </div>
                            </div>   

                        </div>
                        {{-- Chọn chành xe --}}
                       <div class="form-group">
                         <label for="">Chọn Chành xe <span class="star-red">*</span></label>
                         <select class="form-control" name="" id="chanhXe">
                             <option value="">---Chành Xe---</option>
                            @foreach ($chanhxe as $item)
                                <option value=" {{$item->cx_id}} "> {{$item->cx_tenchanhxe}} </option>
                            @endforeach
                         </select>
                       </div>
                       {{-- Chọn tuyến --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label for="">Chọn tuyến <span class="star-red">*</span></label>
                                  <select class="form-control Tuyen" name="tuyen" id="Tuyen">
                                   
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Địa điểm lấy hàng hóa <span class="star-red">*</span></label>
                                    <input type="text"
                                    class="form-control" name="" id=""  placeholder="30/4, Xuân Khánh,..">
                                </div>
                            </div>                   
                        </div>
                    </div>
                </div>
            </div>
            {{-- Thông tin người nhận --}}
            <div class="col-md-12">
                <div class="panel ">
                    <div class="panel-heading">
                        <div class="user-send">
                            <img src=" {{asset('images/u-re.png')}} " alt="">
                            <p class="float-right user-oder" style="display:inline-block">Người nhận:</p>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="name">Họ tên <span class="star-red">*</span></label>
                            <input type="text"
                            class="form-control" name="" id="name"  placeholder="Nguyến văn A">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại <span class="star-red">*</span></label>
                            <input type="text"
                            class="form-control" name="phone" id="phone"  placeholder="0123456789">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">Tỉnh/Thành phố</label>
                                    <select class="form-control" name="city" id="Tinh" style="padding-left: 0px;padding-right: 0px;width: 150px;">
                                            <option value="null">Chọn Thành Phố</option>
                                        @foreach ($thanhPho as $item)
                                            <option value=" {{$item->t_id}} ">  {{$item->t_ten}} </option> 
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" style="margin-left: -10px">
                                    <label for="">Quận/Huyện</label>
                                    <select class="form-control quanHuyen" name="" id="quanHuyen"  disabled style="padding-left: 0px;padding-right: 0px;width: 154px;">
                                        <option value="" id="delQuanHuyen">Chọn Quận - Huyện</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" style="padding-left: 4px">
                                <div class="form-group">
                                    <label for="">Phường/Xã</label>
                                    <select class="form-control phuongXa" name="" id="phuongXa" disabled style="padding-left: 0px;padding-right: 0px;width: 154px;">
                                        <option value="" id="delPhuongXa">Chọn Phường - Xã</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Số nhà, tên đường,...</label>
                                    <input type="text"
                                    class="form-control" name="" id=""  placeholder="30/4, Xuân Khánh,..">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="my-textarea">Ghi chú</label>
                                    <textarea id="my-textarea" class="form-control" name="" rows="3" style="resize: none"></textarea>
                                </div>
                            </div>

                        </div>
                        
                    </div>
                </div>
            </div>
            {{-- ghi chú thêm --}}
           
        </div>
        <div class="col-md-6">
             {{-- Thông tin hang hóa --}}
             <div class="col-md-12">
                <div class="panel ">
                    <div class="panel-heading">
                        <div class="user-send">
                            <img src=" {{asset('images/p.png')}} " alt="">
                            <p class="float-right user-oder" style="display:inline-block">Thông tin hàng hóa</p>
                        </div>
                    </div>
                    <div class="panel-body">
                    <div class="form-group">
                        <label for="">Tên hàng hóa <span class="star-red">*</span> </label>
                        <input type="text"
                        class="form-control" name="" id=""  placeholder="Điện thoại di động...">
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng <span class="star-red">*</span> </label>
                        <input type="text"
                        class="form-control" name="" id=""  placeholder="0">
                    </div>
                    <div class="form-group">
                        <label for="">Giá trị của hàng hóa (VNĐ): </label>
                        <input type="text"
                        class="form-control" name="" id=""  placeholder="">
                    </div>
                    {{-- cách qui đổi --}}
                    <div class="row">
                        <div class="col-12 ">
                            <p class="" style="margin-left:15px">Kích thước</p>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text"
                                class="form-control" name="" id="Dai"  placeholder="Dài (cm)">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text"
                                class="form-control" name="" id="Rong"  placeholder="Rộng (cm)">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text"
                                class="form-control" name="" id="Cao"  placeholder="Cao (cm)">
                            </div>
                        </div>
                       
                        <div class="col-md-4">
                            <div class="form-group">
                               <label for="">Quy đổi (Kg)</label>
                                <input type="text"
                                class="form-control" name="" id="KG"  placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <p>Người trả cước</p>
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="ok" id="" value="checkedValue" checked>
                                    Người gửi
                                </label>&nbsp;
                                &nbsp;
                                &nbsp;
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="ok" id="" value="checkedValue" >
                                    Người nhận
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                           <div class="col-6">
                               <div class="btn btn-default">Làm lại</div>
                               <div class="btn btn-success">Lưu</div>
                           </div>
                        </div>
                    </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- <p id="demo"></p> --}}
    {{-- <div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title " style="text-align: center; font-size:18px;">Giợi ý Chành Xe gần bạn</h5>
        </div>
        <div class="modal-body">
            <div class="dir-info ShowChanhXe" >
                
            </div>
        </div>
        
      </div>
    </div>
  </div> --}}
@endsection
@push('script')
<script>
    // Lấy dữ liệu Tỉnh - Quận - Huyện 
    $('#Tinh').change(function (e) {
        e.preventDefault();
        var getID = $(this).children("option:selected").val();
        // console
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/chanhxe/public/quan/" + getID + "/quan-huyen",
            dataType: "json",
            success: function (response) {
                $('.value-qh').remove();
                $('.value-px').remove();
                // console.log(response);
                $('#quanHuyen').removeAttr("disabled");
                $('#delQuanHuyen').remove();
                if (reponse = []) {
                    $('.quanHuyen').append('<option class="value-qh" disabled>Không có dữ liệu</option>');
                }
                for (let i = 0; i < response.length; i++) {
                    // console.log(response[i].q_ten);
                    
                    $('.quanHuyen').append('<option class="value-qh" value="' + response[i].q_id + '" >' + response[i].q_ten + '</option>');
                    
                }
                $('#quanHuyen').change(function (e) {
                    // e.preventDefault();
                    var getIDQuanHuyen = $(this).children("option:selected").val();
                    console.log(getIDQuanHuyen);
                    $.ajax({
                        type: "GET",
                        url: "http://localhost:8080/chanhxe/public/phuong/" + getIDQuanHuyen + "/phuong-xa",
                        dataType: "json",
                        success: function (response) {
                            console.log(response);
                            $('.value-px').remove();
                            console.log(response);
                            $('#phuongXa').removeAttr("disabled");
                            $('#delPhuongXa').remove();
                            if (reponse = []) {
                                $('#phuongXa').append('<option class="value-px" disabled>Không có dữ liệu</option>');
                            }
                            for (let i = 0; i < response.length; i++) {
                                console.log(response[i].p_ten);
                                $('#phuongXa').append('<option class="value-px" value="' + response[i].p_id + '" >' + response[i].p_ten + '</option>');
                            }
                        }
                    });
                });
            }
        });
    });
    
    // Lấy Xe
    $('#chanhXe').change(function (e) { 
        e.preventDefault();
        var cx_id = $(this).children("option:selected").val();
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "http://localhost:8080/chanhxe/public/khach-hang/lap-don-hang/" + cx_id + "/tuyen",
            success: function (response) {
                // console.log(response);
                $('.value-qh').remove();
                $('.value-px').remove();
                if (reponse = []) {
                    $('.Tuyen').append('<option class="value-qh" disabled>Không có dữ liệu</option>');
                }
                for (let i = 0; i < response.length; i++) {
                    // console.log(response[i].t_tentuyen);
                    
                    $('.Tuyen').append('<option class="value-qh" value="' + response[i].t_id + '" >' + response[i].t_tentuyen + '</option>');
                    
                }
            }
        });
    });

    // Quy đổi Dài - Cao - Rộng
    $('#Cao').keyup(function (e) { 
        e.preventDefault();
        
        var dai = document.getElementById('Dai').value;
        var rong = document.getElementById('Rong').value;
        var cao = document.getElementById('Cao').value;

        var data={dai:dai,rong:rong,cao:cao};
        // console.log(data);
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: " {{ route('chuyen-doi-kich-thuoc') }} ",
            data:{dai:dai,rong:rong,cao:cao},
            dataType: "json",
            success: function (response) {
                console.log(response);
                $('#KG').val(response);
            }
        });

    });


    // Ggoogle map
    function initMap() {

        const autocomplete = new  google.maps.places.Autocomplete(document.getElementById('getPlace'));
        autocomplete.addListener('place_changed',function(){
        const place = autocomplete.getPlace();
        // map.setCenter(place.geometry.location);
        a=place.geometry.location;
        // map.fitBounds(place.geometry.viewport);
        // map.setZoom(16);
        // marker.setPosition(place.geometry.location);
        console.log(a);
       
        
      });
    }
    // var x = document.getElementById("demo");
    // if (navigator.geolocation) {
    // navigator.geolocation.getCurrentPosition(showPosition);
    // } else {
    // x.innerHTML = "Geolocation không được hỗ trợ bởi trình duyệt này.";
    // }

    // function showPosition(position) {
    // x.innerHTML = "Vĩ độ: " + position.coords.latitude +
    // "<br>Kinh độ: " + position.coords.longitude;
    // }


    // $('#ChanhXe').focus(function (e) { 
    //     e.preventDefault();
    //     // console.log('đã focus');
    //     $('.modal').modal('show');
    //     var idp= document.getElementById('Tinh').value;
    //     // console.log(idp);
    //     $.ajaxSetup({
    //     headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     $.ajax({
    //         type: "POST",
    //         url: " {{route('lay-chanh-xe')}}",
    //         data: {id:idp},
    //         dataType: "json",
    //         success: function (response) {
    //             console.log(response);
    //             $('.ShowChanhXe').append('');
    //             for(let i=0; i< response.length ; i++)
    //             {
    //                 console.log(response[i].cx_tenchanhxe);
    //                 $('.ShowChanhXe').append('<div class="row">  <div class="col-xs-9"><h5>'+ response[i].cx_tenchanhxe +'</h5><span><a href="#" class="small"> katy Perry</a></span></div>   <div class="col-xs-3"> <a class="dir-like" href="#"> <span class="small">434</span>   <i class="fa fa-heart"></i></a> </div>  </div>');  
                        
    //             }
    //         }
    //     });

    // });
</script>
@endpush