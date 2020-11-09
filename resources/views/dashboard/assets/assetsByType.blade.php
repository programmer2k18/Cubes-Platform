@extends('welcome')
@section('title','Coworking '.$type)

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="/dashboard/assets/".{{$type}}>{{$type}}</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-4">
            {{$assets->links()}}
        </div>
    </div>
    <div class="row">

        @if(count($assets)>0)
            @foreach($assets as $asset)

                <div class="col-md-6" id="{{$asset->id}}">
                    <!-- Widget: user widget style 2 -->
                    <div class="card card-widget widget-user-2">

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

                        <div class="card-footer p-0">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <p class="nav-link" style="margin-bottom: -2px;color: #6C757D;">
                                        <strong>Type</strong>
                                        <span class="float-right badge bg-primary">{{$type}}</span>
                                    </p>
                                </li>
                                <li class="nav-item">
                                    <p class="nav-link" style="margin-bottom: -2px;color: #6C757D;">
                                        <strong>Price</strong>
                                        <span class="float-right badge bg-primary">{{$asset->price}}{{$asset->currency}}</span>
                                    </p>
                                </li>

                                <li class="nav-item">
                                    <p class="nav-link" style="margin-bottom: -2px;color: #6C757D;">
                                        <strong>Period Time</strong>
                                        <span class="float-right badge bg-primary">{{$asset->pricePeriodType}}</span>
                                    </p>
                                </li>

                                <li class="nav-item">
                                    <p class="nav-link" style="margin-bottom: -2px;color: #6C757D;">
                                        <strong>Capacity</strong>
                                        <span class="float-right badge bg-primary">{{$asset->capacity}} Members</span>
                                    </p>
                                </li>

                                <li class="nav-item">
                                    <p class="nav-link" style="
                                    margin-bottom: -2px;color: #6C757D;padding: 15px 10px">
                                        {{html_entity_decode(trim($asset->description))}}
                                    </p>
                                </li>
                                <li class="nav-item" style="margin-bottom: -2px">
                                    <p class="nav-link">
                                        <a href="{{route('getBookingForm',['assetId'=>$asset->id,'type'=>$asset->type])}}" class="btn btn-primary btn-sm" style="display: block;margin-bottom: 2px;" >
                                            <i class="fas fa-book-open">
                                            </i>
                                            Book Now
                                        </a>
                                        <a href="{{route('editAssetForm',$asset->id)}}" class="btn btn-primary btn-sm" style="display: block;margin-bottom: 2px;" >
                                            <i class="fas fa-folder">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm deleteAsset" style="display: block" href="{{route('deleteAsset',$asset->id)}}" data-id="{{$asset->id}}">
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
                <h3> There are no Meeting rooms available in your space yet<br>
                      Please add all your assets
                </h3>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-sm-4">
            {{$assets->links()}}
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
                url:"/dashboard/assets/delete",
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