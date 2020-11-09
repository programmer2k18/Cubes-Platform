@extends('welcome')
@section('title','Edit Amenities')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('editAmenityForm',$amenity->id)}}">Edit Amenity</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            @include('dashboard.messages')
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Amenity</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">

                    <form method="post" action="{{route('editAmenity',$amenity->id)}}" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group">
                            <label for="inputName">Amenity Name</label>
                            <input type="text" value="{{$amenity->name}}" name="name" id="inputName" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Amenity Type</label>
                            <select class="custom-select" name="type">
                                <option value="">Select Amenity Type</option>
                                <option value="Equipments">Equipments</option>
                                <option value="Facilities">Facilities</option>
                                <option value="Community">Community</option>
                                <option value="Cool_Stuff">Cool Stuff</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputDescription">Amenity Description</label>
                            <textarea id="inputDescription"  name="description" class="form-control" rows="6" placeholder="Add Description">
                            {{$amenity->description?htmlspecialchars_decode($amenity->description):''}}
                        </textarea>
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
                            <button type="submit" class="btn btn-primary">Edit Amenity</button>
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

    </div>

@endsection



