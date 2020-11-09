@extends('welcome')
@section('title','Opening Time')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('editOpeningTimeForm',$time->id)}}">Update Opening Time</a></li>
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
                <h3 class="card-title">Update Opening Time</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">

                <form method="post" action="{{route('editOpeningTime',$time->id)}}">

                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label>Day</label>
                            <select class="custom-select" name="day">
                                <option value="">Select Day</option>
                                <option value="sat">Saturday</option>
                                <option value="sun">Sunday</option>
                                <option value="mon">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="fri">Friday</option>
                            </select>
                        </div>


                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>From</label>

                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                    <input type="time"  value="{{$time->from}}"name="from" class="form-control"/>
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>

                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>To</label>

                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                    <input type="time" name="to" value="{{$time->to}}" class="form-control"/>
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>

                        <div class="form-group" style="display: inline-block">
                            <button type="submit" class="btn btn-primary">Update Time</button>
                        </div>

                        <div class="form-group"  style="display: inline-block">
                            <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </form>


            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

@endsection



