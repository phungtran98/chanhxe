@extends('admin.template.masters')
@section('title')
    | Thống kê đơn hàng
@endsection
@section('breadcrumb')
    <li>
        <a href="#" class="active">Thống kê đơn hàng</a>
    </li>
@endsection
@push('css')
 <style>
 .MauSac{
     
    color: #075f5b;
    font-size: 15px;
    font-weight: bold;

 }
</style>   
@endpush
@section('content')
<div class="row states-info">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Thống kê đơn hàng
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
            </header>
            <div class="panel-body" style="color: black">
               <div class="row">
                   <div class="col-md-6">
                       <table class="table">
                            <tbody>
                                <tr>
                                    <td class="MauSac">Tổng đơn hàng</td>
                                    <td class="MauSac">{{$donTong}}</td>      
                                </tr>
                                <tr>
                                    <td class="MauSac">Tổng đơn hàng chờ duyệt <span class="badge badge-warning">Chờ duyệt</span></td>
                                    <td class="MauSac">{{$donChoDuyet}}</td>      
                                </tr>
                                <tr>
                                    <td class="MauSac">Tổng đơn hàng đã duyệt   <span class="badge badge-primary">Đã duyệt</span></td>
                                    <td class="MauSac">{{$donDaDuyet}}</td>      
                                </tr>
                                <tr>
                                    <td class="MauSac">Tổng đơn hàng đang giao <span class="badge badge-info">Đang giao hàng</span></td>
                                    <td class="MauSac">{{$donDangGiao}}</td>      
                                </tr>
                                <tr>
                                    <td class="MauSac">Tổng đơn hàng đã giao   <span class="badge badge-success">Đã giao</span></td>
                                    <td class="MauSac">{{$donDaGiao}}</td>      
                                </tr>
                                <tr>
                                    <td class="MauSac">Tổng đơn hàng đã hủy <span class="badge badge-danger">Hủy đơn</span></td>
                                    <td class="MauSac">{{$donHuy}}</td>      
                                </tr>
                                
                            </tbody>
                       </table>
                   </div>
                   <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="dir-info">
                                <div class="row" >
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="https://images.vexels.com/media/users/3/143188/isolated/preview/5f44f3160a09b51b4fa4634ecdff62dd-money-icon-by-vexels.png" alt=""/>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <h5  style="color: #075f5b;font-weight: bold;font-size: 18px;">Tổng doanh thu</h5>
                                        
                                    </div>
                                    <div class="col-xs-3">
                                        <a class="dir-like" href="#" style="color: #075f5b;font-weight: bold;font-size: 15px; margin-left:-20px">
                                            {{number_format($tongDoanhThu)}} vnđ
                                          
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="http://localhost:8080/chanhxe/public/vendor/users/images/logo/1.png" alt=""/>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="{{ route('cx-xe') }}"><h5  style="color: #075f5b;font-weight: bold;font-size: 18px;">Tổng số xe</h5></a>
                                       
                                    </div>
                                    <div class="col-xs-3">
                                        <a class="dir-like" href="#">
                                            <span style="color: #075f5b;font-weight: bold;font-size: 15px;"> {{ count($TongXe) }}</span>
                                          
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="http://localhost:8080/chanhxe/public/upload/chanhxe/av.png" alt=""/>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="{{ route('cx-tai-xe') }}"><h5  style="color: #075f5b;font-weight: bold;font-size: 18px;">Tổng số tài xế</h5></a>
                                       
                                    </div>
                                    <div class="col-xs-3">
                                        <a class="dir-like" href="#">
                                            <span style="color: #075f5b;font-weight: bold;font-size: 15px;">{{ count($TongTaiXe) }}</span>
                                          
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="https://freeiconshop.com/wp-content/uploads/edd/location-map-flat.png" alt=""/>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="{{ route('cx-tuyen-xe') }}"><h5  style="color: #075f5b;font-weight: bold;font-size: 18px;">Tổng số tuyến </h5></a>
                                    </div>
                                    <div class="col-xs-3">
                                        <a class="dir-like" href="#">
                                            <span style="color: #075f5b;font-weight: bold;font-size: 15px;">{{ count($TongTuyen) }}</span>
                                          
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                   <div class="col-md-6">
                        {{-- <h5  style="color: #075f5b;font-weight: bold;font-size: 18px;">Tổng doanh thu   <span style="float: right"> {{number_format($tongDoanhThu)}} VNĐ</span></h5>
                        <br>
                        <h5  style="color: #075f5b;font-weight: bold;font-size: 18px;">Xe   <span style="float: right"> {{ count($TongXe) }} Chiếc</span></h5>
                        <br>
                        <h5  style="color: #075f5b;font-weight: bold;font-size: 18px;">Tài Xế   <span style="float: right"> {{ count($TongXe) }} Chiếc</span></h5>
                        <br>
                        <h5  style="color: #075f5b;font-weight: bold;font-size: 18px;">Tổng tuyến   <span style="float: right"> {{ count($TongXe) }} Chiếc</span></h5> --}}
                        
                      
                        {{-- <div class="row" style="margin: 20px 0;">
                            <form action="{{ route('cx-thong-ke-don-theo-thang-nam') }}" method="post">
                                @csrf
                                <div class="col-md-5">
                                   
                                      <input type="date"
                                        class="form-control" name="BDate" id="">
                                   
                                </div>
                                <div class="col-md-5">
                                    
                                      
                                        <input type="date"
                                          class="form-control" name="EDate" id="">
                                     
                                </div>
                                <div class="col-md-2">
                                    <button type="submit"  class="btn btn-success">Thống Kê</button>
                                </div>
                            </form>
                        </div> --}}
                        {{-- @if ( Request::segment(2) == 'thong-ke-don-theo-thang-nam')
                        <h5  style="color: #075f5b;font-weight: bold;font-size: 18px;">Tổng doanh thu   <span style="float: right"> {{number_format($tongDoanhThuThang)}} VNĐ</span></h5>
                        @endif --}}
                        
                        
                   </div>
               </div>
               <hr>
               <div class="col-md-4" style="margin-top: 10px">
                <div class="form-group">
                    <label for="">Chọn năm</label>
                    <select class="form-control" name="" id="ChonNam">
                     <option disabled selected>---chọn năm---</option>
                    </select>
                  </div>
               </div>
               <div class="col-md-12">
                   
                {{-- <h5  style="color: #075f5b;font-weight: bold;font-size: 20px;text-align:center">Thống kê doanh thu theo Năm</h5> --}}
                <canvas id="myChart" width="400" height="200"></canvas>
            </div>
            </div>
        </section>
    </div>
