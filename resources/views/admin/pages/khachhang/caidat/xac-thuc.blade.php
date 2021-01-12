@extends('admin.pages.khachhang.caidat.cai-dat')
@section('bc-setting')
<li>
    <a href="#" class="active">Xác thực</a>
</li>
@endsection
@section('settings')
<div class="container">
    <div class="row info-acc">
        <form action="{{ route('kh-cai-dat-cap-nhat-xac-thuc') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <div class="form-group">
                  <label for="">Nhập mã Code:</label>
                  <input type="number"
                    class="form-control" name="MaInput" id=""   placeholder="Nhập mã code..." style="width:40%">
                  <input type="hidden"
                    class="form-control" name="MaOutput" id="" value="{{$request->text}}">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-success">Xác thực</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('script')
<script>
   
</script>
@endpush