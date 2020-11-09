@extends('welcome')
@section('title','Block User')

@section('co-name','co-name')

@section('image')
    <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}"
         class="img-circle elevation-2" alt="Admin Image">
@endsection

@section('content-header','Block Disrespectful people from your own place')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Block User</a></li>
@endsection

@push('head')
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.css')}}">
@endpush

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Block User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" enctype="multipart/form-data" method="post">
                    <div class="card-body">


                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name"
                                   class="form-control"
                                   id="exampleInputEmail1"
                                   placeholder="Type User Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email"
                                   class="form-control"
                                   id="exampleInputEmail1"
                                   placeholder="Type User Email">
                        </div>


                        <div class="form-group">
                            <label>Blocking Period</label>
                            <select class="custom-select" name="blockingPeriod">
                                <option value="1d">A Day</option>
                                <option value="2d">2 Days </option>
                                <option value="1w">A Week</option>
                                <option value="2w">2 Weeks</option>
                                <option value="1m">A Month</option>
                                <option value="1m">A Year</option>
                                <option value="undefined">Undefined</option>
                                <option value="forever">Forever</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Reasons for blocking</label>
                            <div class="mb-3">
                                <textarea class="textarea" name="reasons"
                                          style="width: 100%; height: 380px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="form-group" style="margin-left: 30px;display: inline-block">
                        <button type="submit" class="btn btn-primary">Block</button>
                    </div>

                    <div class="form-group"  style="display: inline-block">
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote();
        })
    </script>
@endpush