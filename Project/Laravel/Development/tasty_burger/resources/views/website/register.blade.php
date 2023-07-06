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
		<li class="breadcrumb-item active" aria-current="page">Register Page</li>
	</ol>
</div>
<!-- //page details -->

<!-- login -->
<div class="login-contect py-5">
	<div class="container py-xl-5 py-3">
		<div class="login-body">
			<div class="login p-4 mx-auto">
				<h5 class="text-center mb-4">Register Now</h5>
				@if (session('error_msg'))
				<span class="alert alert-danger">
					{{session('error_msg')}}
				</span>
				@endif
				<?php /*@if ($errors->any())
					<div class="alert alert-danger">
						@foreach ($errors->all() as $error)
							<ul>
								<li>{{$error}}</li>
							</ul>
						@endforeach
					</div>
				@endif*/ ?>
				<form action="{{url('/insert_register')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Name" required="required">
						@error('name')
							<div class="alert alert-danger">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="Username" required="required">
						@error('username')
							<div class="alert alert-danger">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email" required="required">
						@error('email')
							<div class="alert alert-danger">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<label class="mb-2">Password</label>
						<input type="password" class="form-control" name="password" id="password1" placeholder="Password" required="required">
						@error('password')
							<div class="alert alert-danger">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" class="form-control" name="confirm_password" id="password2" placeholder="Confirm Password" required="required">
						@error('confirm_password')
							<div class="alert alert-danger">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<label class="mb-2">Gender</label>
						<div class="form-control">
							<input type="radio" name="gender" id="gender" value="male" @if (old('gender') == 'male') checked @endif>Male
							<input type="radio" name="gender" id="gender2" value="female" @if (old('gender') == 'female') checked @endif>Female
						</div>
						@error('gender')
							<div class="alert alert-danger">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<label class="mb-2">Language</label>
						<div class="form-control">
							<input type="checkbox" name="language[]" value="Hindi" id="hindi" @if (in_array('Hindi', old('language', []))) checked @endif>
							<label for="hindi">Hindi</label>
							<input type="checkbox" name="language[]" value="English" id="english" @if (in_array('English', old('language', []))) checked @endif>
							<label for="english">English</label>
							<input type="checkbox" name="language[]" value="Gujarati" id="gujarati" @if (in_array('Gujarati', old('language', []))) checked @endif>
							<label for="gujarati">Gujarati</label>
						</div>
						@error('language')
							<div class="alert alert-danger">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<label class="mb-2">File</label>
						<div class="form-control">
							<input type="file" name="file" id="file">
						</div>
						@error('file')
							<div class="alert alert-danger">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<label class="mb-2">Country</label>
						<select name="country" class="form-control">
							<option value="">Select Country</option>
							@if(!empty($countries))
							@foreach($countries as $country)
							<option value="{{$country->id}}" @if (old('country') == $country->id) selected @endif>{{$country->name}}</option>
							@endforeach
							@endif
						</select>
						@error('country')
							<div class="alert alert-danger">{{$message}}</div>
						@enderror
					</div>
					<button type="submit" class="btn submit mb-4">Register</button>
					<p class="text-center">
						<a href="#" class="text-da">By clicking Register, I agree to your terms</a>
					</p>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- //login -->
@endsection