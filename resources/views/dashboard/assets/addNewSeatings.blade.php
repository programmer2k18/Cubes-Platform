@extends('welcome')
@section('title','Add new Seating')

@section('content-header','Adding new features')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('addAssetForm')}}">Add seating</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <!-- general form elements -->
            <div class="card card-primary">
                @include('dashboard.messages')
                <div class="card-header">
                    <h3 class="card-title">Power your co-working by Adding new seats.</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form  method="post" action="{{route('addSeating')}}" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label>Type</label>
                            <select class="custom-select" name="type" required>
                                <option value="">Select Type</option>
                                <option value="General_Assets">At Shared Space</option>
                                <option value="Meeting_rooms">Meeting Room</option>
                                <option value="Private_offices">Private Office</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="number" name="price"
                                   class="form-control" min="1" max="1000"
                                   placeholder="Enter Price" required>
                        </div>

                        <div class="form-group">
                            <label>Currency</label>
                            <select class="custom-select" name="currency" required>
                                <option value="">Select Currency</option>
                                <option value="EGP">EGP</option>
                                <option value="USD">USD</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Price period range</label>
                            <select class="custom-select" name="pricePeriod">
                                <option value="">Select Price period</option>
                                <option value="Per Hour">Per Hour</option>
                                <option value="Per Day">Per Day</option>
                                <option value="Per Week">Per week</option>
                                <option value="Per Month">Per Month</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Number of people or Capacity</label>
                            <input type="number" name="capacity"
                                   class="form-control" min="1" max="1000"
                                   id="exampleInputEmail1"
                                   placeholder="Enter number of people eg. 5 Members">
                        </div>

                        <div class="form-group">
                            <label for="inputDescription">Description</label>
                            <textarea id="inputDescription"  name="description" class="form-control" rows="6" placeholder="Add Description"></textarea>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputFile">Select Image(Optional) </label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file"  name="image"  class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" style="width: 85px; border-radius: 15px">Add</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
