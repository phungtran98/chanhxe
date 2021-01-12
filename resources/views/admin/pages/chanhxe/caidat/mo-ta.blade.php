@extends('admin.template.masters')
@section('title')
    | Cài đặt
@endsection
@section('breadcrumb')
    <li>
        <a href="#" class="active">Thông tin chành xe</a>
    </li>
    <li>
        <a href="#" class="active">Mô tả</a>
    </li>
@endsection
@push('css')

@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                {{$chanhxe->cx_tenchanhxe}}
                 <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                 </span>
            </header>
            <div class="panel-body">
                <form action="{{ route('cx-mo-ta-cap-nhat') }}" class="form-horizontal " method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea name="cx_mota" id="Mota"  class="wysihtml5 form-control" rows="9"> {{$chanhxe->cx_mota}} </textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning">Cập nhật</button>
                </form>
            </div>
        </section>
    </div>
</div>


@endsection
@push('script')



@endpush