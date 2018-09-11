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
                                <h4 class="pull-left page-title">Rooms Table</h4>
                            </div>
                        </div>


                        <div class="panel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="m-b-30">
                                            <button data-toggle="modal" data-target="#roomModal" class="btn btn-primary waves-effect waves-light add">Add <i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <table id="roomTable" class="table table-bordered datatable table-striped">
                                    <thead>
                                        <tr>
                                            <th>Room Location</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rooms as $key)
                                        <tr class="gradeX">
                                          <td>{{$key->room_location}}</td>
                                          <td class="actions">
                                            <a class="edit" data-rel="{{$key->id}}" data-toggle="modal" data-target="#roomModal" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                            <a class="delete" data-rel="{{$key->id}}" data-toggle="modal" data-target="#deleteRoomModal" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                          </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end: page -->

                        </div> <!-- end Panel -->

                    </div> <!-- container -->

                </div> <!-- content -->
            </div>
            <!-- M O D A L S -->
            <div id="roomModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Rooms</h4>
                        </div>
                        <div class="modal-body">
                            <form id="roomForm" action="{{url('/room')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="RoomField-room_location" class="control-label">Room Location</label>
                                            <input type="text" class="form-control" id="RoomField-room_location" name="room_location">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Save Changes</button>
                                </div>
                                <input type='hidden' class='editMode' name='editMode' value=''/>
                                <input type='hidden' class="ed" name='editID' value=""/>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal -->
            <div id="deleteRoomModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Rooms</h4>
                        </div>
                        <div class="modal-body">
                            <form id="roomForm" action="{{url('/room')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-4">
                                            <label for="RoomField-room_location" class="control-label">Are you sure to delete?</label>
                                        <div class="form-group">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-info waves-effect waves-light">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                <input type='hidden' class='editMode' name='editMode' value=''/>
                                <input type='hidden' class="del" name='editID' value=""/>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal -->
<script type="text/­javascript" src="https://­ajax.googleapis.com/­ajax/libs/jquery/­3.3.1/jquery.min.js"></script>
@endsection
