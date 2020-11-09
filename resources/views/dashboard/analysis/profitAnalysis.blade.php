@extends('welcome')
@section('title','Dashboard')

@section('content-header')
    <h1>Profit Statistics behavior about {{request()->session()->get('admin')->name}}</h1>
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->

            <div class="row">

                <section class="col-md-6 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Profit Analysis This Year
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                     style="position: relative; height: 300px;">
                                    <canvas id="profit"
                                            style="height: 500px;"></canvas>
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
            </div>

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection


@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>

        var profitCanaves = document.getElementById('profit').getContext('2d');
        var myPieChart = new Chart(profitCanaves, {
            type: 'bar',

            data:{
                labels: {!! $currentYear->keys() !!},
                datasets:[{
                    label:'Profit in EGP',
                    backgroundColor:'rgb(55, 99, 132)',
                    data: {!! $currentYear->values() !!}
                }]
            }
        });

        var profitComparing = document.getElementById('profitComparing').getContext('2d');
        var myPieChart = new Chart(profitComparing, {
            type: 'line',

            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May',
                    'Jun', 'Jul','Aug','Sep','Oct','Nov','Dec'],
                datasets: [

                    {
                        label: 'This Year',
                        borderColor: 'rgb(55, 99, 132)',

                        data: {!! $currentYear->values() !!}
                    },
                    {
                        label: 'Last Year',
                        borderColor: 'rgb(255, 99, 132)',

                        data: {!! $lastYear->values() !!}
                    }
                ]
            },
        });


    </script>

@endpush
