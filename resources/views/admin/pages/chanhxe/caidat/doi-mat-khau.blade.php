@extends('admin.template.masters')
@section('title')
    | Cài đặt
@endsection
@section('breadcrumb')
    <li>
        <a href="#" class="active">Đổi mật khẩu</a>
    </li>
@endsection
@push('css')
<style>
.row.info-accc {
    width: 80%;
    margin: auto;
}  
.kiemtra {
    border: 2px solid green;
}
.kiemtra-error {
    border: 2px solid red;
}
</style>
@endpush
@section('content')
<div class="container">
    @if (Session::has('alert'))
        <p style="color: green" class="text-center">
            {{ Session::get('alert') }}
        </p>
    @endif
    <div class="row info-accc">
        <div class="col-lg-12">
            <section class="panel" style="width:75%">
                <header class="panel-heading">
                    Đổi mật khẩu
                </header>
                <div class="panel-body">
                    <form class="form-horizontal"  method="POST" action="{{ route('cx-cai-dat-doi-mat-khau-cap-nhat') }}">
                        @csrf
                        <div class="form-group">
                            <label  class="col-lg-3 col-sm-3 control-label">Tài khoản</label>
                            <div class="col-lg-9">
                                <div class="iconic-input">
                                    <i class="fa fa-user"></i>
                                    <input type="text"
                                    class="form-control" readonly value=" {{$chanhxe->username}}  ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-lg-3 col-sm-3 control-label">Mật khẩu củ</label>
                            <div class="col-lg-9">
                                <div class="iconic-input right">
                                    <i class="fa fa-lock"></i>
                                    <input type="password"
                              class="form-control" id="pass1"  placeholder="Nhập mật khẩu củ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-lg-3 col-sm-3 control-label">Mật khẩu mới</label>
                            <div class="col-lg-9">
                                <div class="iconic-input right">
                                    <i class="fa fa-lock"></i>
                                    <input type="text"
                                    class="form-control " name="cx_password2" id="pass2"  placeholder="Nhập mật khẩu mới" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-lg-3 col-sm-3 control-label">Nhập lại mật khẩu</label>
                            <div class="col-lg-9">
                                <div class="iconic-input right">
                                    <i class="fa fa-lock"></i>
                                    <input type="text"
                                    class="form-control " name="cx_password3" id="re-pass2"  placeholder="Nhập lại mật khẩu" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-success" id="CapNhat" style="float:right;margin-right: -170px;" disabled>Cập nhật</button>

                            </div>
                          </div>

                    </form>
                </div>
            </section>
        </div>
    </div>
</div>  
@endsection
@push('script')
<script>

    // Kiểm tra mật khẩu
    $('#pass1').keyup(function (e) { 
        var pass1 = document.getElementById('pass1').value;
       
   

    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
    $.ajax({
        type: "POST",
        url: "{{route('cx-cai-dat-doi-mat-khau-ajax')}}",
        data: {pass:pass1},
        dataType: "json",
        success: function (response) {
            console.log(response);
            if(response == 1){
                 $("#pass1").addClass( "kiemtra" );
                $('#pass2').removeAttr("disabled");
                $('#re-pass2').removeAttr("disabled");
            }
        }
    });

    $('#re-pass2').keyup(function (e) { 
        var pass2 = document.getElementById('pass2').value;
        var repass = document.getElementById('re-pass2').value;
        if(pass2  === repass){

            $( "#pass2" ).removeClass( "kiemtra-error" );
            $( "#re-pass2" ).removeClass( "kiemtra-error" );

            $("#pass2").addClass( "kiemtra" );
            $("#re-pass2").addClass( "kiemtra" );
            $('#CapNhat').removeAttr("disabled");
        }
        else
        {
            $( "#CapNhat" ).prop( "disabled", true );
            $( "#pass2" ).removeClass( "kiemtra" );
            $( "#re-pass2" ).removeClass( "kiemtra" );
            
            $("#pass2").addClass( "kiemtra-error" );
            $("#re-pass2").addClass( "kiemtra-error" );
        }
    });



   });



</script>
@endpush