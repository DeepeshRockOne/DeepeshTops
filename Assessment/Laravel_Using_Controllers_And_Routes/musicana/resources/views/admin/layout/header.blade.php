<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{url('admin/img/logo/logo.png')}}" rel="icon">
    @stack('title')
    <link href="{{url('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Select2 -->
    <link href="{{url('admin/vendor/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Bootstrap DatePicker -->  
    <link href="{{url('admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" >
    <!-- Bootstrap Touchspin -->
    <link href="{{url('admin/vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css')}}" rel="stylesheet" >
    <!-- RuangAdmin CSS -->
    <link href="{{url('admin/css/ruang-admin.min.css')}}" rel="stylesheet">
    <link href="{{url('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/admin_dashboard')}}">
                <div class="sidebar-brand-icon">
                    <img src="{{url('admin/img/logo/logo2.png')}}">
                </div>
                <div class="sidebar-brand-text mx-3">Admin Dashboard</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/admin_dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Songs
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSongCategory" aria-expanded="true" aria-controls="collapseSongCategory">
                    <i class="far fa-fw fa-window-maximize"></i>
                    <span>Songs Category</span>
                </a>
                <div id="collapseSongCategory" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Songs Category</h6>
                        <a class="collapse-item" href="{{url('/add_songCategory')}}">Add Song Category</a>
                        <a class="collapse-item" href="{{url('/manage_songCategory')}}">Manage Song Category</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSongs" aria-expanded="true" aria-controls="collapseSongs">
                    <i class="far fa-fw fa-window-maximize"></i>
                    <span>Songs</span>
                </a>
                <div id="collapseSongs" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Songs</h6>
                        <a class="collapse-item" href="{{url('/add_song')}}">Add Song</a>
                        <a class="collapse-item" href="{{url('/manage_song')}}">Manage Song</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Users
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/user_details')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>User Details</span>
                </a>
            </li>

            <hr class="sidebar-divider">

        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <span class="nav-link dropdown-toggle" href="#" id="welcome_msg" aria-haspopup="true" aria-expanded="false">
                                @if (session()->has('admin_uname'))
                                    <h4>Welcome, {{session()->get('admin_uname')}}</h4>
                                @endif
                            </span>
                        </li>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?" aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="{{url('admin/img/boy.png')}}" style="max-width: 60px">
                                <span class="ml-2 d-none d-lg-inline text-white small">
                                    @if (session()->has('admin_uname'))
                                        {{session()->get('admin_uname')}}
                                    @else
                                        Admininstrator
                                    @endif
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{url('/admin_profile')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{url('/admin_logout')}}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->