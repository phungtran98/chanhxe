@extends('admin.pages.khachhang.caidat.cai-dat')
@section('bc-setting')
<li>
    <a href="#" class="active">Đổi mật khẩu</a>
</li>
@endsection
@section('settings')
<div class="container">
    @if (Session::has('alert'))
        <p style="color: green" class="text-center">
            {{ Session::get('alert') }}
        </p>
    @endif
    <div class="row info-accc">
        <form action="{{ route('kh-cai-dat-doi-mat-khau-cap-nhat') }}" method="post">
            @csrf
            <div class="table-responsive text-nowrap">
                <!--Table-->
                <table class="table table-striped" style="font-family:'Open Sans', sans-serif;">
        
                  <!--Table head-->
                  <tbody>
                    <tr>
                      <td class="table-td">Tài khoản:</td>
                      <td>
                          <div class="form-group">
                            <input type="text"
                              class="form-control" readonly value="  {{$kh->username}} ">
                          </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Mật khẩu củ:</td>
                      <td>
                          <div class="form-group">
                            <input type="password"
                              class="form-control" id="pass1"  placeholder="Nhập mật khẩu củ">
                          </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Mật khẩu mới:</td>
                      <td>
                          <div class="form-group">
                            <div class="form-check">
                            <input type="text"
                              class="form-control " name="kh_password2" id="pass2"  placeholder="Nhập mật khẩu mới" disabled>
                          </div>
                          </div>    
                      </td>
                    </tr>
                    <tr>
                      <td>Nhập lại mật khẩu:</td>
                      <td>
                          <div class="form-group">
                            <div class="form-check">
                            <input type="text"
                              class="form-control " name="kh_password3" id="re-pass2"  placeholder="Nhập lại mật khẩu" disabled>
                          </div>
                          </div>    
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                          <div class="form-group">
                            <button type="submit" class="btn btn-success" id="CapNhat" disabled>Cập nhật</button>
                          </div>
                      </td>
                    </tr>
                  </tbody>
                  <!--Table head-->
    
        
        
                </table>
                <!--Table-->
            </div>
        </form>
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
        url: "{{route('kh-cai-dat-doi-mat-khau-ajax')}}",
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