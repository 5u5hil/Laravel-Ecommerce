@extends('theSoul.layouts.default')

@section('mystyles')

{{ HTML::style('public/theSoul/js/iCheck/skins/square/green.css'); }}
{{ HTML::style('public/theSoul/js/bootstrap-wysihtml5/bootstrap-wysihtml5.css'); }}

@stop


@section('content')

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Add New Attribute Set
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                </span>
            </header>

            <div class="panel-body">
                {{ Form::model($attr_sets, ['method' => 'post', 'url' => $action , 'class' => 'bucket-form' ]) }}

                <div class="col-md-3 form-group">
                    {{ Form::label('attr_set', 'Attribute Set Name') }}
                    {{ Form::text('attr_set',null, ["class"=>'form-control' ,"placeholder"=>'Enter Attribute Set Name', "required"]) }}
                </div>

                {{ Form::hidden('id') }}

                <div class="col-md-12 form-group">
                    {{ Form::submit('Submit',["class" => "btn btn-info"]) }}
                    {{ Form::close() }}
                </div>
            </div>
        </section>
    </div>
</div>

@stop

@section('myscripts')
{{ HTML::script('public/theSoul/js/iCheck/jquery.icheck.js'); }}
{{ HTML::script('public/theSoul/js/ckeditor/ckeditor.js'); }}
{{ HTML::script('public/theSoul/js/bootstrap-wysihtml5/wysihtml5-0.3.0.js'); }}
{{ HTML::script('public/theSoul/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js'); }}
{{ HTML::script('public/theSoul/js/icheck-init.js'); }}

<script>
    $(document).ready(function () {

    });
</script>
@stop