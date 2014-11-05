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
                {{ Form::model($attr, ['method' => 'post', 'url' => $action , 'class' => 'bucket-form' ]) }}
                <?php $attrSets = $attr->attributesets->toArray() ?>
                <div class="col-md-12">
                    <div class="col-md-3 form-group">
                        {{ Form::label('attr_set', 'Attribute Set') }}
                        @foreach($attr_sets as $attr_set)
                        <div class="square-green single-row">
                            <div class="radio">
                                <label><input type="checkbox"  name="attr_set[]" value="{{ $attr_set->id }}" {{ Helper::searchForKey("id",$attr_set->id,$attrSets) ? "checked" : ""  }} /> {{ $attr_set->attr_set }}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-3 form-group">
                        {{ Form::label('attr_type', 'Attribute Type') }}
                        @foreach($attr_types as $attr_type)
                        <div class="square-green single-row">
                            <div class="radio">
                                <label><input type="radio"  name="attr_type" value="{{ $attr_type->id }}" {{ ($attr_type->id == $attr->attr_type) ? "checked" : ""  }} /> {{ $attr_type->attr_type }}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-6 form-group">
                        {{ Form::label('attr', 'Attribute Name') }}
                        {{ Form::text('attr',null, ["class"=>'form-control' ,"placeholder"=>'Enter Attribute Name', "required"]) }}

                        <div class="attrValues">
                            {{ Form::label('attr_values', 'Attribute Values') }}
                            {{ Form::textarea('attr_values',null, ["class"=>'form-control' ,"placeholder"=>'Enter Attribute Name', "required"]) }}
                        </div>                    
                    </div>
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