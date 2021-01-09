@extends('admin.template.masters')
@section('title')
    | Quản lí khách hàng
@endsection
@section('breadcrumb')
    <li>
        <a href="#" class="active">Quản lí khách hàng</a>
    </li>
@endsection
@push('css')
  <style>
.info_kh > li {
    text-decoration: none;
    display: inline-block;
    margin: 10px;
}
</style>  
@endpush
@section('content')
<div class="directory-info-row">
    <h4  style="color: #075f5b;font-weight: bold;text-align: center;margin-top: -20px; font-size:24px">Danh sách khách hàng </h4>
    <div class="row">
       @foreach ($kh as $item)
        <div class="col-md-6 col-sm-6">
            <div class="panel">
                <div class="panel-body">
                    <h4 style="font-weight:bold"> <a href="{{ route('cx-ql-don-tim-kiem-khach-hang', ['id'=>$item->kh_id]) }}">{{$item->kh_hoten}}</a>  </h4>
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="thumb media-object" src="{{asset('vendor/admin/images/photos/user1.png')}}" alt="">
                            {{-- <img class="thumb media-object" src="https://www.broen-lab.com/Files/Images/employees/avatar-placeholder.png" style="width:50%" alt=""> --}}
                        </a>
                        <div class="media-body">
                            <address>
                              <p>Địa chỉ: <strong>{{$item->kh_diachi}}</strong></p>
                                <abbr >Số điện thoại</abbr> <strong>{{$item->kh_sdt}}</strong> 
                            </address>                           
                        </div>
                    </div>
                </div>
                <?php $tem=0?>
                <ul class="info_kh">
                    <li>Đơn hàng đã tạo: 
                        <strong>
                            @for ($i=0; $i < count($donhang_khachhang) ; $i++)
                            @foreach ($donhang_khachhang[$i] as $v)
                                @if ($v->kh_id == $item->kh_id && count($donhang_khachhang[$i])==1)
                                   
                                  {{count($donhang_khachhang[$i])}} 
                                @elseif($v->kh_id == $item->kh_id && count($donhang_khachhang[$i])>1)
                                {{count($donhang_khachhang[$i])}}
                                @break   
                                @endif
                                @endforeach
                                @endfor
                        </strong>
                    </li>
                </ul>
            </div>
        </div>
       @endforeach
        {{-- <div class="col-md-6 col-sm-6">
            <div class="panel">
                <div class="panel-body">
                    <h4>Margarita Rose <span class="text-muted small"> - Graphics Designer</span></h4>
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="thumb media-object" src="{{asset('vendor/admin/images/photos/user2.png')}}" alt="">
                        </a>
                        <div class="media-body">
                            <address>
                                <strong>ABCDE, Inc.</strong><br>
                                ABC Ave, Suite 14<br>
                                BucketLand, Australia <br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
                            <ul class="social-links">
                                <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
                                <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

       


    </div>
</div>
@endsection
@push('script')
    
@endpush