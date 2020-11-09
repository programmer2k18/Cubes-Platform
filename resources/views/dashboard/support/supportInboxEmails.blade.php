@extends('welcome')
@section('title','Support Emails')

@section('content-header','Inbox Emails')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('getInbox',request()->session()->get('admin')->id)}}">
            Inbox</a></li>
@endsection

@section('content')

                <div class="row">
                    <div class="col-md-3">
                        <a href="{{route('getComposeForm',request()->session()->get('admin')->id)}}"
                           class="btn btn-primary btn-block mb-3">Compose</a>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Operation</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item active">
                                        <a href="{{route('getInbox',request()->session()->get('admin')->id)}}" class="nav-link">
                                            <i class="fas fa-inbox"></i> Inbox
                                            <span class="badge bg-primary float-right">{{count($emails)}}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('getSentMessages',request()->session()->get('admin')->id)}}" class="nav-link">
                                            <i class="far fa-envelope"></i> Sent
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Inbox</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm">
                                        <input type="search" class="form-control" placeholder="Search Mail">
                                        <div class="input-group-append">
                                            <div class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">

                                <div class="table-responsive mailbox-messages">

                                    @if(count($emails) > 0)
                                        @foreach($emails as $email)
                                            <div class="card collapsed-card" id="{{$email->id}}" style="margin-top: 8px">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{ucfirst($email->name)}}</h3>
                                                    <div class="card-tools"  style="float: right">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                    <div   style="float: right">
                                                        <h3 class="card-title">{{\Carbon\Carbon::createFromTimeString($email->created_at)->format('d M Y H:i')}}</h3>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">

                                                    <h5><i class="fas fa-envelope"></i>  {{$email->email}}</h5>
                                                    <h6 class="mailbox-subject">Subject: {{$email->subject}}</h6>
                                                    <p>
                                                        {{trim($email->message)}}
                                                    </p>
                                                    <a href="{{route('deleteMessage')}}" data-id="{{$email->id}}" class="btn btn-default deleteAsset btn-sm"><i class="far fa-trash-alt"></i></a>
                                                    <a href="{{route('getComposeForm',['co_id'=>$email->co_id,'userEmail'=>$email->email])}}" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></a>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>

                                        @endforeach
                                    @else
                                        <div class="row">
                                            <div class="col-sm-12 text-center"><h2>Sorry, No emails received yet</h2></div>
                                        </div>
                                    @endif

                                </div>
                                <!-- /.mail-box-messages -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer p-0">
                                <div class="mailbox-controls">
                                    <div class="float-right">
                                        {{$emails->links()}}                                        <!-- /.btn-group -->
                                    </div>
                                    <!-- /.float-right -->
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

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
                url:"/dashboard/support/delete",
                data:{"id":assetID},
                type:"post",
                success:function(data){
                    $('#'+assetID).css('display','none');
                },
                error:function (error){
                    console.log('error');
                }
            });
        });
    </script>

@endpush