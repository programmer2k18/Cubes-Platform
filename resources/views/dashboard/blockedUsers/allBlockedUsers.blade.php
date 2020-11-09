@extends('welcome')
@section('title','Blocked Users')

@section('co-name','co-name')

@section('image')
    <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}"
         class="img-circle elevation-2" alt="Admin Image">
@endsection

@section('content-header','List Of all Blocked Users from your coworking.')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Blocked Users</a></li>
@endsection

@section('content')

    <div class="card card-primary">

        <div class="card-body">
            <div class="row">

                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-body pt-0" style="margin-top: 15px; margin-bottom: -6px">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <p class="text-muted text-sm"><b><i class="fas fa-lg fa-envelope"></i> </b>nicola@gmail.com </p>

                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>

                                <div class="col-5 text-center">
                                    <img src="{{asset('admin/dist/img/user1-128x128.jpg')}}" style="max-width: 60px;max-height: 60px" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-envelope"></i> Mail
                                </a>
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-door-open"></i> Unblock
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-body pt-0" style="margin-top: 15px; margin-bottom: -6px">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <p class="text-muted text-sm"><b><i class="fas fa-lg fa-envelope"></i> </b>nicola@gmail.com </p>

                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>

                                <div class="col-5 text-center">
                                    <img src="{{asset('admin/dist/img/user1-128x128.jpg')}}" style="max-width: 60px;max-height: 60px" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-envelope"></i> Mail
                                </a>
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-door-open"></i> Unblock
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-body pt-0" style="margin-top: 15px; margin-bottom: -6px">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <p class="text-muted text-sm"><b><i class="fas fa-lg fa-envelope"></i> </b>nicola@gmail.com </p>

                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>

                                <div class="col-5 text-center">
                                    <img src="{{asset('admin/dist/img/user1-128x128.jpg')}}" style="max-width: 60px;max-height: 60px" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-envelope"></i> Mail
                                </a>
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-door-open"></i> Unblock
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-body pt-0" style="margin-top: 15px; margin-bottom: -6px">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <p class="text-muted text-sm"><b><i class="fas fa-lg fa-envelope"></i> </b>nicola@gmail.com </p>

                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>

                                <div class="col-5 text-center">
                                    <img src="{{asset('admin/dist/img/user1-128x128.jpg')}}" style="max-width: 60px;max-height: 60px" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-envelope"></i> Mail
                                </a>
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-door-open"></i> Unblock
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-body pt-0" style="margin-top: 15px; margin-bottom: -6px">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <p class="text-muted text-sm"><b><i class="fas fa-lg fa-envelope"></i> </b>nicola@gmail.com </p>

                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>

                                <div class="col-5 text-center">
                                    <img src="{{asset('admin/dist/img/user1-128x128.jpg')}}" style="max-width: 60px;max-height: 60px" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-envelope"></i> Mail
                                </a>
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-door-open"></i> Unblock
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-body pt-0" style="margin-top: 15px; margin-bottom: -6px">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <p class="text-muted text-sm"><b><i class="fas fa-lg fa-envelope"></i> </b>nicola@gmail.com </p>

                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>

                                <div class="col-5 text-center">
                                    <img src="{{asset('admin/dist/img/user1-128x128.jpg')}}" style="max-width: 60px;max-height: 60px" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-envelope"></i> Mail
                                </a>
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-door-open"></i> Unblock
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-body pt-0" style="margin-top: 15px; margin-bottom: -6px">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <p class="text-muted text-sm"><b><i class="fas fa-lg fa-envelope"></i> </b>nicola@gmail.com </p>

                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>

                                <div class="col-5 text-center">
                                    <img src="{{asset('admin/dist/img/user1-128x128.jpg')}}" style="max-width: 60px;max-height: 60px" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-envelope"></i> Mail
                                </a>
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-door-open"></i> Unblock
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-body pt-0" style="margin-top: 15px; margin-bottom: -6px">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <p class="text-muted text-sm"><b><i class="fas fa-lg fa-envelope"></i> </b>nicola@gmail.com </p>

                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>

                                <div class="col-5 text-center">
                                    <img src="{{asset('admin/dist/img/user1-128x128.jpg')}}" style="max-width: 60px;max-height: 60px" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-envelope"></i> Mail
                                </a>
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-door-open"></i> Unblock
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>


    </div>


@endsection