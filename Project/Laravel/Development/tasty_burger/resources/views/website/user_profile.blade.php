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
		<li class="breadcrumb-item active" aria-current="page">Your profile</li>
	</ol>
</div>
<!-- //page details -->

<!-- team -->
<div class="team py-5" id="chefs">
	<div class="container-fluid py-xl-5 py-lg-3">
		<div class="title-section text-center mb-md-5 mb-4">
			@if (session('user_profile_update_success'))
				<span class="alert alert-success">
					{{session('user_profile_update_success')}}
				</span>
			@endif
			<h3 class="w3ls-title mb-3">{{$data->name}} Your <span>Profile</span></h3>
			<div class="row team-bottom pt-4">
				<div class="col-lg-12">
					<img src="{{url('website/upload/webuser/'.$data->file)}}" class="img-fluid" width="150px" alt="">
					<div class="caption">
						<div class="team-text">
							<h4><a href="#">{{$data->name}}</a></h4>
							<p>{{$data->email}}</p>
						</div>
						<ul>
							<li class="team-text">
								<a href="{{url('/user_profile/'.$data->id)}}">
									<i class="fa fa-edit" style="color:blue;"> Edit</i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //team -->
@endsection