@extends('welcome')
@section('title','New Booking Requests')

@section('content-header','Upcoming Booking requests for your coworking space in near future')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('BookingHistory')}}">Booking History</a></li>
    <li class="breadcrumb-item"><a href="{{route('upComingRequests')}}">New Requests</a></li>

@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @include('dashboard.messages')
        </div>
        <div class="col-sm-12 alert alert-danger deleteArea" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;
            </button>
            <h4>Booking Request Deleted</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            {{$requests->links()}}
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">New Booking Requests</h3>

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
                    <?php
                        $classifier = new \App\appModels\Classification\UserBookingStatusClassifier();
                     ?>
                    @foreach($requests as $request)

                        <?php

                         $from = \Carbon\Carbon::createFromTimeString($request->from);
                         $to = \Carbon\Carbon::createFromTimeString($request->to);
                         $bookedTimeInHours = $to->diffInHours($from);
                         $sample = [[$request->user_id,$request->co_seating_id,$request->cost,$bookedTimeInHours,$request->capacity,$request->assetType->price]];
                         $result = $classifier->predict($sample);

                        ?>

                        <tr class="{{$request->id}}">
                            <td>
                                @if($request->bookingOwner)
                                    {{ucfirst($request->bookingOwner->name)}}
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            @if($request->bookingOwner->image)
                                                <img alt="{{$request->bookingOwner->name}}" class="table-avatar"
                                                     src="{{asset('storage/'.$request->bookingOwner->image)}}">
                                            @else
                                                <img alt="{{$request->bookingOwner->name}}" class="table-avatar"
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
                                {{$request->created_at->format('d M Y H:i')}}
                            </td>

                            <td class="project-state">
                                <span class="badge badge-{{$request->status=='verified'?'success':'danger'}}">
                                    {{$request->status}}<br>
                                </span>

                                <span class="badge badge-{{$result[0]==1?'success':'danger'}}">
                                  {{$result[0]==1 ? "High Probability ":"Low Probability"}}<br> of Coming
                                </span>
                            </td>

                            <td class="project-actions text-right">
                            
                                <a href="{{route('verify',$request->id)}}" class="btn btn-success btn-sm" style="display: block;margin-bottom: 2px;">
                                    <i class="fas fa-minus-square">
                                    </i>
                                    Confirm
                                </a>
                         
                                @if($request->user_id)
                                       <a  href="{{route('getComposeForm',['co_id'=>$request->co_id,
                                                'userEmail'=>$request->bookingOwner->email])}}" class="btn btn-danger btn-sm" style="display: block;margin-bottom: 2px;">
                                            <i class="fas fa-mail-bulk">
                                            </i>
                                            Send Email
                                        </a>
                                @endif

                                <a class="btn btn-danger btn-sm deleteAsset" data-id="{{$request->id}}" style="display: block" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
    
                                
                                
                            </td>
                            
                        </tr>
                        
                        <tr class="{{$request->id}}">
                            <td colspan="9">

                                <div class="card  collapsed-card" style="background-color: #1e2b37;color: white">
                                    <div class="card-header">
                                        <h3 class="card-title">{{$request->assetType->type}}</h3>
                                        <div class="card-tools"  style="float: right">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div   style="float: right">
                                            <h3 class="card-title">Starts After:  {{\Carbon\Carbon::now()->diffAsCarbonInterval($request->from)}}</h3>
                                        </div>
                                        <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5><i class="fas fa-money-bill"></i> Price: {{$request->assetType->price}} {{$request->assetType->currency}}</h5>
                                                <h6 class="mailbox-subject">Price Period: {{$request->assetType->pricePeriodType}}</h6>
                                                <h6 class="mailbox-subject">Capacity: {{$request->assetType->capacity}} Members</h6>
                                                <p>
                                                    {{htmlspecialchars(trim($request->assetType->description))}}
                                                </p>
                                            </div>

                                            <div class="col-md-6">
                                                @if($request->assetType->image)
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

            @else
                <div class="row">
                    <div class="col-sm-12 text-center"><h2>Sorry, No requests yet</h2></div>
                </div>

            @endif


        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            {{$requests->links()}}
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