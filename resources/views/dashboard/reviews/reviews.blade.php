@extends('welcome')
@section('title','Reviews')

@section('content-header','Reviews about your place and services,
Listen to their reviews carefully.')
@section('reviews_count',count($reviews) > 0 ?count($reviews):0)

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('getAllReviews')}}">Reviews</a></li>
@endsection

@section('content')

    <div class="row">

        <div class="card card-default col-sm-12">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit"></i>
                    Reviews
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">

                    @if(count($reviews) > 0)

                        @foreach($reviews as $review)

                            <div class="col-md-4" id="{{$review->id}}">

                                <div class="callout callout-danger">

                                    <div class="card-comment">
                                        @if($review->image)
                                            <!-- User image -->
                                                <img class="img-circle img-sm"
                                                     src="{{asset('storage/'.$review->image)}}"
                                                     alt="User Image">
                                        @else
                                            <!-- Default User image -->
                                                <img class="img-circle img-sm"
                                                     src="{{asset('admin/default_images/AdminLTELogo.png')}}"
                                                     alt="Default User Image">
                                        @endif



                                        <div class="comment-text">
                                            <span class="username">
                                              <span style="margin-left: 5px;">{{ucfirst($review->user_name)}}</span>
                                              <span class="text-muted float-right">{{ \Carbon\Carbon::createFromTimeString($review->created_at)->format('d M Y H:i')}}</span>
                                            </span><!-- /.username -->
                                        </div>
                                        <div style=" margin-left: 5px;padding-left: 0;margin-top: 15px;">
                                            <p>
                                                {{htmlspecialchars(trim($review->review))}}
                                            </p>
                                            <p>
                                                Wifi:  <span style="font-weight:bolder; font-size: 19px;padding: 4px;
                                                         background-color: lightgoldenrodyellow;border-radius: 7px ;border: 1.2px solid darkslategray">
                                                            {{$review->wifi}}</span>
                                                Overall: <span style="font-weight:bolder; font-size: 19px;padding: 4px;
                                                          background-color: lightgoldenrodyellow;border-radius: 7px ;border: 1.2px solid darkslategray">{{$review->overall}}</span>
                                               <br>
                                               Location:  <span style="font-weight:bolder; font-size: 19px;padding: 4px;
                                                          background-color: lightgoldenrodyellow;border-radius: 7px ;border: 1.2px solid darkslategray">
                                                    {{$review->location}}</span>

                                               Comfort:  <span style="font-weight:bolder; font-size: 19px;padding: 4px;
                                                          background-color: lightgoldenrodyellow;border-radius: 7px ;border: 1.2px solid darkslategray">
                                                    {{$review->comfort}}</span><br>
                                            </p>

                                            <div>
                                                <a href="{{route('deleteReview')}}" data-id="{{$review->id}}" class="btn btn-danger deleteAsset" style="color: white"><i class="fas fa-trash"></i></a>
                                                <a href="{{route('getComposeForm',['co_id'=>request()->session()->get('admin')->id,
                                                'userEmail'=>$review->email])}}" class="btn btn-primary" style="color: white;margin-right: 4px;"><i class="far fa-envelope"></i></a>
                                            </div>

                                        </div>
                                        <!-- /.comment-text -->
                                    </div>
                                    <!-- /.card-comment -->
                                </div>
                            </div>

                        @endforeach

                    @else
                            <div class="col-sm-12 text-center">
                                <h3> There are no reviews yet.
                                </h3>
                            </div>
                    @endif

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
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
                url:'/dashboard/Reviews/delete',
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