@extends('admin.layout.main')

@push('title')
    <title>Add Chef</title>
@endpush
@section('midsection')
<!--  page-wrapper -->
<div id="page-wrapper">
    <div class="row">
            <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Add Chef</h1>
        </div>
        <!--end page header -->
    </div>
    <div class="pull-right">
        <a href="{{url('/manage_chef')}}" class="btn btn-primary"><i class="fa fa-table"> Manage chef</i></a>
    </div>
    <br><br>
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form">
                                <div class="form-group">
                                    <label>Chef Name</label>
                                    <input name="chef_name" class="form-control" placeholder="Enter Chef Name">
                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
                                <div class="form-group">
                                    <label>Chef Image</label>
                                    <input type="file">
                                </div>
                                <button type="submit" class="btn btn-success">Add</button>
                                <button type="reset" class="btn btn-primary">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page-wrapper -->

</div>
<!-- end wrapper -->
@endsection