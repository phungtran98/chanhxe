@extends('admin.template.masters')
@section('title')
    | Admin
@endsection

@push('css')

@endpush
@section('content')
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật giá cước cho toàn bộ chành xe trong hệ thống
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
            </header>
            <div class="panel-body">
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nhập giá cước</label>
                        <input type="number"
                          class="form-control" id="GiaCuoc"  placeholder="Nhập vào giá mới....">
                      
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Giá hiện tại</label>
                        <input type="" style="text-align: center" id="GiaHien"
                          class="form-control"  value=" {{number_format($giacuoc->gc_gia)}} VNĐ" disabled>
                      
                      </div>
                  </div>
                  
              </div>
            </div>
        </section>
    </div>
</div>
@endsection
@push('script')
<script>


  $('#GiaCuoc').on('keypress',function(e) {
    if(e.which == 13) {
        
    var sotien = $(this).val();
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $.ajax({
        type: "post",
        url: " {{route('admin-gia-cuoc-submit')}} ",
        data: {sotien:sotien},
        dataType: "json",
        success: function (response) {
            $('#GiaHien').val(response+ ' VNĐ');
           alert('Cập nhật giá cước thành công!');
        }
    });
    }
});
</script>
@endpush