@extends('welcome')

@section('title','Current Views')

@section('content-header','Recent Views of your coworking space.')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('getAllViews')}}"> Views</a></li>
@endsection

@section('content')


    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Latest Views </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <?php
                    $cachedImages = \Illuminate\Support\Facades\Cache::get('co_images');
                ?>
                @if(count($cachedImages) > 0)

                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">


                            <div class="carousel-inner">

                                @foreach($cachedImages as $image)

                                    <div class="carousel-item {{$loop->first?'active':''}}">
                                        <img class="d-block w-100" src="{{asset('storage/'.$image->image)}}"
                                             style="max-height: 600px">
                                    </div>

                                @endforeach

                            </div>

                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                @else
                        <div class="carousel-inner">
                            <h4>Sorry, No views added yet, Please add more views off the current status<br>
                                <a href="{{route('addViewForm')}}">Add Views</a>
                            </h4>
                        </div>
                @endif

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

@endsection
