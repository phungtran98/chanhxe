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
                  <input type="text"
                    class="form-control" name="" id=""  value=" {{$request->text}} " placeholder="Nhập mã code...">
                  <input type="hidden"
                    class="form-control" name="" id="" >
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