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
		<li class="breadcrumb-item active" aria-current="page">Login Page</li>
	</ol>
</div>
<!-- //page details -->

<!-- login -->
<div class="login-contect py-5">
	<div class="container py-xl-5 py-3">
		<div class="login-body">
			<div class="login p-4 mx-auto">
				@if (session('error_msg'))
				<span class="alert alert-danger text-center">
					{{session('error_msg')}}
				</span>
				@endif
				@if (session('login_fail'))
				<span class="alert alert-danger text-center">
					{{session('login_fail')}}
				</span>
				@endif
				@if (session('register_success'))
				<span class="alert alert-success text-center">
					{{session('register_success')}}
				</span>
				@endif
				<h5 class="text-center mb-4">Login Now</h5>

				<form action="{{url('/user_login_auth')}}" method="post">
					@csrf
					<div class="form-group">
						<label>User Name</label>
						<input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="User Name">
						@error('username')
							<div class="alert alert-danger">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<label class="mb-2">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password" required="required">
						@error('password')
							<div class="alert alert-danger">{{$message}}</div>
						@enderror
					</div>
					<button type="submit" class="btn submit mb-4">Login</button>
					<p class="forgot-w3ls text-center mb-3">
						<a href="#" class="text-da">Forgot your password?</a>
					</p>
					<p class="account-w3ls text-center text-da">
						Don't have an account?
						<a href="{{url('/register')}}">Create one now</a>
					</p>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- //login -->
@endsection