@extends('welcome')
@section('title',$type)

@section('content-header','All '.$type .' Amenities of your coworking space')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="/dashboard/Amenities/".{{$type}}>{{$type}}</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            @include('dashboard.messages')
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            {{$amenities->links()}}
        </div>
    </div>
    <div class="row">
        @if(count($amenities) > 0)
            @foreach($amenities as $amenity)

                <div class="col-md-4" id="{{$amenity->id}}">
                    <!-- Widget: user widget style 2 -->
                    <div class="card card-widget widget-user-2">
                        @if($amenity->image)
                            <div class="widget-user-header bg-secondary"
                                 style="height: 150px; background-image:
                                         url('{{asset('storage/'.$amenity->image)}}');
                                         background-position: center center;
                                         background-repeat: no-repeat;
                                         background-size: cover;
                                         ">
                            </div>
                        @endif

                        <div class="card-footer p-0">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <p class="nav-link text-center" style="margin-bottom: -2px;color: #6C757D;">
                                        <span class="">{{$amenity->name}}</span>
                                    </p>
                                </li>
                                <li class="nav-item">
                                    <p class="nav-link" style="margin-bottom: -2px;color: #6C757D;">
                                        {{$amenity->description?htmlspecialchars_decode($amenity->description):''}}
                                    </p>
                                </li>

                                <li class="nav-item" style="margin-bottom: -2px">
                                    <p class="nav-link">
                                        <a href="{{route('editAmenityForm',$amenity->id)}}" class="btn btn-primary btn-sm" style="display: block;margin-bottom: 2px;">
                                            <i class="fas fa-folder">
                                            </i>
                                            Edit
                                        </a>
                                        <a  href="{{route('deleteAmenity',$amenity->id)}}" data-id="{{$amenity->id}}" class="btn btn-danger btn-sm deleteAsset" style="display: block">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>


            @endforeach
        @else
            <div class="col-sm-12 text-center">
                <h3> There are no amenities  available in your space yet<br>
                    Please add all your amenities
                </h3>
            </div>
        @endif

    </div>
    <div class="row">
        <div class="col-sm-4">
            {{$amenities->links()}}
        </div>
    </div>

@endsection

@push('scripts')

    <script>

        $('.deleteAsset').click(function (e) {
            e.preventDefault();
            var assetID = $(this).data('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            jQuery.ajax({
                url:"/dashboard/Amenities/delete",
                data:{"id":assetID},
                type:"post",
                success:function(data){
                    $('#'+assetID).css('display','none');
                },
                error:function (error){
                    console.log('error');
                }
            });

        });

    </script>
@endpush