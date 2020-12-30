@extends('admin.template.masters')
@section('title')
    | Cài đặt
@endsection
@section('breadcrumb')
    <li>
        <a href="#" class="active">Cập nhật thông tin</a>
    </li>
@endsection
@push('css')
    
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <h4 class="fw-title">Form Wizard with Validation</h4>
        <div class="box-widget">
            <div class="widget-head clearfix">
                <div id="top_tabby" class="block-tabby pull-left">
                </div>
            </div>
            <div class="widget-container">
                <div class="widget-block">
                    <div class="widget-content box-padding">
                        <form id="stepy_form" class=" form-horizontal left-align form-well">
                            <fieldset title="Step 1">
                                <legend>description one</legend>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Username</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="name" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Email Address</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="email" type="email"/>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset title="Step 2">
                                <legend>description two</legend>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">First Name</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" placeholder="First Name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Last Name</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" placeholder="Last Name" class="form-control">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset title="Step 3">
                                <legend>description three</legend>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Text Input</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" placeholder="Text Input" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Checkbox</label>
                                    <div class="col-md-6 col-sm-6">
                                        <label class="checkbox">
                                            <input type="checkbox" value="">
                                            Option one is this and that—be sure to include why it's great </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Radio</label>
                                    <div class="col-md-6 col-sm-6">
                                        <label class="radio">
                                            <input type="radio" name="optionsRadios" value="option1" checked>
                                            Option one is this and that—be sure to include why it's great </label>
                                    </div>
                                </div>
                            </fieldset>
                            <button type="submit" class="finish btn btn-info btn-extend"> Finish!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    /*=====STEPY WIZARD====*/
    $(function() {
        $('#default').stepy({
            backLabel: 'Previous',
            block: true,
            nextLabel: 'Next',
            titleClick: true,
            titleTarget: '.stepy-tab'
        });
    });
    /*=====STEPY WIZARD WITH VALIDATION====*/
    $(function() {
        $('#stepy_form').stepy({
            backLabel: 'Back',
            nextLabel: 'Next',
            errorImage: true,
            block: true,
            description: true,
            legend: false,
            titleClick: true,
            titleTarget: '#top_tabby',
            validate: true
        });
        $('#stepy_form').validate({
            errorPlacement: function(error, element) {
                $('#stepy_form div.stepy-error').append(error);
            },
            rules: {
                'name': 'required',
                'email': 'required'
            },
            messages: {
                'name': {
                    required: 'Name field is required!'
                },
                'email': {
                    required: 'Email field is requerid!'
                }
            }
        });
    });
</script>  
@endpush