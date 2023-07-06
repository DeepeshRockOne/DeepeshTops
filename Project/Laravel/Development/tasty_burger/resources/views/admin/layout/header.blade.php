<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('title')
    <!-- Core CSS - Include with every page -->
    <link href="{{url('admin/assets/plugins/bootstrap/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{url('admin/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{url('admin/assets/plugins/pace/pace-theme-big-counter.css')}}" rel="stylesheet" />
    <link href="{{url('admin/assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{url('admin/assets/css/main-style.css')}}" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="{{url('admin/assets/plugins/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
   </head>
<body>
    <?php
        function active($currect_page){
            $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
            $url = end($url_array);  
            if($currect_page == $url){
                echo 'selected'; //class name in css 
            } 
        }
    ?>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/admin_dashboard')}}">
                    <h1>AdminPanel</h1>
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                @if(session()->get('admin_id'))
                <li class="dropdown">
                    <h4>Welcome, {{session()->get('admin_name')}}</h4>
                </li>
                @endif

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        @if(session()->get('admin_id'))
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>
                        @endif
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>Settings</a>
                        </li>
                        @if(session()->get('admin_id'))
                        <li class="divider"></li>
                        <li><a href="{{url('/admin_logout')}}"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                        @endif
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="{{url('admin/assets/img/user.jpg')}}" alt="">
                            </div>
                            <div class="user-info">
                                @if(session()->get('admin_id'))
                                    <div>{{session()->get('admin_name')}}</div>
                                @else
                                    <div>Jonny <strong>Deen</strong></div>
                                @endif
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!--end search section-->
                    </li>
                    <li class="<?php active('admin_dashboard'); ?>">
                        <a href="{{url('/admin_dashboard')}}"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit fa-fw"></i> Category<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="<?php active('add_category'); ?>">
                                <a href="{{url('/add_category')}}"><i class="fa fa-files-o fa-fw"></i> Add Category</a>
                            </li>
                            <li class="<?php active('manage_category'); ?>">
                                <a href="{{url('/manage_category')}}"><i class="fa fa-table fa-fw"></i> Manage Category</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit fa-fw"></i> Product<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="<?php active('add_product'); ?>">
                                <a href="{{url('/add_product')}}"><i class="fa fa-files-o fa-fw"></i> Add Product</a>
                            </li>
                            <li class="<?php active('manage_product'); ?>">
                                <a href="{{url('/manage_product')}}"><i class="fa fa-table fa-fw"></i> Manage Product</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit fa-fw"></i> Chef<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="<?php active('add_chef'); ?>">
                                <a href="{{url('/add_chef')}}"><i class="fa fa-files-o fa-fw"></i> Add Chef</a>
                            </li>
                            <li class="<?php active('manage_chef'); ?>">
                                <a href="{{url('/manage_chef')}}"><i class="fa fa-table fa-fw"></i> Manage Chef</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php active('manage_webuser'); ?>">
                        <a href="{{url('/manage_webuser')}}"><i class="fa fa-table fa-fw"></i>Manage Webuser</a>
                    </li>
                    <li class="<?php active('display_contact'); ?>">
                        <a href="{{url('/display_contact')}}"><i class="fa fa-table fa-fw"></i>Display Contact</a>
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->