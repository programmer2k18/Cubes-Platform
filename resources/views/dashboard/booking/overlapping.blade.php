@extends('welcome')
@section('title','Overlapped Requests')

@section('content-header','Sorry,There is an overlapping between the entered request time and others ')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('currentBookedRequests')}}">Booked Now</a></li>
    <li class="breadcrumb-item"><a href="{{route('upComingRequests')}}">Upcoming</a></li>
@endsection

@section('content')

    <div class="row">

        <div class="col-sm-12">
            @include('dashboard.messages')
        </div>

        <div class="col-sm-12">

            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;
                </button>
                <h4>Your booking request time is overlapping with below requests, select a new time</h4>
                <h5>From: {{$enteredRequest->from}}</h5>
                <h5>To: {{$enteredRequest->to}}</h5>
            </div>
        </div>

        <div class="col-sm-12 alert alert-danger deleteArea" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;
            </button>
            <h4>Booking Request Deleted</h4>
        </div>

    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Your request is overlapped with below requests</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body p-0">

            @if(count($requests) > 0)


                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th>
                            User
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            From
                        </th>

                        <th>
                            To
                        </th>

                        <th>
                            Cost
                        </th>
                        <th>
                            Capacity
                        </th>
                        <th>
                            Booking Time
                        </th>
                        <th class="text-center">
                            Status
                        </th>

                        <th style="">

                        </th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($requests as $request)

                        <?php
                        $user = $request->bookingOwner;
                        $asset = $request->assetType;
                        ?>

                        <tr class="{{$request->id}}">
                            <td>
                                @if($user)
                                    {{ucfirst($user->name)}}
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            @if($user->image)
                                                <img alt="{{$user->name}}" class="table-avatar"
                                                     src="{{asset('storage/'.$user->image)}}">
                                            @else
                                                <img alt="{{$user->name}}" class="table-avatar"
                                                     src="{{asset('admin/default_images/AdminLTELogo.png')}}">
                                            @endif

                                        </li>
                                    </ul>
                                @else
                                    ---
                                @endif
                            </td>

                            <td class="project_progress">
                                @if($request->user_phone)
                                    {{$request->user_phone}}
                                @else
                                    Not Exist
                                @endif
                            </td>

                            <td class="project_progress">
                                {{$request->from}}
                            </td>
                            <td class="project_progress">
                                {{$request->to}}
                            </td>

                            <td class="project_progress">
                                {{$request->cost}}
                            </td>

                            <td class="project_progress">
                                {{$request->capacity}}
                            </td>

                            <td class="project_progress">
                                {{$request->created_at}}
                            </td>

                            <td class="project-state">
                                <span class="badge badge-{{$request->status=='verified'?'success':'danger'}}">{{$request->status}}</span>
                            </td>

                            <td class="project-actions text-right">
                                @if($request->status !== 'expired')
                                    @if($request->status === 'verified')
                                        <a href="{{route('close',$request->id)}}" class="btn btn-info btn-sm" style="display: block;margin-bottom: 2px;">
                                            <i class="fas fa-minus-square">
                                            </i>
                                            Close
                                        </a>
                                    @endif
                                @endif

                                @if($request->user_id)
                                    <a  href="{{route('sendEmail',$request->user_id)}}" class="btn btn-danger btn-sm" style="display: block;margin-bottom: 2px;">
                                        <i class="fas fa-mail-bulk">
                                        </i>
                                        Send Email
                                    </a>
                                @endif
                            </td>

                        </tr>

                        <tr class="{{$request->id}}">
                            <td colspan="9">

                                <div class="card  collapsed-card" style="background-color: #1e2b37;color: white">
                                    <div class="card-header">
                                        <h3 class="card-title">{{$asset->type}}</h3>
                                        <div class="card-tools"  style="float: right">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div   style="float: right">
                                            <h3 class="card-title">{{$asset->created_at}}</h3>
                                        </div>
                                        <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5><i class="fas fa-money-bill"></i> Price: {{$asset->price}} {{$asset->currency}}</h5>
                                                <h6 class="mailbox-subject">Price Period: {{$asset->pricePeriodType}}</h6>
                                                <h6 class="mailbox-subject">Capacity: {{$asset->capacity}} Members</h6>
                                                <p>
                                                    {{htmlspecialchars(trim($asset->description))}}
                                                </p>
                                            </div>

                                            <div class="col-md-6">
                                                @if($asset->image)
                                                    <div class="widget-user-header bg-secondary"
                                                         style="height: 100%; background-image:
                                                                 url('{{asset('storage/'.$asset->image)}}');
                                                                 background-position: center center;
                                                                 background-repeat: no-repeat;
                                                                 background-size: cover;
                                                                 ">
                                                    </div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @endif

        </div>
    </div>

@endsection

@push('scripts')

    <script>

        $('.deleteAsset').click(function (e) {
            e.preventDefault();
            var assetID = $(this).data('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            jQuery.ajax({
                url:"/dashboard/Booking/delete",
                data:{"id":assetID},
                type:"post",
                success:function(data){
                    $('.'+assetID).css('display','none');
                    $('.deleteArea').css('display','block')
                },
                error:function (error){
                    console.log('error');
                }
            });

        });

    </script>

@endpush