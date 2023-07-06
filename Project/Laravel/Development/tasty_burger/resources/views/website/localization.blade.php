<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Tasty Burger Restaurants Category Bootstrap Responsive Web Template | Home :: W3layouts</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Tasty Burger Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        /*addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}*/
    </script>
    <!--// Meta tag Keywords -->

    <!-- Custom-Files -->
    <link rel="stylesheet" href="{{url('website/css/bootstrap.css')}}">
    <!-- Bootstrap-Core-CSS -->
    <link href="{{url('website/css/css_slider.css')}}" type="text/css" rel="stylesheet" media="all">
    <!-- css slider -->
    <link rel="stylesheet" href="{{url('website/css/style.css')}}" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link href="{{url('website/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //Custom-Files -->

    <!-- Web-Fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Barlow+Semi+Condensed:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- //Web-Fonts -->
</head>

<body>
    <?php
    function active($currect_page)
    {
        $url_array =  explode('/', $_SERVER['REQUEST_URI']);
        $url = end($url_array);
        if ($currect_page == $url) {
            echo 'active'; //class name in css 
        }
    }
    ?>
    <!-- header -->
    <header id="home">
        <!-- top-bar -->
        <div class="top-bar py-2 border-bottom">
            <div class="container">
                <div class="row middle-flex">
                    <div class="col-xl-7 col-md-5 top-social-agile mb-md-0 mb-1 text-lg-left text-center">
                        <div class="row">
                            <div class="col-xl-3 col-6 header-top_w3layouts">
                                <p class="text-da">
                                    <span class="fa fa-map-marker mr-2"></span>Parma Via, Italy
                                </p>
                            </div>
                            <div class="col-xl-3 col-6 header-top_w3layouts">
                                <p class="text-da">
                                    <span class="fa fa-phone mr-2"></span>+1 000263676
                                </p>
                            </div>
                            <div class="col-xl-6 text-right">
                                @if(session()->get('userid'))
                                <span>Welcome... {{session()->get('uname')}}</span>&nbsp;&nbsp;
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-7 top-social-agile text-md-right text-center pr-sm-0 mt-md-0 mt-2">
                        <div class="row middle-flex">
                            <div class="col-lg-5 col-4 top-w3layouts p-md-0 text-right">
                                @if(session()->get('userid'))
                                <!-- logout -->
                                <a href="{{url('/user_logout')}}" class="btn login-button-2 text-uppercase text-wh">
                                    <span class="fa fa-sign-in mr-2"></span>Logout</a>
                                <!-- //logout -->
                                @else
                                <!-- login -->
                                <a href="{{url('/login')}}" class="btn login-button-2 text-uppercase text-wh">
                                    <span class="fa fa-sign-in mr-2"></span>Login</a>
                                <!-- //login -->
                                @endif
                            </div>
                            <div class="col-lg-7 col-8 social-grid-w3">
                                <!-- social icons -->
                                <ul class="top-right-info">
                                    <li>
                                        <p>Follow Us:</p>
                                    </li>
                                    <li class="facebook-w3">
                                        <a href="#facebook">
                                            <span class="fa fa-facebook-f"></span>
                                        </a>
                                    </li>
                                    <li class="twitter-w3">
                                        <a href="#twitter">
                                            <span class="fa fa-twitter"></span>
                                        </a>
                                    </li>
                                    <li class="google-w3">
                                        <a href="#google">
                                            <span class="fa fa-google-plus"></span>
                                        </a>
                                    </li>
                                    <li class="dribble-w3">
                                        <a href="#dribble">
                                            <span class="fa fa-dribbble"></span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- //social icons -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- //top-bar -->

    <!-- header 2 -->
    <!-- navigation -->
    <div class="main-top py-1">
        <div class="container">
            <div class="nav-content">
                <!-- logo -->
                <h1>
                    <a id="logo" class="logo" href="{{url('/index')}}">
                        <img src="{{url('website/images/logo.png')}}" alt="" class="img-fluid"><span>Tasty</span> Burger
                    </a>
                </h1>
                <!-- //logo -->
                <!-- nav -->
                <div class="nav_web-dealingsls">
                <nav>
						<label for="drop" class="toggle">Menu</label>
						<input type="checkbox" id="drop" />
						<ul class="menu">
							<li><a href="{{url('/localization/en')}}">English</a></li>
							<li><a href="{{url('/localization/hi')}}">Hindi</a></li>
                            <li><a class="drop-text" href="{{url('/localization/guj')}}">Gujarati</a></li>
							<li><a href="{{url('/localization/rus')}}">Russian</a></li>
						</ul>
					</nav>
                </div>
                <!-- //nav -->
            </div>
        </div>
    </div>
    <!-- //navigation -->
    <!-- //header 2 -->
    <!-- page details -->
    <div class="breadcrumb-agile bg-light py-2">
        <ol class="breadcrumb bg-light m-0">
            <li class="breadcrumb-item">
                <a href="{{url('/index')}}">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">@lang('lang.loginPage')</li>
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
                            <input type="text" class="form-control" name="username" placeholder="User Name">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
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