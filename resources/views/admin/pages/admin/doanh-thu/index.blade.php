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
                <option value="" disabled selected>----Chọn tên chành xe----</option>
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
                    <th>Tổng danh thu</th>
                </tr>
            </thead>
            <tbody id="TableChanhXe"> 
                
                
                  
            </tbody>
                
        </table>
    </div>
    <input type="hidden" id="Gia" value=" {{$cuoc}} ">
    <div class="col-md-4" style="margin-top: 50px">
        <div class="form-group">
            <label for="">Chọn năm</label>
            <select class="form-control" name="" id="ChonNam">
             <option disabled selected>---chọn năm---</option>
            </select>
          </div>
    </div>
    <div class="col-md-12" >
        <div class="panel panel-primary">
            <div class="panel-heading" style="background:#075f5b ">
                Thống kê doanh thu
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <canvas id="myChart" width="400" height="200"></canvas>
                    </div>
                </div>
                
            </div>
        </div>
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
        var cx_id = $('#GetChanhXe').val();
        // alert(cx_id);
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var check=0;
        $.ajax({
            type: "POST",
            url: "{{ route('cx-thong-ke-don-theo-nam-admin')}}",
            data: {nam:nam, id:cx_id},
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
    

























   
   
    $('#GetChanhXe').change(function (e) { 
        e.preventDefault();
        $('#TableChanhXe').empty();
        var cx_id = $(this).val();  
        console.log(cx_id);
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "{{ route('admin-thong-ke-ajax')}}",
            data: {id:cx_id},
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
        //Phần này lấy thông tin của chành xe
        var gia = $('#Gia').val();
        // alert(gia);
        var tongDoanhThu=0;
        $.ajax({
            type: "post",
            url: " {{route('admin-info-cx')}} ",
            data: {id:cx_id},
            dataType: "json",
            success: function (response) {
                console.log(response);
                for (let index = 0; index < response.length; index++) {
                    // console.log(response[index].ctdvc_km * response[index].hh_khoiluong * gia);
                    tongDoanhThu+= response[index].ctdvc_km * response[index].hh_khoiluong * gia;
                }
                // console.log(tongDoanhThu);
                var table ='<tr>';
                table+='<td> '+response[0].cx_tenchanhxe+' </td>';
                table+='<td>'+response[0].cx_hoten+'</td>';
                table+='<td > <strong style="float:right">'+parseFloat(tongDoanhThu).toLocaleString('en-US')+' vnđ</strong></td>';
                table+='</tr>';
                $('#TableChanhXe').empty();
                $('#TableChanhXe').append(table);

            }
        });
        
    });
    
</script>
<script>
    // $('#GetChanhXe').change(function (e) { 
    //     e.preventDefault();
    //     this.form.submit();
    // });
</script>
@endpush