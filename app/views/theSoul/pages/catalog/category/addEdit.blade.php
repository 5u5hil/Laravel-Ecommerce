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
                Add New Category
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                </span>
            </header>

            <div class="panel-body">
                {{ Form::model($category, ['method' => 'post', 'files'=> true, 'url' => $action , 'class' => 'bucket-form' ]) }}

                <div class="col-md-3 form-group">
                    {{ Form::label('category', 'Category Name') }}
                    {{ Form::text('category',null, ["class"=>'form-control' ,"placeholder"=>'Enter Category Name', "required"]) }}
                </div>

                <div class="col-md-3 form-group">
                    {{ Form::label('is_active', 'Activate Category ?') }}
                    {{ Form::select('is_active',["0" => "No", "1" => "Yes"],null,["class"=>'form-control']) }}
                </div>

                <div class="col-md-3 form-group">
                    {{ Form::label('is_nav', 'Include in Navigation ?') }}
                    {{ Form::select('is_nav',["0" => "No", "1" => "Yes"],null,["class"=>'form-control']) }}
                </div>

                <div class="col-md-3 form-group">
                    {{ Form::label('url_key', 'Enter URL Key') }}
                    {{ Form::text('url_key',null,["class"=>'form-control',"placeholder"=>"Enter URL Key"]) }}
                </div>

                <div class="col-md-12 form-group">
                    {{ Form::label('short_desc', 'Enter Short Description') }}
                    {{ Form::textarea('short_desc',null,["class"=>'form-control wysihtml5',"placeholder"=>"Enter Short Description", "rows" => "9"]) }}
                </div>

                <div class="col-md-12 form-group">
                    {{ Form::label('long_desc', 'Enter Long Description') }}
                    {{ Form::textarea('long_desc',null,["class"=>'form-control wysihtml5',"placeholder"=>"Enter Short Description", "rows" => "9"]) }}
                </div>



                <div class="col-md-6 form-group">
                    {{ Form::label('meta_title', 'Meta Title') }}
                    {{ Form::text('meta_title',null,["class"=>'form-control',"placeholder"=>"Enter Meta Title"]) }}
                </div>
                <div class="col-md-6 form-group">
                    {{ Form::label('meta_keys', 'Meta Keywords') }}
                    {{ Form::text('meta_keys',null,["class"=>'form-control',"placeholder"=>"Enter Meta Keywords"]) }}
                </div>
                <div class="col-md-12 form-group">
                    {{ Form::label('meta_desc', 'Meta Description') }}
                    {{ Form::textarea('meta_desc',null,["class"=>'form-control',"placeholder"=>"Enter Meta Keywords"]) }}
                </div>


                <div class="col-md-12 form-group">
                    {{ Form::label('images', 'Select Multiple Images') }}
                    {{ Form::file('images[]',["class"=>'form-control',"multiple"]) }}                    
                </div>


                <?php
                if (!empty($category->images)) {
                    $imgs = json_decode($category->images, true);
                    foreach ($imgs as $pos => $img) {
                        ?>
                        <div class="col-md-2 form-group">
                            {{ HTML::image("public/theSoul/uploads/catalog/category/".$img ,'',['class' => "img-responsive"] ) }}
                            <a href="javascript:void();" class="deleteImg" data-value="{{ $img }}"><span class="label label-danger label-mini">Delete</span></a>
                        </div>
                        <?php
                    }
                }
                ?>
                {{ Form::hidden('imgs',$category->images) }}
                {{ Form::hidden('id') }}

                <div class="col-md-12 form-group">
                    {{ Form::label('parent_id', 'Select Parent Category') }}
                    <?php
                    $roots = Category::roots()->get();
                    echo "<ul id='catTree' class='tree icheck'>";
                    foreach ($roots as $root)
                        renderNode($root, $category);
                    echo "</ul>";

                    function renderNode($node, $category) {
                        echo "<li class='tree-item'>";
                        echo '<div class="square-green single-row">
                                <div class="radio">
                                    <label><input type="checkbox"  name="parent_id" value="' . $node->id . '" ' . ($category->parent_id == $node->id ? "checked" : "" ) . '  /> ' . $node->category . '</label>
                                </div>
                             </div>';

                        if ($node->children()->count() > 0) {
                            echo "<ul>";
                            foreach ($node->children as $child)
                                renderNode($child, $category);
                            echo "</ul>";
                        }

                        echo "</li>";
                    }
                    ?>
                </div>
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
    $(document).ready(function() {
        $('.wysihtml5').wysihtml5();

        $("a.deleteImg").click(function() {
            var imgs = $.parseJSON($("input[name='imgs']").val());
            var r = confirm("Are You Sure You want to Delete this Image?");
            if (r == true) {
                imgs.splice(imgs.indexOf($(this).attr("data-value")), 1);
                $("input[name='imgs']").val(JSON.stringify(imgs));
                $(this).parent().hide();
            } else {

            }
        });
    });
</script>
@stop