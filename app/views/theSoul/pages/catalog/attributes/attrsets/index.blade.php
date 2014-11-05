@extends('theSoul.layouts.default')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Attribute Sets
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                </span>
            </header>

            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="btn-group">
                            <button id="editable-sample_new" class="btn btn-primary" onclick="window.location.href ='{{ URL::route('addNewAttrSet')}}'">
                                Add New Attribute Set <i class="fa fa-plus"></i>
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
                                <th>Attribute Set</th>
                                <th>Attributes</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attr_sets as $attr_set)

                            <tr>
                                <td>{{ $attr_set->id }}</td>
                                <td>{{ $attr_set->attr_set }}</td>
                                <td>
                                    <ul>
                                        @foreach($attr_set->attributes as $attr)
                                        <li>
                                            {{ Form::open(['method' => 'post', 'url' => URL::route("editAttr") , 'class' => 'form-inline']) }}
                                            {{ Form::hidden('id',$attr->id) }}
                                            <a href="javascript:void();" class="edit"> {{ $attr->attr  }}</a>
                                        </li>  
                                        {{ Form::close() }}
                                        @endforeach  
                                    </ul>
                                </td>
                                <td>
                                    {{ Form::open(['method' => 'post', 'url' => URL::route("editAttrSet") , 'class' => 'form-inline']) }}
                                    {{ Form::hidden('id',$attr_set->id) }}
                                    <a href="javascript:void();" class="edit"><span class="label label-success label-mini">Edit</span></a>
                                    {{ Form::close()}}
                                    {{ Form::open(['method' => 'post', 'url' => URL::route("deleteAttrSet") , 'class' => 'form-inline']) }}
                                    {{ Form::hidden('id',$attr_set->id) }}
                                    <a href="javascript:void();" class="delete"><span class="label label-danger label-mini">Delete</span></a>
                                    {{ Form::close()}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">
                        <?= $attr_sets->links() ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@stop

@section('myscripts')
<script>
    $(document).ready(function () {
        $(".delete").click(function () {
            var r = confirm("Are You Sure You want to Delete this Attribute Set?");
            if (r == true) {
                $(this).parent().submit();
            } else {

            }
        });
    });
</script>

@stop