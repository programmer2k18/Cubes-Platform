
<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Cubes platform icon -->
    <link rel="icon" href="{{asset('cubes_plateform/cubes.png')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

@stack('head')

<!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('activeSpaces')}}" class="nav-link">Home</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link"   href="">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="javascript:void(0)" class="brand-link">
            <img src="{{asset('cubes_plateform/cubes.png')}}"
                 alt="cubes Logo"
                 class="brand-image img-circle"
                 style="width: 30px;height:30px">
            <p class="brand-text font-weight-light">Cubes Platform</p>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                <div class="image user-block">
                    <img src="{{asset('cubes_plateform/cubes.png')}}"
                         alt="cubes Logo"
                         class="brand-image img-circle"
                         style="width: 30px;height:30px">
                </div>

                <div class="info">
                    <a href="{{route('CubesProfile')}}" class="d-block">
                        Cubes
                    </a>
                </div>

            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2" style="padding-bottom: 17px">
                <ul class="nav nav-pills nav-sidebar flex-column classActive" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item has-treeview">
                        <a href="{{route('activeSpaces')}}" class="nav-link active">
                            <i class="nav-icon fas fa-user"></i>
                            <p  style="margin-left: 9px">
                                Co-Working Spaces
                            </p>
                        </a>
                    </li>

                    {{--<li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Analytics
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="/dashboard/charts/Booking_Analysis" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Booking Analysis</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/dashboard/charts/Profit_Analysis" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Profit Analysis</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/dashboard/charts/Users_Analysis" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Users Analysis</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Booking
                                <i class="fas fa-angle-right right"></i>
                                <span class="badge badge-info right">6</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{route('currentBookedRequests')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Booked Now</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('upComingRequests')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Upcoming Requests</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('BookingHistory')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Booking History</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('CanceledRequests')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Canceled Bookings</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Real Time View
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('getAllViews')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Current View</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('addViewForm')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add View</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-chair"  style="margin-left: 5px;"></i>
                            <p  style="margin-left: 5px;">
                                Coworking Assets
                                <i class="fas fa-angle-right right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/dashboard/assets/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Asset</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/assets/General_Assets" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>At Shared Space</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/assets/Private_offices" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Private Offices</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/assets/Meeting_rooms" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Meeting Rooms</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fab fa-quinscape"  style="margin-left: 5px;"></i>
                            <p  style="margin-left: 5px;">
                                Amenities
                                <i class="fas fa-angle-right right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{route('addAmenityForm')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Amenities</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/dashboard/Amenities/Equipments" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Equipments</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/Amenities/Facilities" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Facilities</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/Amenities/Community" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Community</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/Amenities/Cool_Stuff" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Cool Stuff</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-newspaper" style="margin-left: 5px;"></i>
                            <p  style="margin-left: 5px;">
                                Announcements
                                <i class="fas fa-angle-right right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('allAnnouncements')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Announcements</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('addAnnouncementForm')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Announcements</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-calendar-plus" style="margin-left: 5px"></i>
                            <p  style="margin-left: 9px">
                                Events
                                <i class="fas fa-angle-right right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/dashboard/events/available" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Available Events</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/events/expired" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Expired Events</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/events/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Event</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Followers
                                <i class="fas fa-angle-right right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/dashboard/followers" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Followers</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/followers/gold" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Golden Followers</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('getAllReviews')}}" class="nav-link">
                            <i class="nav-icon far fa-edit"></i>
                            <p>
                                Reviews
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>
                                Opening Times
                            </p>
                            <i class="fas fa-angle-right right"></i>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('allOpeningTimes')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All  Opening Times</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('addOpeningTimeForm')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add  Opening Time</p>
                                </a>
                            </li>
                        </ul>

                    </li>
--}}
{{--
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user-lock"  style="margin-left: 5px"></i>

                            <p  style="margin-left: 8px">
                                Blocked Users
                                <i class="fas fa-angle-right right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/dashboard/blocked_users" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Blocked Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/blockUser/1" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Block User</p>
                                </a>
                            </li>
                        </ul>

                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>
                                Support Issues
                                <i class="fas fa-angle-right right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('getInbox',request()->session()->get('admin')->id)}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Inbox</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('getComposeForm',request()->session()->get('admin')->id)}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Compose</p>
                                </a>
                            </li>
                        </ul>
                    </li>--}}

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0 text-dark">@yield('content-header')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('activeSpaces')}}">Home</a></li>
                            @yield('content-breadcrumb')
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

            @yield('content')
            <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- overlayScrollbars -->
<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>

@stack('scripts')

</body>
</html>




