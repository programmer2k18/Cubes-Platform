@extends('welcome')
@section('title','Offers')


@section('content-header','Offers History')

@section('content-breadcrumb')
<li class="breadcrumb-item"><a href="{{route('generalOffers')}}">Offers</a></li>
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
                    <p class="card-title">Available and Expired General Offers</p>
                    <a href="{{route("addGeneralOfferForm")}}" 
                    class="btn btn-success" style="float: right">Add New Offer</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="row">

                        @if (count($offers) > 0)
                            @foreach ($offers as $offer)
                                <div class="col-sm-12">

                                    <div class="holder" style="margin-bottom: 5px;">
                                        <div class="position-relative p-3 bg-gray" >
                                            <div class="ribbon-wrapper ribbon-lg">
                                                <div>
                                                    @if ($offer->to < \Carbon\Carbon::now())
                                                    <div class="ribbon bg-danger">
                                                        Expired or Closed </div> 
                                                    @else
                                                    <div class="ribbon bg-success">{{$offer->discount_rate}}% Discount</div>
                                                    @endif
                                                </div>
                                            </div>
        
                                            <div class="row">
        
                                                <div class="col-md-5">
                                                    <p style="margin: 0px;font-size: 22px;">{{$offer->discount_rate}}% Discount</p>
                                                    
                                                    Offer Resources: {{$offer->seatingType}}<br />
                                                    From: {{$offer->from}}<br />
                                                    To: {{$offer->to}}<br />
                                                    @if ($offer->to > \Carbon\Carbon::now())
                                                        Remaining time: {{\Carbon\Carbon::now()->diffAsCarbonInterval($offer->from)}}<br/>
                                                    @else
                                                        Closed Since: {{\Carbon\Carbon::now()->diffAsCarbonInterval($offer->to)}}<br/>
                                                    @endif
        
                                                    @if ($offer->to > \Carbon\Carbon::now())   
                                                       <a href="{{route('getEditOfferForm',$offer->off_id)}}" class="small-box-footer" style="display: inline-block;color: white;margin-right: 5px">
                                                            Edit <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{route('closeOffer',$offer->off_id)}}" class="small-box-footer" style="display: inline-block;color: white">
                                                            Close Offer <i class="fas fa-trash"></i>
                                                        </a>
                                                    @endif    
                                                </div>
        
                                                <div class="col-md-5">
                                                    {{htmlspecialchars_decode( trim($offer->description))}}
                                                </div>
        
                                            </div>
        
                                        </div>
                                    </div>
        
                                </div>
                            @endforeach
                        
                        @else
                            <div class="col-sm-12">
                                <h3 style="text-align: center">No offers available yet. </h3>
                            </div>
                        @endif
                        
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection