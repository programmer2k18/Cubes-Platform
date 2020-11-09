@extends('welcome')
@section('title','Users')

@section('content-header','Attract more users by great offers and promotions')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('peopleToSendOffers','desc')}}">Users</a></li>
@endsection

@section('content')


    <div class="card card-primary">

        <div class="card-header">
            <p class="card-title">Select User to Promote</p>
            <form id="selectForm" method="get" style="float: right">
                @csrf
                <select class="custom-select" name="usersType" required>
                    <option value="asc" {{$order=='asc'?'selected':''}}>Less Booked Users</option>
                    <option value="desc" {{$order=='desc'?'selected':''}}>Most Booked Users</option>
                    <option value="neverBooked" {{$order=='neverBooked'?'selected':''}}>Never Booked Users</option>
                    <option value="nearestUsers" {{$order=='nearestUsers'?'selected':''}}>Nearest Users</option>
                </select>
            </form>
        </div>


        <div class="card-body">

            <div class="row">
                <div class="col-sm-12">
                    <div  style="float: right">
                        {{$users->links()}}
                    </div>
                </div>
            </div>

            <div class="row">
                @if( count($users) > 0)
                    @foreach($users as $user)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">

                            <div class="card bg-light" style="width: 100%">
                                <div class="card-body pt-0" style="margin-top: 15px">
                                    <div class="row">

                                        <div class="col-7">
                                            <h2 class="lead"><b>{{ucfirst($user->name)}}</b></h2>
                                            @if($order == 'asc' or $order == 'desc')
                                                <p class="text-muted text-sm"><b><i class="fas fa-lg fa-book"></i> </b># Of Bookings: {{$user->bookCount}} times</p>
                                            @endif
                                            <p class="text-muted text-sm"><b><i class="fas fa-lg fa-envelope"></i> </b>Email: {{$user->email}} </p>
                                            <p class="text-muted text-sm"><b><i class="fas fa-lg fa-birthday-cake"></i> </b>Age: {{$user->age}} Years old </p>
                                            <p class="text-muted text-sm"><b><i class="fas fa-lg fa-user"></i> </b>Gender: {{$user->gender}} </p>

                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                                    Address: {{$user->street}}, {{$user->city}}, {{$user->governorate}}
                                                </li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{$user->phone??'Not Found'}}</li>
                                            </ul>
                                        </div>

                                        <div class="col-5 text-center">
                                            @if($user->image)
                                                <img src="{{asset('storage/'.$user->image)}}" style="max-width: 60px;max-height: 60px" class="img-circle img-fluid">
                                            @else
                                                <img src="{{asset('admin/default_images/AdminLTELogo.png')}}" style="max-width: 60px;max-height: 60px" class="img-circle img-fluid">
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="{{route('getComposeForm',[\request()->session()->get('admin')->id, $user->email])}}" class="btn btn-sm bg-teal">
                                            <i class="fas fa-envelope"></i> Mail
                                        </a>
                                        <a href="{{route('addGeneralOfferForm',$user->id)}}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-plus-square"></i> Send Offer
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    @endforeach
                @else
                    <div class="col-sm-12">
                        <h3 style="text-align: center">No users available yet. </h3>
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div  style="float: right">
                        {{$users->links()}}
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection

@push('scripts')
    <script>
        $('.custom-select').change(function (e) {
            var form = $('form').get(0);
            form.setAttribute('action',
                'http://127.0.0.1:8000/dashboard/offers/customized/people/'
                +$('.custom-select').val());
            form.submit();
        });
    </script>
@endpush