@extends('cubesDashboard.cubesDashboardMainLayout')
@section('title','Co-Working Spaces')

@section('content-header','Running and Activated Co-working Spaces')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            @include('dashboard.messages')
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">

            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="card-title">Activated and Pending Co-Working Spaces</p>
                        </div>

                        <div class="col-md-4">
                            <a href="{{route('pendingSpaces')}}"
                               class="btn btn-danger" style="float: right;">Pending</a>

                            <a href="{{route('activeSpaces')}}"
                               class="btn btn-success" style="float: right; margin-right: 4px;">Activated</a>
                        </div>

                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div  style="float: right">
                                {{$co_spaces->links()}}
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        @if (count($co_spaces) > 0)
                            @foreach ($co_spaces as $space)
                                <div class="col-sm-12">

                                    <div class="holder" style="margin-bottom: 5px">
                                        <div class="position-relative p-3" style="color: whitesmoke; background-color: #1e2b37" >
                                            <div class="ribbon-wrapper ribbon-lg">
                                                <div>
                                                    @if ($space->status ==='pending')
                                                        <div class="ribbon bg-danger">
                                                            Pending </div>
                                                    @else
                                                        <div class="ribbon bg-success">Activated</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-md-5">
                                                    <p style="margin: 0px;font-size: 22px;">{{ucfirst($space->name)}}</p>

                                                    <i class="fas fa-lg fa-envelope"></i> Email: {{$space->email}}<br />
                                                    <i class="fas fa-lg fa-building"></i> Address: {{$space->street}}, {{$space->city}}, {{$space->governorate}}<br />
                                                    @if($space->status ==='activated')

                                                        <i class="fas fa-lg fa-star"></i> Branding Status: {{$space->brandingStatus}}<br />
                                                        <i class="fas fa-lg fa-calendar-day"></i> Joined At: {{$space->updated_at->format('d M Y H:i')}}<br />

                                                    @else
                                                        <i class="fas fa-lg fa-calendar-day"></i> Requested At: {{$space->created_at->format('d M Y H:i')}}<br />
                                                        <a href="{{route('activateCoWorkingSpace',$space->id)}}" class="small-box-footer" style="color: white; display:block;
                                                                            margin: 11px 0px">
                                                            Activate <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endif
                                                </div>

                                                <div class="col-md-5">
                                                    {{$space->description}}
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                           @endforeach

                        @else
                            <div class="col-sm-12">
                                <h3 style="text-align: center">No Co-working Spaces available yet. </h3>
                            </div>
                        @endif

                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div  style="float: right">
                                {{$co_spaces->links()}}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection