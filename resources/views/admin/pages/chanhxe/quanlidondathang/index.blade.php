@extends('admin.template.masters')
@section('title')
    | Quản lí đơn đặt hàng
@endsection
@section('breadcrumb')
    <li>
        <a href="#" class="active">Quản lí đơn đặt hàng</a>
    </li>
@endsection
@push('css')
    
@endpush
@section('content')
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Editable Table
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="btn-group">
                            <button id="editable-sample_new" class="btn btn-primary">
                                Add New <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div class="btn-group pull-right">
                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#">Print</a></li>
                                <li><a href="#">Save as PDF</a></li>
                                <li><a href="#">Export to Excel</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Points</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td>babson</td>
                                <td> milan</td>
                                <td>567</td>
                                <td class="center">nothing</td>
                                <td><a class="edit" href="javascript:;">Edit</a></td>
                                <td><a class="delete" href="javascript:;">Delete</a></td>
                            </tr>
                            <tr class="">
                                <td>Waren</td>
                                <td>gufet</td>
                                <td>622</td>
                                <td class="center">author</td>
                                <td><a class="edit" href="javascript:;">Edit</a></td>
                                <td><a class="delete" href="javascript:;">Delete</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@push('script')
    
@endpush