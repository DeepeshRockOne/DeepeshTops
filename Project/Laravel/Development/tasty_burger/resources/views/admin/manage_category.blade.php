@extends('admin.layout.main')

@push('title')
    <title>Manage Category</title>
@endpush
@section('midsection')
<!--  page-wrapper -->
<div id="page-wrapper">
    <div class="row">
        <!--  page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Manage Category</h1>
        </div>
        <!-- end  page header -->
    </div>
    <div class="pull-right">
        <a href="{{url('/add_category')}}" class="btn btn-primary"><i class="fa fa-plus-circle"> Add new category</i></a>
    </div>
    <br><br>
    <div class="row">
        <div class="col-lg-12">
            <!--Simple table example -->
            <div class="panel panel-primary">
                @if (session('category_added_success'))
                <span class="alert alert-success">
                    {{session('category_added_success')}}
                </span>
                @endif
                @if (session('category_deleted_success'))
                <span class="alert alert-success">
                    {{session('category_deleted_success')}}
                </span>
                @endif
                @if (session('category_update_success'))
                <span class="alert alert-success">
                    {{session('category_update_success')}}
                </span>
                @endif
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i>Categories
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($data))
                                        @foreach ($data as $d)
                                        <tr>
                                            <td>{{$d->id}}</td>
                                            <td>
                                                <img src="{{url('/admin/upload/categories/'.$d->image)}}" width="100px">
                                            </td>
                                            <td class="center">{{$d->name}}</td>
                                            <td>
                                                <a href="{{url('/edit_category/'.$d->id)}}" class="btn btn-primary"><i class="fa fa-edit"> Edit</i></a>
                                                <a href="{{url('/manage_category/'.$d->id)}}" class="btn btn-danger"><i class="fa fa-trash-o"> Delete</i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="4">There is no records available.</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!--End simple table example -->
        </div>
    </div>
</div>
<!-- end page-wrapper -->

</div>
<!-- end wrapper -->
@endsection