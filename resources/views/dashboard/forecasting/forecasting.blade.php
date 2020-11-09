@extends('welcome')
@section('title','Forecasting')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('forecastingView')}}">
            Forecasting</a></li>
@endsection

@section('content-header')
    Forecasting regarding next month booking requests.
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li style="margin-right: 5px;" class="nav-item">
                                    <a class="nav-link"  data-toggle="tab">Forecasting <br/>Filters</a>
                                </li>
                                <li class="nav-item" style="margin-right: 5px;">
                                    <div class="form-group">
                                        <label>Used Data Period</label>
                                        <select class="custom-select" id="data_period">
                                            <option value="all">All Previous Data</option>
                                            <option value="12">Last 12 Months</option>
                                            <option value="6">Last 6 Months</option>
                                            <option value="range">Custom range</option>

                                        </select>
                                    </div>
                                </li>

                                <li style="margin-right: 5px; display: none;" class="nav-item">
                                    <label>From</label>
                                    <div class="input-group date" id="timepicker">
                                        <input type="date"  name="from" id="fromDate"
                                               class="form-control"  value="{{old('from')}}" required/>

                                    </div>
                                </li>

                                <li style="margin-right: 5px; display: none;" class="nav-item">
                                    <label>to</label>
                                    <div class="input-group date" id="timepicker">
                                        <input type="date"  name="to" id="toDate"
                                               class="form-control"  value="{{old('to')}}" required/>
                                    </div>
                                </li>

                                <li class="nav-item" style="margin-right: 5px;">
                                    <div class="form-group">
                                        <label>Forecasted Resource</label>
                                        <select  class="custom-select" id="forecasted_resource">
                                            <option value="all">All Resources</option>
                                            <option value="Private Offices">Private Offices</option>
                                            <option value="Meeting Rooms">Meeting Rooms</option>
                                            <option value="Shared Space">Shared Space</option>
                                        </select>
                                    </div>
                                </li>

                                <li class="nav-item" style="margin-right: 5px;">
                                    <button class="btn btn-dark" style="margin-top: 32px">Apply</button>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <div class="tab-content">

                                <div class="active tab-pane">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">


                                    </div>

                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('scripts')

    <script>
        $(document).ready(function () {
            'use strict';
            $(document).on('click', '.nav-item .btn', function (e) {
                var res = $('#forecasted_resource').val(),
                    data_period = $('#data_period').val();

                jQuery.ajax({
                    url:"/dashboard/filtered_forecasting",
                    type:"get",
                    data:{"data_period":data_period,"resource":res},
                    success:function(data){
                        if ($('.timeline-inverse').children().length >0){
                            $('.timeline-inverse').children().remove();
                        }
                        $.map(data, function(item){

                            var child = '<div class="time-label">\n' +
                                ' <span class="bg-danger">\n' +
                                ' '+item.resource+'\n' +
                                '</span>\n' +
                                '</div>\n' +
                                '<!-- /.timeline-label -->\n' +
                                '<!-- timeline item -->\n' +
                                '<div>\n' +
                                '<i class="fas fa-envelope bg-primary"></i>\n' +
                                '\n' +
                                '<div class="timeline-item">\n' +
                                '\n' +
                                ' <h3 class="timeline-header"><a href="#">Highlight</a> For '+item.resource+' booking requests next month</h3>\n' +
                                '\n' +
                                '<div class="timeline-body">\n' +
                                '<p style="display: inline-block">Expected booking requests next month\n'+
                                '<span style="font-weight:bolder; font-size: 22px;padding: 6px;\n'+
                                'background-color: #9affc6;border-radius: 7px ;border: 1.2px solid darkslategray">\n'+
                                ' '+Math.ceil(item.value) + '\n'+
                                '</span>  Requests</p>\n'+
                                ' </div>\n' +
                                ' </div>\n' +
                                ' </div>\n' +
                                '';
                            $('.timeline-inverse').append(child);
                        });
                    },
                    error:function (error){
                        console.log(error);
                    }
                });
            });
        });
    </script>

@endpush