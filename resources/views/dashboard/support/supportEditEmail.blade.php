@extends('welcome')
@section('title','Support Emails')

@section('co-name','co-name')

@section('image')
    <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}"
         class="img-circle elevation-2" alt="Admin Image">
@endsection

@section('content-header','Edit Email')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Edit Email</a></li>
@endsection

@push('head')
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.css')}}">
@endpush

@section('content')

    <div class="row">
        <div class="col-md-3">
            <a href="compose.html" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

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
                            <a href="#" class="nav-link">
                                <i class="fas fa-inbox"></i> Inbox
                                <span class="badge bg-primary float-right">12</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-envelope"></i> Sent
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-trash-alt"></i> Deleted
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
                    <h3 class="card-title">Edit Email</h3>
                </div>
                <!-- /.card-header -->
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="card-body">


                        <div class="form-group">
                            <input type="text" name="to" class="form-control" placeholder="To:">
                        </div>

                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" placeholder="Subject:">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <div class="mb-3">
                                <textarea class="textarea" name="description"
                                          style="width: 100%; height: 380px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="btn btn-default btn-file">
                                <i class="fas fa-paperclip"></i> Attachment
                                <input type="file" name="attachment">
                            </div>
                            <p class="help-block">Max. 32MB</p>
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
@push('scripts')
    <script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote();
        })
    </script>
@endpush