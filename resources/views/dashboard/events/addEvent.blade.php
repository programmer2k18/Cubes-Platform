@extends('welcome')
@section('title','Add new event')

@section('content-header','Build a beautiful social community on your place')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="#">Add Event</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New Event </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" enctype="multipart/form-data">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Event Name</label>
                            <input type="text" name="name"
                                   class="form-control"
                                   id="exampleInputEmail1"
                                   placeholder="Type Event name">
                        </div>

                        <div class="form-group">
                            <label>Event Type</label>
                            <select class="custom-select" name="type">
                                <option value="">Select Event Type</option>
                                <option value="free">Free</option>
                                <option value="costly">Not Free</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Price(If not free)</label>
                            <input type="number" name="price"
                                   class="form-control" min="1" max="1000"
                                   id="exampleInputEmail1"
                                   placeholder="Enter Price">
                        </div>

                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>Date</label>

                                <div class="input-group date" id="timepicker">
                                    <input type="date" name="date" class="form-control datetimepicker-input"/>
                                    <div class="input-group-appen1212d">
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>

                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>Start Time</label>

                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                    <input type="time" name="startTime" class="form-control datetimepicker-input" data-target="#timepicker"/>
                                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>


                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>End Time</label>
                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                    <input type="time" name="endTime" class="form-control datetimepicker-input" data-target="#timepicker"/>
                                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>


                        <div class="form-group">
                            <label>Event type purpose</label>
                            <select class="custom-select" name="purpose">
                                <option value="family">Family</option>
                                <option value="educational">Educational</option>
                                <option value="social">Social</option>
                                <option value="workshop">Workshop</option>
                                <option value="friendly">Friendly</option>
                                <option value="entertainment">Entertainment</option>
                                <option value="student_activity">Student Activity</option>
                                <option value="other">Other</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <div class="mb-3">
                                <textarea class="textarea" name="description"
                                          style="width: 100%; height: 380px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="form-group" style="margin-left: 30px;display: inline-block">
                        <button type="submit" class="btn btn-primary">Add Event</button>
                    </div>

                    <div class="form-group"  style="display: inline-block">
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
