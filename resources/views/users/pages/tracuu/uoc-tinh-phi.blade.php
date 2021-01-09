@extends('users.template.masters')
@push('title')
    Ước tính cước phí
@endpush
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
@include('users.template.slider')   
<div class="" style="margin-top: 50px ;margin-bottom: 150px">
    <div class="container">
     <div class="row">
        <a href="javascript: history.go(-1)" style="margin-top: -33px;margin-bottom: 10px; color: #075f5b;">Trở về</a>
         <div class="col-md-12">

             <h5 style="color: #075f5b;font-weight: bold;font-size: 20px;"><i> Ước tính cước phí</i></h5> 
             <table id="example" class="table table-striped table-bordered" style="width:120%">
                <thead>
                    <tr class="table_thead">    
                        <th>Nơi gửi</th>
                        <th>Nơi nhận</th>
                        <th>Khối lượng (KG)</th>
                        <th>Khoảng cách (KM)</th>
                        <th>Tổng tiền (VNĐ)</th>
                    </tr>
                </thead>
                <tbody>
                   {{-- @foreach ($data as $item) --}}
                       <tr>
                           <td style="width:350px">  {{ $data['noidi']}} </td>
                           <td style="width:350px">  {{ $data['noiden']}} </td>
                           <td style="text-align: center">  {{ $data['khoiluong']}} </td>
                           <td style="text-align: center">  {{ $data['km']}} </td>
                           <td style="text-align: center"> <strong>{{$data['cuoc']}}</strong>  </td>
                       </tr>
                   {{-- @endforeach --}}
                </tbody>
                    
            </table>
         </div>
     </div>

    </div>
</div>
@endsection
@push('css')
    <script>
        // alert('ok');
    </script>
@endpush