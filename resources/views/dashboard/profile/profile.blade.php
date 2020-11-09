@extends('welcome')
@section('title','Profile')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('profile',request()->session()->get('admin')->id)}}">
            Profile</a></li>
@endsection

@section('content-header')
            Profile
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

                                @if($place->image)
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{asset('storage/'.$place->image)}}"
                                         alt="User profile picture">
                                @else
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{asset('admin/default_images/AdminLTELogo.png')}}"
                                         alt="User profile picture">
                                @endif

                            </div>

                            <h3 class="profile-username text-center">{{trim($place->name)}}</h3>

                            <p class="text-muted text-center">{{trim($place->email)}}</p>
                            <p class="text-muted text-center">Joined at: {{trim($place->created_at->format('d M Y'))}}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Followers</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Number of Bookings</b> <a class="float-right">
                                        {{$numberOfBookings>0?$numberOfBookings:0}}
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Branding Status</b> <a class="float-right">
                                        {{$numberOfBookings>=100?'Trending':'Normal'}}
                                    </a>
                                </li>
                            </ul>

                            <a href="{{route('dashboard')}}" class="btn btn-primary btn-block"><b>Show Analysis</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About {{trim(request()->session()->get('admin')->name)}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                            <p class="text-muted">
                                Governorate: {{trim($place->governorate)}}<br>
                                City: {{trim($place->city)}}<br>
                                Street: {{trim($place->street)}}
                            </p>

                            <hr>

                            <strong><i class="fas fa-link"></i> Profile Link</strong>

                            <p class="text-muted">
                                {{$url}}
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
                                <li class="nav-item" id="getProfit"><a class="nav-link" href="#profite" data-toggle="tab">Profit Tracking</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">

                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            @if($place->image)
                                                <img class="profile-user-img img-fluid img-circle"
                                                     src="{{asset('storage/'.$place->image)}}"
                                                     alt="User profile picture">
                                            @else
                                                <img class="profile-user-img img-fluid img-circle"
                                                     src="{{asset('admin/default_images/AdminLTELogo.png')}}"
                                                     alt="User profile picture">
                                            @endif
                                            <span class="username">
                                                 <a href="{{$url}}">{{trim($place->name)}}</a>
                                            </span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            {{htmlspecialchars(trim($place->description))}}
                                        </p>

                                    </div>
                                    <!-- /.post -->

                                </div>
                                <!-- /.tab-pane -->


                                <div class="tab-pane" id="profite">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">


                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal" action="{{route('updateProfile',$place->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text"  name="name" value="{{trim($place->name)}}"
                                                class="form-control" id="inputName">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email"  name="email" value="{{trim($place->email)}}"
                                                       class="form-control" id="inputEmail">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password" value="{{trim($place->password)}}"
                                                 class="form-control" id="inputName2">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="description">{{trim($place->description)}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Government</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="government" value="{{trim($place->governorate)}}"
                                                       class="form-control" id="inputSkills">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">City</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="city" value="{{trim($place->city)}}"
                                                       class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Street</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="street" value="{{trim($place->street)}}"
                                                       class="form-control">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <input type="hidden" name="checkImage" value="{{trim($place->image)}}"
                                                       class="form-control" id="inputSkills">
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

                                            @if($place->image)
                                                <img class="profile-user-img"
                                                     src="{{asset('storage/'.$place->image)}}"
                                                     >
                                            @else
                                                <img src="{{asset('admin/default_images/AdminLTELogo.png')}}" style="max-width: 60px;max-height: 60px" class="img-circle img-fluid">
                                            @endif

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
            $(document).on('click','.nav-pills .nav-item',function (e) {
                $(this).siblings().find('a').removeClass('active');
                var href =  $(this).find('a').attr('href');
                $(href).siblings().removeClass('active');
                $(href).addClass('active');
            });

            $(document).on('click','.nav-pills #getProfit',function (e) {
                if ($('#profite .timeline').children().length > 0){
                    return;
                }
                jQuery.ajax({
                    url:"/dashboard/profile/profit",
                    type:"get",
                    success:function(data){
                            $.map(data, function(item){
                                var sum = 0;
                                var month = item[0].from;
                                var numberOfBookings = item.length;
                                for (var i=0; i<item.length;i++){
                                    sum+=item[i].cost;
                                }
                                var child = '<div class="time-label">\n' +
                                    ' <span class="bg-danger">\n' +
                                    ' '+month+'\n' +
                                    '</span>\n' +
                                    '</div>\n' +
                                    '<!-- /.timeline-label -->\n' +
                                    '<!-- timeline item -->\n' +
                                    '<div>\n' +
                                    '<i class="fas fa-envelope bg-primary"></i>\n' +
                                    '\n' +
                                    '<div class="timeline-item">\n' +
                                    '<span class="time"><i class="far fa-clock"></i> </span>\n' +
                                    '\n' +
                                    ' <h3 class="timeline-header"><a href="#">Highlight</a> For '+month+' Profit</h3>\n' +
                                    '\n' +
                                    '<div class="timeline-body">\n' +
                                    '<p style="display: inline-block;margin-right: 20px">Profit: '+sum+' EGP</p>\n' +
                                    ' <p style="display: inline-block">Number Of bookings: '+numberOfBookings+'</p>\n' +
                                    ' </div>\n' +
                                    ' </div>\n' +
                                    ' </div>\n' +
                                    '';
                                $('#profite .timeline').append(child);
                            });
                    },
                    error:function (error){
                        console.log(error);
                    }
                });
            });

        });
    </script>
@endpush