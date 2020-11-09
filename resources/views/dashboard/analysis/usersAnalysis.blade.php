@extends('welcome')
@section('title','Dashboard')

@section('content-header')
    <h1>Users Statistics behavior at {{request()->session()->get('admin')->name}}</h1>
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <section class="col-sm-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Top 10 Most Booked Users
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                     style="position: relative; height: 300px;">
                                    <canvas id="top10"
                                            data-data="{{$users->pluck(['count'])}}"
                                            data-keys="{{$users->pluck(['name'])}}"
                                            style="height: 500px;"></canvas>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>

                <section class="col-lg-5 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Most Frequent Users Ages
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                     style="position: relative; height: 308px;">
                                    <canvas id="users"  style="height: 500px;"></canvas>
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
                    data: [{!! $ages[0] !!},{!! $ages[1] !!},{!! $ages[2] !!}] //$('#'+'users').data('data')
                }]
            }
        });


        var top10 = document.getElementById('top10').getContext('2d');
        var myPieChart = new Chart(top10, {
            type: 'bar',

            data:{
                labels: $('#'+'top10').data('keys'),
                datasets:[{
                    label:'Top 10',
                    backgroundColor:'rgb(55, 99, 132)',
                    data: $('#'+'top10').data('data')
                }]
            }
        });

    </script>

@endpush
