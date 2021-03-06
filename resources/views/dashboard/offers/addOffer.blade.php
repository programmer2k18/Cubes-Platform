@extends('welcome')
@section('title','Add new offer')

@section('content-header','Attract your customers by Convincing and attractive offers')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('addGeneralOfferForm')}}">Add Offer</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New Offer</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @include('dashboard.messages')
            <form role="form" method="post" 
                action="{{route('addOffer', \request()->session()->has('userOffer')?session()->get('userOffer'):0)}}">
                    
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label>Offer Resources</label>
                            <select class="custom-select" name="type" required>
                                <option value="">Select Type</option>
                                <option value="All">All Features</option>
                                <option value="General_Assets">At Shared Space</option>
                                <option value="Meeting_rooms">Meeting Room</option>
                                <option value="Private_offices">Private Office</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Discount rate (eg. 15%)</label>
                            <input type="number" name="discount" value="{{old('discount')}}"
                                   class="form-control" min="1" max="100" required
                                   id="exampleInputEmail1"
                                   placeholder="Enter Offer discount rate">
                        </div>

                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>Starting Time</label>

                                <div class="input-group date" id="timepicker">
                                    <input type="datetime-local" name="from" value="{{old('from')}}" required class="form-control datetimepicker-input"/>
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
                                <label>Ending Time</label>

                                <div class="input-group date" id="timepicker">
                                    <input type="datetime-local" name="to" required value="{{old('to')}}" class="form-control datetimepicker-input"/>
                                    <div class="input-group-appen1212d">
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <div class="mb-3">
                                <textarea class="textarea" name="description" required
                            style="width: 100%; height: 380px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('description')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="form-group" style="margin-left: 30px;display: inline-block">
                        <button type="submit" class="btn btn-primary">Add Offer</button>
                    </div>

                    <div class="form-group"  style="display: inline-block">
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
