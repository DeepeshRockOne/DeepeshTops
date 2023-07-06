@extends('website.layout.main')

@section('midsection')
<!-- banner -->
<div class="main-banner-2">

</div>
<!-- //banner -->
<!-- page details -->
<div class="breadcrumb-agile bg-light py-2">
    <ol class="breadcrumb bg-light m-0">
        <li class="breadcrumb-item">
            <a href="{{url('/index')}}">Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Edit Profile Page</li>
    </ol>
</div>
<!-- //page details -->

<!-- login -->
<div class="login-contect py-5">
    <div class="container py-xl-5 py-3">
        <div class="login-body">
            <div class="login p-4 mx-auto">
                <h5 class="text-center mb-4">Edit Profile</h5>
                @if (session('error_msg'))
                <span class="alert alert-danger">
                    {{session('error_msg')}}
                </span>
                @endif
                <form action="{{url('/update_user_profile/'.$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{$data->name}}" required="required">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" value="{{$data->username}}" required="required">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{$data->email}}" required="required">
                    </div>
                    <div class="form-group">
                        <label class="mb-2">Gender</label>
                        <div class="form-control">
                            <input type="radio" name="gender" id="gender" value="male" @if($data->gender == "male")
                            {{ "checked=checked"}}
                            @endif
                            >Male
                            <input type="radio" name="gender" id="gender2" value="female" @if($data->gender == "female")
                            {{ "checked=checked"}}
                            @endif
                            >Female
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">Language</label>
                        <div class="form-control">
                            @php
                            $language = $data->language;
                            $language_array = explode(',',$language);
                            @endphp
                            <input type="checkbox" name="language[]" value="Hindi" id="hindi"
                            <?php
                                if(in_array("Hindi", $language_array)) {
                                    echo " checked";
                                }
                            ?>
                            >
                            <label for="hindi">Hindi</label>
                            <input type="checkbox" name="language[]" value="English" id="english"
                            <?php
                                if(in_array("English", $language_array)) {
                                    echo " checked";
                                }
                            ?>
                            >
                            <label for="english">English</label>
                            <input type="checkbox" name="language[]" value="Gujarati" id="gujarati"
                            <?php
                                if(in_array("Gujarati", $language_array)) {
                                    echo " checked";
                                }
                            ?>
                            >
                            <label for="gujarati">Gujarati</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">File</label>
                        <div class="form-control">
                            <input type="file" name="file" id="file">
                        </div>
                        <img src="{{url('website/upload/webuser/'.$data->file)}}" width="80px" alt="">
                    </div>
                    <div class="form-group">
                        <label class="mb-2">Country</label>
                        <select name="country" class="form-control">
                            <option value="#">Select Country</option>
                            @if(!empty($countries))
                            @foreach($countries as $country)
                            <option value="{{$country->id}}" @if ($data->cid == $country->id) {{" selected"}} @endif>{{$country->name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn submit mb-4">Update</button>
                    <p class="text-center">
                        <a href="{{url('/user_profile')}}" class="text-da">Back</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //login -->
@endsection