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
                Add New Product - Step 1
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                </span>
            </header>

            <div class="panel-body">
                {{ Form::open(['method' => 'post', 'url' => $action , 'class' => 'bucket-form' ]) }}

                <div class="col-md-12">
                    {{ Form::label('product', 'Product Name') }}
                    {{ Form::text('product',null, ["class"=>'form-control' ,"placeholder"=>'Enter Attribute Name', "required"]) }}
                </div>
                <div class="col-md-12">
                    {{ Form::label('prod_type', 'Product Type') }}
                    <select name="prod_type" class='form-control' required>
                        @foreach($prod_types as $prod_typ)
                        <option value="{{ $prod_typ->id }}" >{{ $prod_typ->type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12">
                    {{ Form::label('attr_set', 'Attribute Set') }}
                    <select name="attr_set" class='form-control' required>
                        @foreach($attr_sets as $attr_set)
                        <option value="{{ $attr_set->id }}" >{{ $attr_set->attr_set }}</option>
                        @endforeach
                    </select>
                </div>
                {{ Form::hidden('is_individual','1')  }}
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