@extends('admin.template.masters')
@section('title')
    | Cài đặt
@endsection
@section('breadcrumb')
    <li>
        <a href="#" class="">Cài đặt</a>
    </li>
    @yield('bc-setting')
@endsection
@push('css')
    <style>
        .avatar {
            width: 36%;
            margin: auto;
        }
        .avatar > img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 1px solid;
        }   
        section.mail-list .container {
            width: 100%;
        }
        section.mail-list {
            width: 100%;
            /* border: 1px solid; */
        }
        .row.info-acc {
            width: 70%;
            margin: auto;
        }
        .row.info-accc {
            width: 80%;
            margin: auto;
        }
        .active-infor{
            background-color: #353F4F;
            text-decoration: none;
            color: white;
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
<div class="mail-box">
    <aside class="mail-nav mail-nav-bg-color">
        <header class="header"> <h4>Cài đặt</h4> </header>
        <div class="mail-nav-body">
            <ul class="nav nav-pills nav-stacked mail-navigation">
                <li ><a href="{{ route('kh-cai-dat-thong-tin-ca-nhan') }}" class="{{Request::path()== 'khach-hang/cai-dat/thong-tin-ca-nhan' ? 'active-infor' : '' }}"> <i class="fa fa-user"></i> Thông tin cá nhân </a></li>
                <li><a href="{{ route('kh-cai-dat-doi-mat-khau') }}" class="{{Request::path()== 'khach-hang/cai-dat/thong-tin-ca-nhan/doi-mat-khau' ? 'active-infor' : '' }}"> <i class="fa fa-key"></i> Thay đổi mật khẩu </a></li>
            </ul>
        </div>
    </aside>
    <section class="mail-box-info">
        <header class="header">
            <div class="btn-group pull-right">
               
            </div>
            <div class="btn-toolbar">
                <div class="btn-group">
                    <button class="btn btn-sm btn-primary"><i class="fa fa-refresh"></i></button>
                </div>
            </div>

        </header>

        <section class="mail-list">
           @yield('settings')
        </section>


    </section>
</div>
@endsection
@push('script')
<script>
     // Lấy dữ liệu Tỉnh - Quận - Huyện 
     $('#Tinh').change(function (e) {
        e.preventDefault();
        $('#TenDuong').removeAttr("disabled");
        var getID = $(this).children("option:selected").val();
        // console
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/chanhxe/public/quan/" + getID + "/quan-huyen",
            dataType: "json",
            success: function (response) {
                $('.value-qh').remove();
                $('.value-px').remove();
                // console.log(response);
                $('#quanHuyen').removeAttr("disabled");
                
                $('#delQuanHuyen').remove();
                if (reponse = []) {
                    $('.quanHuyen').append('<option class="value-qh" disabled>Không có dữ liệu</option>');
                }
                for (let i = 0; i < response.length; i++) {
                    // console.log(response[i].q_ten);
                    
                    $('.quanHuyen').append('<option class="value-qh" value="' + response[i].q_id + '" >' + response[i].q_ten + '</option>');
                    
                }
                $('#quanHuyen').change(function (e) {
                    // e.preventDefault();
                    var getIDQuanHuyen = $(this).children("option:selected").val();
                    // console.log(getIDQuanHuyen);
                    $.ajax({
                        type: "GET",
                        url: "http://localhost:8080/chanhxe/public/phuong/" + getIDQuanHuyen + "/phuong-xa",
                        dataType: "json",
                        success: function (response) {
                            console.log(response);
                            $('.value-px').remove();
                            console.log(response);
                            $('#phuongXa').removeAttr("disabled");
                            $('#delPhuongXa').remove();
                            if (reponse = []) {
                                $('#phuongXa').append('<option class="value-px" disabled>Không có dữ liệu</option>');
                            }
                            for (let i = 0; i < response.length; i++) {
                                console.log(response[i].p_ten);
                                $('#phuongXa').append('<option class="value-px" value="' + response[i].p_id + '" >' + response[i].p_ten + '</option>');
                            }
                        }
                    });
                });
            }
        });
    });
    





    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush