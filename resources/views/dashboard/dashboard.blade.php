@extends('welcome')
@section('title','Dashboard')

@section('content-header')
    <h1>Statistics behavior about {{request()->session()->get('admin')->name}}</h1>
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>

                            <p>New Bookings</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>New Followers</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44236</h3>
                            <p>Total Profile Visits</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>1265</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Booking Requests
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active"  style="background-color: #205B88" href="#revenue-chart" data-toggle="tab">Full Report</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                     style="position: relative; height: 300px;">
                                    <canvas id="BookingRequests" style="height: 500px;"></canvas>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->

                <section class="col-lg-5 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Most Frequent Users Ages
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" style="background-color: #205B88"  href="#revenue-chart" data-toggle="tab">Full Report</a>
                                    </li>
                                </ul>
                            </div>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                     style="position: relative; height: 308px;">
                                    <canvas id="users" style="height: 500px;"></canvas>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>

            </div>

            <div class="row">

                <section class="col-md-6 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Profit Analysis This Year
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active"  style="background-color: #205B88"  href="#revenue-chart" data-toggle="tab">Full Report</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                     style="position: relative; height: 300px;">
                                    <canvas id="profit" style="height: 500px;"></canvas>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>

                <section class="col-md-6 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Profit Comparing
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active"  style="background-color: #205B88"  href="#revenue-chart" data-toggle="tab">Full Report</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                     style="position: relative; height: 300px;">
                                    <canvas id="profitComparing" style="height: 500px;"></canvas>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>

            </div>


            <div class="row">

                <section class="col-md-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Most Booking requests regions
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active"  style="background-color: #205B88"  href="#revenue-chart" data-toggle="tab">Full Report</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                     style="position: relative; height: 400px;">
                                    <canvas id="regions" style="max-height: 350px;"></canvas>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>

                <section class="col-md-5 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Most Booked Assets
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" style="background-color: #205B88" href="#revenue-chart" data-toggle="tab">Full Report</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                     style="position: relative; height: 400px;">
                                    <canvas id="assets" style="max-height: 350px;"></canvas>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>

            </div>
            <div class="row">

                <section class="col-sm-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Top 10 Most Booked Users
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active"  style="background-color: #205B88;margin-right: 4px"  href="#revenue-chart" data-toggle="tab">Promote</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active"  style="background-color: #205B88"  href="#revenue-chart" data-toggle="tab">Full Report</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                     style="position: relative; height: 300px;">
                                    <canvas id="top10" style="height: 500px;"></canvas>
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
                labels: ['January', 'February', 'March', 'April', 'May'],
                datasets: [

                    {
                        label: 'Booking Requests This Year',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: '#6c757d',
                        data: [250, 300, 400, 390, 250]
                    }
                ]
            },
        });

        var UsersCanaves = document.getElementById('users').getContext('2d');
        var myPieChart = new Chart(UsersCanaves, {
            type: 'pie',

            data:{
                labels: [
                    'Under 25',
                    'Between 25&50 ',
                    'Above 50'
                ],
                datasets:[{
                    backgroundColor:['rgb(255, 99, 13)','rgb(55, 99, 132)','rgb(255, 9, 132)'],
                    data: [750, 550, 436]
                }]
            }
        });

        var profitCanaves = document.getElementById('profit').getContext('2d');
        var myPieChart = new Chart(profitCanaves, {
            type: 'bar',

            data:{
                labels: ['January', 'February', 'March', 'April'],
                datasets:[{
                    label:'Profit in EGP',
                    backgroundColor:'rgb(55, 99, 132)',
                    data: [4500, 3650, 5836,4520]
                }]
            }
        });

        var profitComparing = document.getElementById('profitComparing').getContext('2d');
        var myPieChart = new Chart(profitComparing, {
            type: 'line',

            data: {
                labels: ['January', 'February', 'March', 'April', 'May',
                    'June', 'July','August','September','October','November','December'],
                datasets: [

                    {
                        label: 'This Year',
                        borderColor: 'rgb(55, 99, 132)',
                        data: [4500, 3650, 5836,4520]
                    },
                    {
                        label: 'Last Year',
                        borderColor: 'rgb(255, 99, 132)',
                        data: [6000, 3000, 6000, 3200, 2000, 3500, 4500,7000, 2900, 2200, 4000, 5500]
                    }
                ]
            },
        });

        var areaCanaves = document.getElementById('regions').getContext('2d');
        var myPieChart = new Chart(areaCanaves, {
            type: 'pie',

            data:{
                labels: [
                    'Dokki',
                    'Nacer City',
                    'Sadat',
                    'Tahrer',
                    'Other'
                ],
                datasets:[{
                    backgroundColor:['rgb(255, 99, 13)','rgb(55, 99, 132)',
                        'rgb(255, 9, 132)','#ffe19a','rgb(111, 98, 141)'],
                    data: [750, 550, 436,520,200]
                }]
            }
        });

        var assetsCanaves = document.getElementById('assets').getContext('2d');
        var myPieChart = new Chart(assetsCanaves, {
            type: 'doughnut',

            data:{
                labels: [
                    'Private Offices',
                    'Meeting Rooms',
                    'Dedicated Desks',
                    'Shared Space',
                ],
                datasets:[{
                    cutoutPercentage:50,
                    backgroundColor:['#36a2eb','#ff6384',
                        '#ffe19a','rgb(55, 99, 132)'],
                    data: [450, 255, 700,1115]
                }]
            }
        });

        var top10 = document.getElementById('top10').getContext('2d');
        var myPieChart = new Chart(top10, {
            type: 'bar',

            data:{
                labels: ['Ahmed Ali','Mark George','Ali Omer', 'Alaa Nabil',
                    'Mina Magdy','Heba Ali','Omer Osama', 'Sara Magdy','Soah Khaled',
                    'George Nady'],
                datasets:[{
                    label:'Top 10',
                    backgroundColor:'rgb(55, 99, 132)',
                    data: [35, 17, 15,19,35, 26, 21,18,25,17]
                }]
            }
        });

    </script>

@endpush
