@extends('welcome')
@section('title','Book Now')

@section('content-header','Book For users Now')

@section('content')


    <div class="row">
        <div class="col-sm-12">
            @include('dashboard.messages')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Make New Booking Request </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('bookNow',$assetId)}}">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">User Phone Number</label>
                            <input type="tel" class="form-control"
                                   id="phone" name="phone" value="{{old('phone')}}"
                                   pattern="[0-9]{11}" placeholder="ex:01294836514"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Booked Asset Type</label>
                            <input type="text" value="{{$type}}" disabled class="form-control"
                                   id="phone" name="asset_type"
                                   >
                        </div>

                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>Start Date</label>

                                <div class="input-group date" id="timepicker">
                                    <input type="datetime-local"  name="from"
                                           class="form-control"  value="{{old('from')}}" required/>
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
                                <label>End Date</label>

                                <div class="input-group date" id="timepicker">
                                    <input type="datetime-local"  value="{{old('to')}}" name="to"
                                           class="form-control" required/>
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
                                <label>Number Of People</label>

                                <div class="input-group date" id="timepicker">
                                    <input type="number" name="capacity"
                                           class="form-control" min="1" max="30"  value="{{old('capacity')}}"
                                            placeholder="Number Of Attending People" required/>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>

                        {{--<div class="form-group">
                            <label for="exampleInputEmail1">Message</label>
                            <div class="mb-3">
                                <textarea class="textarea" name="description"
                                          style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>--}}

                    </div>
                    <!-- /.card-body -->

                    <div class="form-group" style="margin-left: 30px;display: inline-block">
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>

                    <div class="form-group"  style="display: inline-block">
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

