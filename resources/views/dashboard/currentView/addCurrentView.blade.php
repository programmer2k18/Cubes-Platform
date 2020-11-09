@extends('welcome')
@section('title','Adding View')

@section('content-header','Add a new Current View of the Place')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('getAllViews')}}"> Views</a></li>
    <li class="breadcrumb-item"><a href="{{route('addViewForm')}}">Adding New View</a></li>
@endsection

@section('content')

        <div class="row">
            <div class="col-sm-12">@include('dashboard.messages')</div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-3">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Upload Image</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('addView')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Image input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" multiple name="images[]" class="custom-file-input" required id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            {{--<div class="form-check">
                                <input type="checkbox" name="type" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Set as main picture</label>
                            </div>--}}

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <input type="submit" value="Upload" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>

        </div>
@endsection