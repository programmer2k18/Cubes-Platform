@extends('welcome')
@section('title','Edit Coworking Assets')

@section('content-header','Edit Assets')
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
                <form  method="post" action="{{route('editAsset',$asset->id)}}" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                            <input type="number" name="price" value="{{$asset->price}}"
                                   class="form-control" min="1" max="1000"
                                   id="exampleInputEmail1"
                                   placeholder="Enter Price" required>
                        </div>

                        <div class="form-group">
                            <label>Currency</label>
                            <select class="custom-select" name="currency" required>
                                <option value="">Select Currency</option>
                                <option value="egp">EGP</option>
                                <option value="usd">USD</option>
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
                            <input type="number" name="capacity"  value="{{$asset->capacity}}"
                                   class="form-control" min="1" max="1000"
                                   id="exampleInputEmail1"
                                   placeholder="Enter number of people eg. 5 Members">
                        </div>

                        <div class="form-group">

                            <label for="exampleInputEmail1">Number of copies of this type</label>
                            <input type="number" name="count"
                                   class="form-control" min="1" max="1000"  value="1"
                                   id="exampleInputEmail1"
                                   placeholder="Enter number of copies wanna add eg.3 Tables or 2 private office">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <div class="mb-3">
                                <textarea name="description"
                                          style="width: 100%; height: 220px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                    {{html_entity_decode(trim($asset->description))}}
                                </textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputFile">Select Image(Optional) </label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file"  name="image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                                </div>
                            </div>
                        </div>
                        @if($asset->image)
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-secondary"
                                 style="
                                         height: 250px; background-image:
                                         url('{{asset('storage/'.$asset->image)}}');
                                         background-position: center center;
                                         background-repeat: no-repeat;
                                         background-size: cover;
                                         ">
                            </div>
                        @endif
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" style="width: 85px; border-radius: 15px">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
