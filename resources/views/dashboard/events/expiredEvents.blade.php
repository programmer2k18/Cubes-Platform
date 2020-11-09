@extends('welcome')
@section('title','Expired Events')

@section('co-name','co-name')

@section('image')
    <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}"
         class="img-circle elevation-2" alt="Admin Image">
@endsection

@section('content-header','Expired events.')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Expired events</a></li>
@endsection

@push('head')
    <style>
        .holder{
            margin-bottom: 6px;
        }
    </style>
@endpush
@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Expired Events </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">

                        <div class="col-sm-4 holder">
                            <div class="position-relative p-3 bg-gray" >
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div class="ribbon bg-info">
                                        Expired
                                    </div>
                                </div>
                                <p style="margin: 0px;font-size: 30px;">Event name</p>
                                <p style="margin: 0px;font-size: 22px;">Event purpose</p>
                                Free or 35EGP <br/>
                                Date: 22/10/2019<br />
                                Start time: 5:55 PM<br />
                                End time: 10:55 PM<br />
                                <a href="#" class="small-box-footer" style="display: inline-block;color: white;margin-right: 5px">
                                    Show Full Details <i class="fas fa-arrow-circle-left"></i>
                                </a>
                                <a href="#" class="small-box-footer" style="display: inline-block;color: white;margin-right: 5px">
                                    Edit <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="small-box-footer" style="display: inline-block;color: white">
                                    Delete <i class="fas fa-trash"></i>
                                </a>
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
    </div>

@endsection