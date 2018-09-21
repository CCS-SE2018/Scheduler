@extends('layouts.master-admin')

@section('content')
<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Rooms Assigned Table</h4>
                            </div>
                        </div>


                        <div class="panel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="m-b-30">
                                            <button id="btnPrint_printRoom" class="btn btn-primary waves-effect waves-light">Print <i class="fa fa-print"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div id="printRoom">
                                @foreach($rooms as $key)
                                    <table class="table table-bordered datatable table-striped">
                                        <h3>{{$key->room_location}}</h3>
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Instructor</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($subjects as $key2)
                                        @if($key->room_location==$key2->room_location)
                                            <tr class="gradeX">
                                            <td>{{$key2->subject_code}}</td>
                                            <td>{{$key2->teacher_FName}}</td>
                                            <td>{{$key2->schedule_time}}</td>
                                            </tr>
                                        @endif
                                        @endforeach
                                        
                                    </tbody>
                                    
                                    </table>
                                    
                                @endforeach
                                </div>
                            </div>
                            <!-- end: page -->

                        </div> <!-- end Panel -->

                    </div> <!-- container -->

                </div> <!-- content -->
            </div>
<script type="text/­javascript" src="https://­ajax.googleapis.com/­ajax/libs/jquery/­3.3.1/jquery.min.js"></script>
@endsection
