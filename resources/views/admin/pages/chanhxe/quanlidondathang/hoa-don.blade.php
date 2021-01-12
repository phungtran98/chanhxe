
<!doctype html>
<html lang="en">
  <head>
    <title>Đơn Hàng_{{$ctdvc->dvc_madon}}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body{
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
        }
    </style>
  </head>
  <body>
     <div class="container-fulid">
         <div class="row">
             <div class="col">
                <table class="table " >
                    <tbody>
                    <tr>
                        <tr>
                            {{-- <td class="col-md-4"><img src="{{asset('vendor/qr.jpg')}}" alt=""></td> --}}
                            <td class="col-md-4"> {!!$Barcode->getBarcodeHTML($ctdvc->dvc_madon,'EAN13')!!} <br> <span style="font-size:13px;"> <strong>{{$ctdvc->dvc_madon}} </strong></span> </td>
                            <td  class="col-md-4"> <p style="text-align: center; font-size:15px; text-transform:uppercase; font-weight:bold">Phieu Gui <br> Bill of consignment</p></td>
                            <td class="col-md-4"><img style="width:28%; margin-top:-62px; margin-left:35px"  src="{{asset('vendor/lgh.png')}}" alt=""></td> 
                            <!-- <p></p> -->
                        </tr>
                        <tr>
                            <td class="col-md-6" colspan="2">Đơn vị vận chuyển: <strong>{{$ctdvc->cx_tenchanhxe}}</strong> <br>Tuyến: <strong>{{$ctdvc->t_tentuyen}}</strong> </td>
                            <td  class="col-md-6">Ngày lập: <strong> {{date('d-m-Y H:i:s', strtotime($thoigian->toDateTimeString()))}} </strong></td>
                        </tr>
                    </tr>
                    <tr>
                        <td class="col-md-4">
                            <p style="font-weight: 700; font-size:14px; font-style:italic">THÔNG TIN NGƯỜI GỬI</p>
                            <p >Họ tên: <strong>{{$ctdvc->kh_hoten}}</strong></p>
                            <p >Địa chỉ:<strong> {{$ctdvc->kh_diachi}}</strong></p>
                            <p >Số điện thoại:<strong> {{$ctdvc->kh_sdt}}</strong></p>
                        </td>
                        <td class="col-md-4">
                            <p style="font-weight: 700; font-size:14px; font-style:italic">THÔNG TIN NGƯỜI NHẬN</p>
                            <p >Họ tên :<strong> {{$ctdvc->ctdvc_hotennhan}}</strong></p>
                            <p >Địa chỉ:<strong>{{$ctdvc->ctdvc_diachinhan}}</strong></p>
                            <p >Số điện thoại:<strong>{{$ctdvc->ctdvc_sdtnhan}}</strong></p>
                        </td>
                        <td class="col-md-4" >
                            <p style="font-weight: 700; font-size:14px; font-style:italic">THÔNG TIN HÀNG HÓA</p>
                            <p >Tên hàng hóa:<strong> {{$ctdvc->hh_ten.' x '.$ctdvc->hh_soluong}}</strong></p>
                            <p >Tổng khối lượng:<strong> {{$ctdvc->hh_khoiluong}} &nbsp; KG</strong> </p>
                            <p >Kích thước:<strong> {{$ctdvc->hh_kichthuoc}}</strong></p>
                        </td>
                    </tr>
                    <tr>
                       
                        <td class="col-md-8" colspan="2">
                            <p style="font-weight: 700; font-size:14px; font-style:italic">GHI CHÚ</p>
                            <p ><strong> {{$ctdvc->ctdvc_mota}} Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum cum exercitationem nihil accusamus libero porro culpa reiciendis consectetur. Rerum aut, commodi quaerat delectus temporibus natus ea modi alias laboriosam a!</strong></p>
                        </td>
                        <td class="col-md-4" >
                            <p style="font-weight: 700; font-size:14px; font-style:italic">MÃ QR ĐƠN HÀNG </p>
                            <p>{!! QrCode::size(90)->color(7, 95, 91)->generate($ctdvc->dvc_madon) !!} </p>
                            <p><img style="margin: 10px 30px;" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($ctdvc->dvc_madon)) !!} "> </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-12" colspan="3">
                            <p style="font-weight: 700; font-size:14px; font-style:italic">THANH TOÁN</p>
                            <p >Tiền thu hộ (1): <strong style="float: right">{{number_format($ctdvc->hh_tienthuho) }} vnđ</strong></p>
                            <p >Tổng cước phí vận chuyển (2):<strong style="float: right"> {{ number_format((int)$ctdvc->ctdvc_km  * $ctdvc->hh_khoiluong * $cuoc)}} vnđ</strong></p>
                            @if ($ctdvc->ctdvc_phigui !=0)
                                <p >Đã thanh toán cước phí (3):<strong style="float: right"> -{{ number_format((int)$ctdvc->ctdvc_km  * $ctdvc->hh_khoiluong * $cuoc)}}vnđ</strong></p>
                                <hr>
                                <p >Tổng cước (1)+(2)+(3):<strong style="float: right"> {{number_format($ctdvc->hh_tienthuho) }} vnđ</strong></p>
                            @else
                            <hr>
                            <p >Tổng cước (1)+(2):<strong style="float: right"> {{number_format($ctdvc->hh_tienthuho + ((int)$ctdvc->ctdvc_km  * $ctdvc->hh_khoiluong * $cuoc)) }} vnđ</strong></p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-12" colspan="3">
                            <p>Lưu ý: <br>
                                1. Chành xe là đơn vị vận chuyển sẽ chịu trách nhiệm về chất lượng của sản phẩm <br>
                                2. Mọi thắc mắc và khiếu nại xin vui lòng liên hệ <strong>HotLine 022222222</strong>.
                            
                            </p>
         
                        </td>
                    </tr>
                   
                  
                    
                    </tbody>
              </table>
             </div>
         </div>
     </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>