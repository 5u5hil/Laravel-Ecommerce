@extends('theSoul.layouts.default')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Categories
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>

            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="btn-group">
                            <button id="editable-sample_new" class="btn btn-primary" onclick="window.location.href ='{{ URL::route('addNewCat')}}'">
                                Add New Category <i class="fa fa-plus"></i>
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
                        <div class="btn-group pull-right">
                            <input type="text" aria-controls="editable-sample" class="form-control medium" placeholder="Search Category" />
                        </div>
                    </div>
                    <div class="space15"></div>
                    <br />
                    <table class="table  table-hover general-table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Category</th>
                                <th>Parent</th>
                                <th>Status</th>
                                <th>Short Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $cat)

                            <tr>
                                <td>{{ $cat->id }}</td>
                                <td>{{ $cat->category }}</td>
                                <td>{{ $cat->parent_id }}</td>
                                <td>{{ $cat->is_active == 0 ? "No" : "Yes" }}</td>
                                <td>{{ $cat->short_desc }}</td>
                                <td>
                                    {{ Form::open(['method' => 'post', 'url' => URL::route("editCat") , 'class' => 'form-inline']) }}
                                    {{ Form::hidden('id',$cat->id) }}
                                    <a href="javascript:void();" class="edit"><span class="label label-success label-mini">Edit</span></a>
                                    {{ Form::close()}}
                                    {{ Form::open(['method' => 'post', 'url' => URL::route("deleteCat") , 'class' => 'form-inline']) }}
                                    {{ Form::hidden('id',$cat->id) }}
                                    <a href="javascript:void();" class="delete"><span class="label label-danger label-mini">Delete</span></a>
                                    {{ Form::close()}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">
                        <?= $categories->links() ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@stop

@section('myscripts')
<script>
    $(document).ready(function() {
        $(".delete").click(function() {
            var r = confirm("Are You Sure You want to Delete this Category & All its Products?");
            if (r == true) {
                $(this).parent().submit();
            } else {

            }
        });
    });
</script>

@stop