@extends('admin.layout.main')

@push('title')
    <title>Manage Users</title>
@endpush
@section('midsection')
<!--  page-wrapper -->
<div id="page-wrapper">
    <div class="row">
        <!--  page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Manage Webuser</h1>
        </div>
        <!-- end  page header -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!--Simple table example -->
            <div class="panel panel-primary">
                @if (session('user_delete'))
                    <span class="alert alert-success">
                        {{session('user_delete')}}
                    </span>
                @endif
                @if (session('user_status_block'))
                    <span class="alert alert-danger">
                        {{session('user_status_block')}}
                    </span>
                @endif
                @if (session('user_status_unblock'))
                    <span class="alert alert-success">
                        {{session('user_status_unblock')}}
                    </span>
                @endif
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i>Webusers
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Status</th>
                                            <th>Language</th>
                                            <th>Country</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($data))
                                        @foreach ($data as $d)
                                            <tr>
                                                <td class="center"><img src="{{url('/website/upload/webuser/'.$d->file)}}" width="50px" /></td>
                                                <td>{{$d->username}}</td>
                                                <td>{{$d->email}}</td>
                                                <td>{{$d->gender}}</td>
                                                <td>{{$d->status}}</td>
                                                <td>{{$d->language}}</td>
                                                <!-- <td>{{$d->cid}}</td> -->
                                                <td>{{$d->country_name}}</td>
                                                <td>
                                                    <!-- <a href="{{url('/edit_contact/'.$d->id)}}" class="btn btn-primary"><i class="fa fa-edit"> Edit</i></a> -->
                                                    <a href="{{url('/manage_webuser/'.$d->id)}}" class="btn btn-danger"><i class="fa fa-trash-o"> Delete</i></a>
                                                    <a href="{{url('/update_status_webuser/'.$d->id)}}" class="btn btn-warning"><i class="fa fa-toggle-right">  {{$d->status}}</i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5">There is no records available.</td>
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