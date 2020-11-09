@extends('welcome')
@section('title','Announcements')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('allAnnouncements')}}">Announcements</a></li>
@endsection

@section('content-header')
    <a href="{{route('addAnnouncement')}}" class="nav-link">
        <i class="fas fa-newspaper" style="display: inline-block"></i>
        <p style="display: inline-block;margin-top: -3px">
            Post Now
            {{--<i class="fas fa-angle-right right"></i>--}}
        </p>
    </a>
@endsection

@section('content')


    <div class="row">
        <div class="col-sm-12">
            @include('dashboard.messages')
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            {{$posts->links()}}
        </div>
    </div>

    <div class="row">

        @if(count($posts) > 0)
            @foreach($posts as $post)

                <div class="col-md-12" style="margin: 0px auto" id="{{$post->id}}">
                    <!-- Box Comment -->
                    <div class="card card-widget">
                        <div class="card-header">
                            <div class="user-block">

                                @if(request()->session()->get('admin')->image)
                                    <img class="img-circle"
                                         src="{{asset('storage/'.request()->session()->get('admin')->image)}}"
                                         alt="Coworking Main Image">
                                @else
                                    <img class="img-circle"
                                         src="{{asset('admin/default_images/AdminLTELogo.png')}}"
                                         alt="Coworking Main Image">
                                @endif

                                <span class="username"><a href="#">{{request()->session()->get('admin')->name}}</a></span>
                                <span class="description">Shared publicly - {{$post->created_at}}</span>
                            </div>
                            <!-- /.user-block -->
                            <div class="card-tools">

                                <a href="{{route('editAnnouncementForm',$post->id)}}" class="btn btn-tool" ><i class="fas fa-edit"></i>
                                </a>
                                <button  type="button" class="btn btn-tool deleteAsset" data-id="{{$post->id}}"><i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="row">
                                <p>{{$post->body?htmlspecialchars_decode($post->body):''}}</p>
                            </div>
                            @if($post->image)
                                <div class="row">
                                    <img class="img-fluid pad" src="{{asset('storage/'.$post->image)}}" style="margin-bottom: 5px;" alt="Photo">
                                </div>
                            @endif

                            {{--<a href="/dashboard/posts/1" class="btn btn-default btn-sm"><i class="fas fa-eye"></i> Show More</a>
                            <span class="float-right text-muted">127 likes - 3 comments</span>--}}

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>


            @endforeach

        @else
            <div class="col-sm-12 text-center">
                <h3> There are no announcements available in your space yet<br>
                    Please cooperate with your customers with more posts.
                </h3>
            </div>
        @endif

    </div>

    <div class="row">
        <div class="col-sm-4">
            {{$posts->links()}}
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
                url:"/dashboard/Announcements/delete",
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


