@extends('welcome')
@section('title','Compose Emails')
@section('content-header','Send Email')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="
{{route('getComposeForm',['co_id'=>$co_id,'userEmail'=>$userEmail])}}">Send Email</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            @include('dashboard.messages')
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <a href="{{route('getInbox',$co_id)}}" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

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
                            <a href="{{route('getInbox',$co_id)}}" class="nav-link">
                                <i class="fas fa-inbox"></i> Inbox
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('getSentMessages',$co_id)}}" class="nav-link">
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
                    <h3 class="card-title">Compose New Message</h3>
                </div>
                <!-- /.card-header -->
                <form method="post" action="{{route('composeMessage',$co_id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <input type="text" name="to"
                                   value="{{$userEmail!==null?trim($userEmail):''}}" class="form-control" placeholder="To:">
                        </div>

                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" placeholder="Subject:">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Message</label>
                            <div class="mb-3">
                                <textarea class="textarea" name="message"
                                          style="width: 100%; height: 380px; font-size:
                                          14px; line-height: 18px; border: 1px solid #dddddd;
                                          padding: 10px;"></textarea>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                        </div>
                        <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>

        </div>
        <!-- /.col -->

    </div>
    <!-- /.row -->

@endsection