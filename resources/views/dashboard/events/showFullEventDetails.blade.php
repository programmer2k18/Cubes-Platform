@extends('welcome')
@section('title','Available Events')

@section('co-name','co-name')

@section('image')
    <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}"
         class="img-circle elevation-2" alt="Admin Image">
@endsection

@section('content-header','Event name')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">upcoming events</a></li>
    <li class="breadcrumb-item"><a href="#">event name</a></li>
@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <p class="card-title">Event name</p>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                        <div class="holder">
                            <div class="position-relative p-3 bg-gray" >
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div class="ribbon bg-info">
                                        Free
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-5">
                                        <p style="margin: 0px;font-size: 30px;">Event name</p>
                                        <p style="margin: 0px;font-size: 22px;">Event purpose</p>
                                        Date: 22/10/2019<br />
                                        Start time: 5:55 PM<br />
                                        End time: 10:55 PM<br />
                                        <a href="#" class="small-box-footer" style="display: inline-block;color: white;margin-right: 5px">
                                            Back <i class="fas fa-arrow-circle-left"></i>
                                        </a>
                                        <a href="#" class="small-box-footer" style="display: inline-block;color: white;margin-right: 5px">
                                            Edit <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="small-box-footer" style="display: inline-block;color: white">
                                            Delete <i class="fas fa-trash"></i>
                                        </a>
                                    </div>

                                    <div class="col-md-5">
                                        description dklfnd bidu ifbsaif sidbis asihd bD JHBSDFJHCB CJS
                                    </div>

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

    <div class="card card-primary">
        <div class="card-header">
            Potential Attending People
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-sm-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-body pt-0"  style="margin-top: 5px;">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="{{asset('admin/dist/img/user1-128x128.jpg')}}" alt="" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-mail-bulk"></i> Mail
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus-square"></i> Promote
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-body pt-0"  style="margin-top: 5px;">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="{{asset('admin/dist/img/user1-128x128.jpg')}}" alt="" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-mail-bulk"></i> Mail
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> Promote
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-body pt-0"  style="margin-top: 5px;">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="{{asset('admin/dist/img/user1-128x128.jpg')}}" alt="" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-mail-bulk"></i> Mail
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> Promote
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-body pt-0"  style="margin-top: 5px;">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="{{asset('admin/dist/img/user1-128x128.jpg')}}" alt="" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-mail-bulk"></i> Mail
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> Promote
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>

  </div>

@endsection