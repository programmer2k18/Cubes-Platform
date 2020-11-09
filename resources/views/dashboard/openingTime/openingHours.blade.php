@extends('welcome')
@section('title','Opening Times')

@section('content-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('allOpeningTimes')}}">Opening Time</a></li>
@endsection

@section('content')


    <div class="row">
        <div class="col-sm-12">
            @include('dashboard.messages')
        </div>
    </div>

        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">All Opening Times</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>

                <div class="card-body">

                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th>
                                Day
                            </th>
                            <th>
                                From
                            </th>
                            <th>
                                To
                            </th>
                            <th style="">

                            </th>
                        </tr>
                        </thead>

                        <tbody>

                        @if(count($times) > 0)
                            @foreach($times as $time)

                                <tr id="{{$time->id}}">
                                    <td>
                                        {{ucfirst($time->day)}}
                                    </td>

                                    <td class="project_progress">
                                        {{$time->from}}
                                    </td>
                                    <td class="project_progress">
                                        {{$time->to}}
                                    </td>

                                    <td class="project-actions text-right">
                                        <a href="{{route('editOpeningTimeForm',$time->id)}}" class="btn btn-primary btn-sm" style="display: block;margin-bottom: 2px;">
                                            <i class="fas fa-edit">
                                            </i>
                                            Edit
                                        </a>
                                        <a href="{{route('deleteOpeningTime')}}" class="btn btn-danger btn-sm deleteAsset" data-id="{{$time->id}}" style="display: block">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>

                                </tr>

                            @endforeach
                        @else

                            <div class="col-sm-12 text-center">
                                <h3> There are no opening times added
                                    to your coworking space yet<br>
                                    Please add your coworking opening times to let people know.
                                </h3>
                            </div>

                        @endif



                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /.card -->
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
                url:"/dashboard/Opening_times/delete",
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





