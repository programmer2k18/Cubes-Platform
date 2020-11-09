@extends('welcome')
@section('title','Posts')

@section('co-name','co-name')

@section('image')
    <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}"
         class="img-circle elevation-2" alt="Admin Image">
@endsection

@section('content-header','Post name...')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Posts</a></li>
    <li class="breadcrumb-item"><a href="#">Post name</a></li>

@endsection

@section('content')

    <div class="row">

        <div class="col-sm-12">
            <!-- Box Comment -->
            <div class="card card-widget">
                <div class="card-header">
                    <div class="user-block">
                        <img class="img-circle" src="{{asset('admin/dist/img/user1-128x128.jpg')}}" alt="User Image">
                        <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                        <span class="description">Shared publicly - 7:30 PM Today</span>
                    </div>
                    <!-- /.user-block -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">
                            <i class="far fa-circle"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <p>I took this photo this morning. What do you guys think?</p>
                    <img class="img-fluid pad" src="{{asset('admin/dist/img/photo2.png')}}" style="margin-bottom: 5px;" alt="Photo">
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-trash"></i> Delete Post</button>
                    <span class="float-right text-muted">127 likes - 3 comments</span>

                </div>
                <!-- /.card-body -->
                <div class="card-footer card-comments">

                    <div class="card-comment">
                        <!-- User image -->
                        <img class="img-circle img-sm" src="{{asset('admin/dist/img/user1-128x128.jpg')}}" alt="User Image">
                        <div class="comment-text">
                            <span class="username">
                              Maria Gonzales
                              <span class="text-muted float-right">8:03 PM Today</span>
                            </span><!-- /.username -->
                            It is a long established fact that a reader will be distracted
                            by the readable content of a page when looking at its layout.
                            <div class="btn-group btn-group-sm" style="float: right">
                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                        <!-- /.comment-text -->
                    </div>
                    <!-- /.card-comment -->

                </div>

            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

@endsection