</div>
@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script>
    var month= ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5','Tháng 6','Tháng 7','Tháng 8','Tháng 9','Tháng 10','Tháng 11','Tháng 12' ];
    var ctx = document.getElementById('myChart').getContext('2d');
    function SelectYear(){

        var date = new Date();
        var nam = date.getFullYear();
        for(var i=nam -5 ; i<=2025 ; i++)
        {   if(i == nam)
            {
                $('#ChonNam').append('<option value="'+i+'" selected>'+i+'</option>');
            }
             $('#ChonNam').append('<option value="'+i+'">'+i+'</option>');
            
        }

    }
    SelectYear();

    $('#ChonNam').change(function (e) { 
        
        e.preventDefault();
        var nam = $(this).val();
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var check=0;
        $.ajax({
            type: "POST",
            url: "{{ route('cx-thong-ke-don-theo-nam')}}",
            data: {nam:nam},
            dataType: "json",
            success: function (response) {
                console.log(response);
                for(var i=0; i< response.length; i++)
                {
                    if(response[i] > 0)
                    {
                        check=1;
                        break;
                    }
                }
                // console.log(check);
                if(check == 0)
                {
                    alert('Chưa có dữ liệu để thống kê');
                }
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:month,
                        datasets: [{
                            label: 'Tổng Doanh Thu (vnđ)',
                            data:response,
                            backgroundColor: [
                                'rgba(7, 95, 91, 1)',
                                'rgba(7, 95, 91, 1)',
                                'rgba(7, 95, 91, 1)',
                                'rgba(7, 95, 91, 1)',
                                'rgba(7, 95, 91, 1)',
                                'rgba(7, 95, 91, 1)',
                                'rgba(7, 95, 91, 1)',
                                'rgba(7, 95, 91, 1)',
                                'rgba(7, 95, 91, 1)',
                                'rgba(7, 95, 91, 1)',
                                'rgba(7, 95, 91, 1)',
                                'rgba(7, 95, 91, 1)',
                                
                            ],
                            borderColor: [
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 159, 64, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }
        });


        
    });
    


    

    $.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: "{{ route('cx-thong-ke-ajax')}}",
        data: {y:0},
        dataType: "json",
        success: function (response) {
            console.log(response);
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels:month,
                    datasets: [{
                        label: 'Tổng Doanh Thu (vnđ)',
                        data:response,
                        backgroundColor: [
                            'rgba(7, 95, 91, 1)',
                            'rgba(7, 95, 91, 1)',
                            'rgba(7, 95, 91, 1)',
                            'rgba(7, 95, 91, 1)',
                            'rgba(7, 95, 91, 1)',
                            'rgba(7, 95, 91, 1)',
                            'rgba(7, 95, 91, 1)',
                            'rgba(7, 95, 91, 1)',
                            'rgba(7, 95, 91, 1)',
                            'rgba(7, 95, 91, 1)',
                            'rgba(7, 95, 91, 1)',
                            'rgba(7, 95, 91, 1)',
                            
                        ],
                        borderColor: [
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    });

   
</script>
@endpush