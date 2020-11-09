@extends('welcome')
@section('title','Dashboard')

@section('content-header')
    <h1>Booking Statistics behavior about {{ucfirst(trim(request()->session()->get('admin')->name))}}</h1>
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>70</h3>

                            <p>New Bookings</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>




                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$cancelledRequests}}<sup style="font-size: 20px"></sup></h3>

                            <p>Cancelled Bookings</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-minus-square"></i>
                        </div>
                    </div>
                </div>






                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>33276</h3>
                            <p>Total Profile Visits</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-sm-12 col-md-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Booking Requests
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                     style="position: relative; height: 300px;">
                                    <canvas id="BookingRequests" data-keys="{{$booking->keys()}}"
                                            data-data="{{$booking->values()}}"   style="height: 500px;"></canvas>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
                <section class="col-md-5 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Most Booked Assets
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                     style="position: relative; height: 300px;">
                                    <canvas id="assets"  data-keys="{{$mostAssets->keys()}}"
                                            data-data="{{$mostAssets->values()}}" style="max-height: 350px;"></canvas>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>

            </div>


            <div class="row">

                <section class="col-md-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Most Booking requests regions
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                     style="position: relative; height: 400px;">
                                    <canvas id="regions" data-keys="{{$mostRegions->pluck(['city'])}}"
                                            data-data="{{$mostRegions->pluck(['count'])}}" style="max-height: 350px;"></canvas>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection


@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>

        var ctx = document.getElementById('BookingRequests').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels:$('#'+'BookingRequests').data('keys'),
                datasets: [

                    {
                        label: 'Booking Requests This Year',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: '#6c757d',
                        data: $('#'+'BookingRequests').data('data')
                    }
                ]
            },
        });

        var assetsCanaves = document.getElementById('assets').getContext('2d');
        var myPieChart = new Chart(assetsCanaves, {
            type: 'doughnut',

            data:{
                labels:$('#'+'assets').data('keys') ,
                datasets:[{
                    cutoutPercentage:50,
                    backgroundColor:['#36a2eb','#ff6384',
                        '#ffe19a','rgb(55, 99, 132)'],
                    data: $('#'+'assets').data('data')
                }]
            }
        });

        var areaCanaves = document.getElementById('regions').getContext('2d');
        var myPieChart = new Chart(areaCanaves, {
            type: 'pie',

            data:{
                labels: $('#'+'regions').data('keys'),
                datasets:[{
                    backgroundColor:['rgb(255, 99, 13)','rgb(55, 99, 132)',
                        'rgb(255, 9, 132)','#ffe19a','rgb(111, 98, 141)','rgb(88, 49, 50)'],
                    data: $('#'+'regions').data('data')
                }]
            }
        });

    </script>

@endpush

