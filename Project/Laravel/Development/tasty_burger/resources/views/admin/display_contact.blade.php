@extends('admin.layout.main')

@push('title')
    <title>Display Contacts</title>
@endpush
@section('midsection')
<!--  page-wrapper -->
<div id="page-wrapper">
    <div class="row">
        <!--  page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Display Contact</h1>
        </div>
        <!-- end  page header -->
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form action="">
                <div class="input-group">
                    <input type="text" name="search" value="@if(isset($search)){{$search}}@endif" class="form-control" placeholder="Search by name or email">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                        <a href="{{url('/display_contact')}}" class="btn btn-warning" style="margin-left: 10px;">Reset</a>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-lg-6"></div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <!--Simple table example -->
            <div class="panel panel-primary">
                @if (session('contact_delete'))
                <span class="alert alert-success text-center">
                    {{Session('contact_delete')}}
                </span>
                @endif
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i>Contacts
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Message</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($data))
                                        @foreach ($data as $d)
                                        <tr>
                                            <td>{{$d->id}}</td>
                                            <td>{{$d->name}}</td>
                                            <td>{{$d->email}}</td>
                                            <td>{{$d->phone}}</td>
                                            <td>{{$d->message}}</td>
                                            <td>
                                                <a href="{{url('/display_contact/'.$d->id)}}" class="btn btn-danger"><i class="fa fa-trash-o"> Delete</i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="6">There is no records available.</td>
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