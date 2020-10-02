@extends('admin.template.masters')
@section('title')
    | Ước lượng chi phí
@endsection
@section('breadcrumb')
    <li>
        <a href="#" >Tra cứu</a>
    </li>
    <li>
        <a href="#" class="active"> Ước lượng chi phí</a>
    </li>
@endsection
@push('css')
    
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel ">
                <div class="row">
                    <div class="panel-body">
                        <div class="col-md-6">
                            <div class="user-send">
                                <img src=" {{asset('images/u-send.png')}} " alt="">
                                <p class="float-right" style="display:inline-block">Người gửi:</p>
                            </div>
                            <div class="form-group">
                                <label for="city">Tỉnh/Thành phố</label>
                                <select class="form-control" name="city" id="city">
                                <option>c</option>
                                <option>c</option>
                                <option>c</option>
                                </select>
                            </div>
                                <div class="form-group">
                                    <label for="">Quận/Huyện</label>
                                    <select class="form-control" name="" id="">
                                    <option>c</option>
                                    <option>c</option>
                                    <option>c</option>
                                    </select>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="user-send">
                                <img src=" {{asset('images/u-re.png')}} " alt="">
                                <p class="float-right" style="display:inline-block">Người nhận:</p>
                            </div>
                            <div class="form-group">
                                <label for="city">Tỉnh/Thành phố</label>
                                <select class="form-control" name="city" id="city">
                                <option>c</option>
                                <option>c</option>
                                <option>c</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Quận/Huyện</label>
                                <select class="form-control" name="" id="">
                                <option>c</option>
                                <option>c</option>
                                <option>c</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Nhập khối lượng (Gam)</label>
                              <input type="text"
                                class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">chi phí ước tính</label>
                              <input type="text"
                                class="form-control" name="" id="" aria-describedby="helpId" placeholder="" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scritt')
    
@endpush