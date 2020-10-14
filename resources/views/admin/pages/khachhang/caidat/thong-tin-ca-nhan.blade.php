@extends('admin.pages.khachhang.caidat.cai-dat')
@section('bc-setting')
<li>
    <a href="#" class="active">Thông tin cá nhân</a>
</li>
@endsection
@section('settings')
<div class="container">
    <div class="row info-acc">
        <form action="{{ route('kh-cai-dat-cap-nhat') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12 ">
                <div class="avatar">
                    @if ($kh->kh_hinhanh == null)
                    <img src="{{asset('upload/khachhang/user-placeholder.png')}}" alt="" id="blah"> 
                    @else
                        <img src=" {{asset('upload/khachhang/'.$kh->kh_hinhanh)}} " alt="" id="blah">
                    @endif
                </div>
                <div class="form-group" style="margin: 5px 0;">
                    <input type="file" class="form-control-file" name="kh_hinhanh"  onchange="readURL(this)" >
                    <label for="">Hình đại diện</label>
                </div>
        
                <div class="form-group">
                    <label for="">Họ tên</label>
                    <input type="text" name="kh_hoten"  value=" {{$kh->kh_hoten}} " class="form-control"  >
                   
                </div>
                @if ($kh->kh_diachi ==null)
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="city">Tỉnh/Thành phố</label>
                                <select class="form-control" name="tinh" id="Tinh" style="padding-left: 0px;padding-right: 0px;width: 150px;">
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
                                <select class="form-control quanHuyen" name="quan" id="quanHuyen"  disabled style="padding-left: 0px;padding-right: 0px;width: 154px;">
                                    <option value="" id="delQuanHuyen">Chọn Quận - Huyện</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding-left: 4px">
                            <div class="form-group">
                                <label for="">Phường/Xã</label>
                                <select class="form-control phuongXa" name="phuong" id="phuongXa" disabled style="padding-left: 0px;padding-right: 0px;width: 154px;">
                                    <option value="" id="delPhuongXa">Chọn Phường - Xã</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Số nhà, tên đường,...</label>
                                <input type="text"
                                class="form-control" name="tenduong"   placeholder="30/4, Xuân Khánh,..">
                            </div>
                        </div>
                    </div>
                @else
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="kh_diachi" id="" value=" {{$kh->kh_diachi}} " class="form-control" readonly >
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="city">Tỉnh/Thành phố</label>
                            <select class="form-control" name="tinh" id="Tinh" style="padding-left: 0px;padding-right: 0px;width: 150px;">
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
                            <select class="form-control quanHuyen" name="quan" id="quanHuyen"  disabled style="padding-left: 0px;padding-right: 0px;width: 154px;">
                                <option value="" id="delQuanHuyen">Chọn Quận - Huyện</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-left: 4px">
                        <div class="form-group">
                            <label for="">Phường/Xã</label>
                            <select class="form-control phuongXa" name="phuong" id="phuongXa" disabled style="padding-left: 0px;padding-right: 0px;width: 154px;">
                                <option value="" id="delPhuongXa">Chọn Phường - Xã</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Số nhà, tên đường,...</label>
                            <input type="text"
                            class="form-control" name="tenduong" id="TenDuong"  placeholder="30/4, Xuân Khánh,.." disabled>
                        </div>
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <label for="">Số điện thoại <span class="star-red">*</span></label>
                    <input type="text" name="kh_sdt"   value=" {{$kh->kh_sdt}} " class="form-control"  >
                   
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-warning">Cập nhật Thông tin</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('script')
<script>
   
</script>
@endpush