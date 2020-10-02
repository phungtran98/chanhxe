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
                            <p class="float-right" style="display:inline-block">Người gửi:</p>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="">Họ tên người gửi <span>*</span></label>
                            <input type="text"
                            class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
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
                            <p class="float-right" style="display:inline-block">Người nhận:</p>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="name">Họ tên <span>*</span></label>
                            <input type="text"
                            class="form-control" name="" id="name" aria-describedby="helpId" placeholder="Nguyến văn A">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại <span>*</span></label>
                            <input type="text"
                            class="form-control" name="phone" id="phone" aria-describedby="helpId" placeholder="0123456789">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">Tỉnh/Thành phố</label>
                                    <select class="form-control" name="city" id="city">
                                    <option>c</option>
                                    <option>c</option>
                                    <option>c</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Quận/Huyện</label>
                                    <select class="form-control" name="" id="">
                                    <option>c</option>
                                    <option>c</option>
                                    <option>c</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Phường/Xã</label>
                                    <select class="form-control" name="" id="">
                                    <option>c</option>
                                    <option>c</option>
                                    <option>c</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Số nhà, tên đường,...</label>
                                    <input type="text"
                                    class="form-control" name="" id="" aria-describedby="helpId" placeholder="30/4, Xuân Khánh,..">
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
                            <p class="float-right" style="display:inline-block">Thông tin hàng hóa</p>
                        </div>
                    </div>
                    <div class="panel-body">
                    <div class="form-group">
                        <label for="">Tên hàng hóa <span>*</span> </label>
                        <input type="text"
                        class="form-control" name="" id="" aria-describedby="helpId" placeholder="Điện thoại di động...">
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng <span>*</span> </label>
                        <input type="text"
                        class="form-control" name="" id="" aria-describedby="helpId" placeholder="0">
                    </div>
                    <div class="form-group">
                        <label for="">Giá trị của hàng hóa (VNĐ): </label>
                        <input type="text"
                        class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    {{-- cách qui đổi --}}
                    <div class="row">
                        <div class="col-12 ">
                            <p class="">Kích thước</p>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text"
                                class="form-control" name="" id="" aria-describedby="helpId" placeholder="Dài (cm)">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text"
                                class="form-control" name="" id="" aria-describedby="helpId" placeholder="Rộng (cm)">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text"
                                class="form-control" name="" id="" aria-describedby="helpId" placeholder="Cao (cm)">
                            </div>
                        </div>
                       
                        <div class="col-md-12">
                            <div class="form-group">
                               <label for="">Quy đổi</label>
                                <input type="text"
                                class="form-control" name="" id="" aria-describedby="helpId" placeholder="" readonly>
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

@endsection
@push('scritt')
    
@endpush