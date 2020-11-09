@extends('welcome')
@section('title','Coworking Announcements')

@section('content-header','Add Announcements')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('allAnnouncements')}}">Announcements</a></li>
    <li class="breadcrumb-item"><a href="{{route('addAnnouncementForm')}}">Add Announcements</a></li>

@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            @include('dashboard.messages')
        </div>
    </div>
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Post Announcements</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">

                <form method="post" action="{{route('addAnnouncement')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inputDescription">Post Body</label>
                        <textarea id="inputDescription"  name="body" class="form-control"
                                  rows="6" placeholder="Add Description">{{old('body')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Select Image(Optional)</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="display: inline-block">
                        <button type="submit" class="btn btn-primary">Post Now</button>
                    </div>

                    <div class="form-group"  style="display: inline-block">
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>

                </form>


            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

@endsection



