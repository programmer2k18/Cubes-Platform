@extends('cubesDashboard.cubesDashboardMainLayout')
@section('title','Cubes')

@section('content-header','Cubes Profile')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('CubesProfile')}}">Profile</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            @include('dashboard.messages')
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">

                                {{--@if($place->image)
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{asset('storage/'.$place->image)}}"
                                         alt="User profile picture">
                                @else
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{asset('admin/pic.jpg')}}"
                                         alt="User profile picture">
                                @endif--}}
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{asset('cubes_plateform/cubes.png')}}"
                                     alt="User profile picture">

                            </div>

                            <h3 class="profile-username text-center">Cubes Platform</h3>

                            <p class="text-muted text-center">cubes124@gmail.com</p>
                            <p class="text-muted text-center">Launched at: 12 May 2020</p>
                            <ul class="list-group list-group-unbordered mb-3">

                                <li class="list-group-item">
                                    <b>#of Co-working Spaces</b> <a class="float-right">
                                        254
                                    </a>
                                </li>
                            </ul>

                            <a href="#" class="btn btn-primary btn-block"><b>Add new Admin</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-link"></i> Domain</strong>

                            <p class="text-muted">
                                https:\\www.CubesPlatform.org.
                            </p>
                            <hr>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Overview</a></li>
{{--
                                <li class="nav-item" id="getProfit"><a class="nav-link" href="#profite" data-toggle="tab">Profit Tracking</a></li>
--}}
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">

                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            {{--@if($place->image)
                                                <img class="profile-user-img img-fluid img-circle"
                                                     src="{{asset('storage/'.$place->image)}}"
                                                     alt="User profile picture">
                                            @else
                                                <img class="profile-user-img img-fluid img-circle"
                                                     src="{{asset('admin/default_images/pic.jpg')}}"
                                                     alt="User profile picture">
                                            @endif--}}
                                            <img class="profile-user-img img-fluid img-circle"
                                                 src="{{asset('cubes_plateform/cubes.png')}}"
                                                 alt="User profile picture">

                                            <span class="username">
                                                 <a href="{{--{{$url}}--}}">Cubes Platform</a>
                                            </span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Cubes platform description.......................
                                        </p>

                                    </div>
                                    <!-- /.post -->

                                </div>
                                <!-- /.tab-pane -->


                                {{--<div class="tab-pane" id="profite">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">


                                    </div>
                                </div>--}}
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text"  name="name"
                                                       class="form-control" id="inputName">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email"  name="email"
                                                       class="form-control" id="inputEmail">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password"
                                                       class="form-control" id="inputName2">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="description"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Government</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="government"
                                                       class="form-control" id="inputSkills">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">City</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="city"
                                                       class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Street</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="street"
                                                       class="form-control">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <input type="hidden" name="checkImage"
                                                       class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Main Image</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="image"
                                                       class="form-control">
                                            </div>
                                        </div>

                                        <div class="text-center">

                                            {{--@if($place->image)
                                                <img class="profile-user-img"
                                                     src="{{asset('storage/'.$place->image)}}"
                                                     alt="User profile picture">
                                            @else
                                                <img class="profile-user-img"
                                                     src="{{asset('admin/pic.jpg')}}"
                                                     alt="User profile picture">
                                            @endif--}}

                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@push('scripts')
    <script>

        $(document).ready(function () {
            'use strict';
            $(document).on('click', '.nav-pills .nav-item', function (e) {
                $(this).siblings().find('a').removeClass('active');
                var href = $(this).find('a').attr('href');
                $(href).siblings().removeClass('active');
                $(href).addClass('active');
            });
        });

    </script>
@endpush
