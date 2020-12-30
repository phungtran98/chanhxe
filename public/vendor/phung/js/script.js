
//Thông báo munu search
$(document).ready(function () {
    
    
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $.ajax({
        type: "get",
        url: "http://localhost:8080/chanhxe/public/chanh-xe/thong-bao-ajax",
        data:{},
        dataType: "json",
        success: function (response) {
        //   console.log(response);
           $('#SoThongbao').empty();
           $('#SoThongbao').append(response.length);
        }
    });


});