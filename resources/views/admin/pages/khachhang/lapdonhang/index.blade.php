@extends('admin.template.masters')
@section('title')
    | Lập Hóa Đơn
@endsection
@section('breadcrumb')
    <li>
        <a href="#" class="active">Thông tin chành xe</a>
    </li>
    <li>
        <a href="#" class="active">Tạo đơn hàng</a>
    </li>
@endsection
@push('css')

<style>
#regForm {
  /* background-color: #ffffff;
  margin: 100px auto; */
  /* padding: 40px; */
  /* width: 70%;
  min-width: 300px; */
}
img.TuyChinhImg {
    width: 40%;
    margin: 10px; 
       float: right;
}
/* Style the input fields */
input {
  padding: 10px;
  width: 100%;

  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}
input#checkbox1,input#checkbox2 {
    margin-left: -29px;
    width: 94px;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}
.CheckValue:focus{
    border: 1px solid #466342 !important;
    box-shadow: none;
}
/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
.DontCheckGG{
    border: 1px solid red !important;
}
.CheckGG{
    border: 1px solid green !important;
}
</style>
@endpush
@section('content')
<div class="row" id="regForm">
    <div class="col-md-12">
       <h3 style="/* float: left; *//* margin-left: 4px; */color: #075f5b;font-weight: bold;font-size: 20px;text-align: center;margin-top: -10px;">{{$tuyen->cx_tenchanhxe}}<span > Tuyến </span>{{$tuyen->t_tentuyen}}</h3> 
    </div>
    <form method="post" action="{{ route('kh-ql-don-hang-luu') }}" enctype="multipart/form-data" id="Submit_HH">
        @csrf
        <div class="col-md-12 ">
          <div class="tab">
             {{-- Thông tin hang hóa --}}
             <div class="col-md-9" style="margin-left: 115px">
                <div class="panel ">
                    <div class="panel-heading">
                        <div class="user-send">
                            <img src=" {{asset('images/p.png')}} " alt="">
                            <p class="float-right user-oder" style="display:inline-block">Thông tin hàng hóa</p>
                        </div>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tên hàng hóa <span class="star-red">*</span> </label>
                                <input type="text"
                                class="form-control CheckValue" name="hh_ten" id=""  placeholder="Tên hàng hóa" required>
                            </div>
                            <div class="form-group">
                            <label for="">Hình ảnh hàng hóa ( Nếu có )</label>
                            <input type="file" class="form-control-file" name="hh_hinhanh[]" multiple id="files" >
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Giá trị của hàng hóa <span class="star-red">*</span></label>
                                        <input type="number"
                                        class="form-control  CheckValue" name="hh_giatri" id="Gia"  placeholder="" required>
                                        {{-- <p id="showPrice"></p> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">(VNĐ)</label>
                                        <p
                                        class="form-control" id="showPrice" disabled> </p>
                                     
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-6" id="result">
                           
                          </div>    
                      </div>
                    {{-- cách qui đổi --}}
                    <div class="row">
                       <div class="col-md-12">
                            <div class="row">
                                <div class="col-12 ">
                                    <p class="" style="margin-left:15px">Kích thước</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="number"
                                        class="form-control  CheckValue" name="Dai" id="Dai"  placeholder="Dài (cm)">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="number"
                                        class="form-control  CheckValue" name="Rong" id="Rong"  placeholder="Rộng (cm)">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="number"
                                        class="form-control  CheckValue" name="Cao" id="Cao"  placeholder="Cao (cm)">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    {{-- <label for="">Quy đổi (Kg)</label> --}}
                                        <input type="number"
                                        class="form-control" name="hh_khoiluong" id="KG" disabled  placeholder="Quy đổi (KG)" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Số lượng <span class="star-red">*</span> </label>
                                        <input type="number"
                                        class="form-control  CheckValue"  name="hh_soluong" id=""  placeholder="0">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tổng khối lượng (KG)<span class="star-red">*</span></label>
                                        <input type="number" step="0.1"
                                        class="form-control  CheckValue" min="0" name="hh_khoiluong" id="TongKL"   placeholder="" >
                                       
                                    </div>
                                </div>
                            </div>
                       </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Số tiền thu hộ<span class="star-red">*</span></label>
                                <input type="text"
                                class="form-control" name="hh_tienthuho" style="width:60%" id="ThuHo" max="10000000000" value="0" placeholder="Nhập số tiền thu hộ"    >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">(VNĐ)</label>
                                <p
                                class="form-control" id="showPrice1" style="width:60%; magrin-left:-160px"  disabled ></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ghi chú <span class="star-red">*</span></label>
                        <textarea class="form-control" name="hh_ghichu" id="" rows="3"></textarea>
                    </div>
                    
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-9" style="margin-left: 115px; position:relative">
                <div class="tab">
                     {{-- Thông tin người nhận --}}
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
                                class="form-control" name="kh_nhan_ten" id="name" style="width:55%"  placeholder="Nguyến văn A">
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại <span class="star-red">*</span></label>
                                <input type="text"
                                class="form-control" style="width:55%" name="kh_nhan_sdt" id="phone"  placeholder="0123456789">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Địa chỉ <span class="star-red">*</span></label>
                                        <input type="text"
                                        class="form-control" style="width:55%" name="kh_nhan_diachi" id="getPlace"  placeholder="30/4, Xuân Khánh,..">
                                        <input type="hidden" name="kh_nhan_km" id="kh_nhan_km" >
                                        <input type="hidden" name="kh_nhan_tgchay" id="kh_nhan_tgchay" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Tổng cước dự kiến</label>
                                        <p
                                        class="form-control" id="TongCuoc" style="width:55%"  disabled></p>
                                       
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Tổng khoảng cách</label>
                                        <p
                                        class="form-control" id="TongKC" style="width:55%"  disabled></p>
                                       
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="my-textarea">Ghi chú</label>
                                        <textarea id="my-textarea" class="form-control" style="width:55%" name="kh_nhan_ghichu" rows="4" style="resize: none"></textarea>
                                    </div>
                                </div>
        
                            </div>
                            
                        </div>
                        <img src=" {{asset('upload/khachhang/hh.png')}} " alt="" style="width: 37%;position: absolute;top: 122px;right: 40px;">
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-9" style="margin-left: 115px">
                <div class="tab">
                    {{-- Thông tin người gửi --}}
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
                                        class="form-control" name="kh_hoten" id=""  style="width:60%"  value=" {{$khachhang->kh_hoten}} " disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Tuyến xe <span class="star-red">*</span></label>
                                        <input type="text"
                                        class="form-control" name=""  style="width:60%" value=" {{$tuyen->t_tentuyen}} " disabled>
                                        <input type="hidden"
                                        class="form-control" name="t_id"   id="t_id"  value=" {{$tuyen->t_id}} ">
                                        <input type="hidden"
                                        class="form-control" name="cx_id"   id="t_id"  value=" {{$tuyen->cx_id}} ">
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Hình thức gửi  <span class="star-red">*</span></label>
                                    </div>                              
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="Send_Method" id="checkbox2" value="2" checked>
                                            Gửi hàng tại kho hàng
                                        </label>         
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="Send_Method" id="checkbox1" value="1"  > <span>Địa chỉ cụ thể cho chành xe lấy hàng</span> 
                                      </label>
                                    </div> 
                                        <input type="text" class="form-control Address_items" name="method_value" id="autoUpdate1"   placeholder="Nhập địa điểm nơi cần lấy hàng....">
                                        
                                        <div class="Address_items" name="Send_Method" id="autoUpdate2"  style="border: 1px solid #ccc;padding: 10px;word-spacing: initial; ">{!!$tuyen->t_mota!!} </div>
                                </div>                                
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
           <div style="overflow:auto;">
                <div style="float:right;margin-right: 168px;">
                    <button type="button" class="btn btn-default" id="prevBtn" onclick="nextPrev(-1)">Trở về</button>
                    <button type="button" id="nextBtn" class="btn btn-success" onclick="nextPrev(1)">Tiếp theo</button>
                </div>
            </div> 
        </div>
        
        
        <!-- Circles which indicates the steps of the form: -->
        <div class="col-md-12">
            <div style="">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
              </div>
         </div>
        
        
        </form>
</div>
@endsection
@push('script')
<script>
  
  $(document).ready(function(){
        $('#Gia').keyup(function(){
            var value=$(this).val();
            $('#showPrice').html(0);
            console.log(value);
            if(value!=0){

            value= parseFloat(value).toLocaleString('en-US');
            $('#showPrice').append('');
            $('#showPrice').html(value);
            } 
        });
        $('#ThuHo').keyup(function(){
            var value=$(this).val();
            $('#showPrice1').html(0);
            console.log(value);
            if(value!=0){

            value= parseFloat(value).toLocaleString('en-US');
            $('#showPrice1').html('');
            $('#showPrice1').html(value);
            } 
        });
    });
</script>


<script>
window.onload = function() {
  //Check File API support
  if (window.File && window.FileList && window.FileReader) {
    var filesInput = document.getElementById("files");
    filesInput.addEventListener("change", function(event) {
      var files = event.target.files; //FileList object
      var output = document.getElementById("result");
      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        //Only pics
        if (!file.type.match('image'))
          continue;
        var picReader = new FileReader();
        picReader.addEventListener("load", function(event) {
          var picFile = event.target;
          var div = document.createElement("div");
          div.innerHTML = "<div><img class='TuyChinhImg' src='" + picFile.result + "'" +
            "title='" + picFile.name + "'/></div> ";
          output.insertBefore(div, null);
        });
        //Read the image
        picReader.readAsDataURL(file);
      }
    });
  } else {
    console.log("Your browser does not support File API");
  }
}
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaaygZT7_LyyyK1fE9Wf9nsBHfJXgzXXY&libraries=places&callback=initMap"
    
    ></script>
<script>
 
   

    // Ggoogle map
    function initMap() {

        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer();

        //Khoang cach
        // const geocoder = new google.maps.Geocoder();
        const service = new google.maps.DistanceMatrixService();


        const autocomplete = new  google.maps.places.Autocomplete(document.getElementById('getPlace'));

        autocomplete.addListener('place_changed',function(){
        const add = document.getElementById('getPlace').value;
        place = autocomplete.getPlace();
        b=place;
        // map.setCenter(place.geometry.location);
        a=place.geometry.location;
        // map.fitBounds(place.geometry.viewport);
        // map.setZoom(16);
        // marker.setPosition(place.geometry.location);
        // console.log(a);
        getaddress(add)
        
      });
      var khoiluong=0;
     function getaddress(add)
     {
        var t_id =$('#t_id').val();
        console.log(t_id);
        $.ajax({
            type: "get",
            url: "http://localhost:8080/chanhxe/public/khach-hang/lap-don-hang/kho/"+t_id,
            dataType: "json",
            success: function (response) {
                console.log(response.k_diachi);
                
                calculateAndDisplayRoute(response.k_diachi,add)
            }
        });
     }

     function calculateAndDisplayRoute(add1,add2) {
            directionsService.route(
                {
                origin: {lat:10.022678823009876 ,lng:105.75530472479245},
                destination:{lat:10.022678823009876 ,lng:105.75530472479245},
                travelMode: google.maps.TravelMode.DRIVING,
                },
                (response, status) => {
                if (status === "OK") {
                    directionsRenderer.setDirections(response);
                    console.log(response);
                    //tinh khoang cach
                    service.getDistanceMatrix(
                    {
                        origins: [add1],
                        destinations: [add2],
                        travelMode: google.maps.TravelMode.DRIVING,
                    },
                    (response, status) => {
                        if (status !== "OK") {
                            $('#getPlace').removeClass('CheckGG');
                            $('#getPlace').addClass('DontCheckGG');
                        alert("Error was: " + status);

                        }
                        else{
                        var originList=response.originAddresses;
                        var destinationAddresses=response.destinationAddresses;
                        var dt ;
                        var dr ;
                        $('#getPlace').removeClass('DontCheckGG');
                        $('#getPlace').addClass('CheckGG');
                        for (let i = 0; i < originList.length; i++) {
                            const results = response.rows[i].elements;
                                console.log(results);

                            for (let j = 0; j < results.length; j++) {
                                var element = results[j];
                                 dt =element.distance.text;
                                 var khoangcach =element.distance.value;
                                 dr =element.duration.text;
                               
                            }
                        } 
                        // console.log(dt + dr);
                        $('#kh_nhan_km').val(dt);
                        $('#kh_nhan_tgchay').val(dr);
                        $('#TongKC').html(dt);
                        var khoiluong =$('#TongKL').val();
                        var gia = {{$gia->gc_gia}};
                        khoangcach = (khoangcach/1000);
                        var tong = (khoangcach * gia * khoiluong);
                        tong = parseFloat(tong).toLocaleString('en-US')
                        $('#TongCuoc').html(tong+ ' vnđ');
                        }
                    } 
                    );


                } else {
                    window.alert("Directions request failed due to " + status);
                }
                }
            );
            }

      
    }
   
    
    // var khoiluong = $('#KG').val();
    // console.log(khoiluong);


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
                            // console.log(response);
                            $('.value-px').remove();
                            console.log(response);
                            $('#phuongXa').removeAttr("disabled");
                            $('#delPhuongXa').remove();
                            if (reponse = []) {
                                $('#phuongXa').append('<option class="value-px" disabled>Không có dữ liệu</option>');
                            }
                            for (let i = 0; i < response.length; i++) {
                                // console.log(response[i].p_ten);
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

    $(document).ready(function () {
            $('#autoUpdate2').show();
            $('#autoUpdate1').hide();
        $('#checkbox1').change(function(){
        if(this.checked)
            {
                $('#autoUpdate2').hide();
                $('#autoUpdate1').show();
            }
        else
            $('#autoUpdate1').hide();
        });
        $('#checkbox2').change(function(){
        if(this.checked)
            {
                $('#autoUpdate1').hide();
            $('#autoUpdate2').show();
            }
        else
            $('#autoUpdate2').hide();
        });
    });
</script>
<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Lưu";
  } else {
    document.getElementById("nextBtn").innerHTML = "Tiếp theo";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("Submit_HH").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    // if (y[i].value == "") {
      // add an "invalid" class to the field:
    //   y[i].className += " invalid";  
      // and set the current valid status to false:
    //   valid = false;
    // }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}


</script>

@endpush