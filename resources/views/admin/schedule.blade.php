@extends('layouts.master-admin')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
          <div class="row">
              <div class="col-sm-12">
                  <h4 class="pull-left page-title">Schedules</h4>
              </div>
          </div>
          <div class="row port">
              @foreach($teachers as $key)
              <div class="portfolioContainer">
                  <div class="col-sm-2 col-lg-2 col-md-2 webdesign illustrator">
                      <div class="gal-detail thumb">
                          <a href="#sched{{$key->id}}" class="subSched" data-toggle="modal">
                              <img class="pics" src="public/images/uploads/{{$key->profile_picture}}" class="thumb-img" alt="work-thumbnail" style="width:200px;height:200px;">
                          </a>
                          <h4>{{$key->teacher_FName}} {{$key->teacher_MName}} {{$key->teacher_LName}}</h4>
                      </div>
                  </div>
                </div>
                @endforeach
            </div>
            @foreach($teachers as $key)
            <div id="sched{{$key->id}}" class="modal fade teacherSchedule">
              <div class="modal-dialog" style="width:70%;">
                <div class="modal-content">
                  <div class="row">
                      <div class="col-sm-12">
                          <h4 class="pull-left page-title">{{$key->teacher_FName}} {{$key->teacher_MName}} {{$key->teacher_LName}}'s Subjects</h4>
                      </div>
                  </div>
                  <div class="panel">
                      <div class="panel-body">
                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="m-b-30">
                                    <button id="clik" data-toggle="modal" data-target="#scheduleModal{{$key->id}}" class="btn btn-primary waves-effect waves-light add">Add <i class="fa fa-plus"></i></button>
                                  </div>
                              </div>
                          </div>
                          <table class="table table-bordered datatable table-striped schedule">
                            <thead>
                                <tr>
                                    <th>Subject Code</th>
                                    <th>Subject Name</th>
                                    <th>Section</th>
                                    <th>Subject Type</th>
                                    <th>Units</th>
                                    <th>Day</th>
                                    <th>Time</th>
                                    <th>Room</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($subjects as $subs)
                              <tr class="gradeX">
                                  <td>{{$subs->subject_code}}</td>
                                  <td>{{$subs->subject_name}}</td>
                                  <td>{{$subs->section}}</td>
                                  <td>{{$subs->subject_type}}</td>
                                  <td>{{$subs->units}}</td>
                                  <td>{{$subs->schedule_day}}</td>
                                  <td>{{$subs->schedule_time}}</td>
                                  <td>{{$subs->room_location}}</td>
                                <td class="actions">
                                  <a class="edit" data-rel="{{$subs->id}}" data-toggle="modal" data-target="#teacherModal" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                  <a class="delete" data-rel="{{$subs->id}}" data-toggle="modal" data-target="#deleteScheduleModal" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </div> <!-- container -->
    </div> <!-- content -->
    @foreach($teachers as $key)
    <div id="scheduleModal{{$key->id}}" class="modal fade schedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Subject</h4>
                </div>
                <div class="modal-body">
                    <form id="scheduleForm{{$key->id}}" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="subject_code" class="control-label">Subject Code</label>
                                    <input type="text" class="form-control" id="subject_code" name="subject_code">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="subject_name" class="control-label">Subject Name</label>
                                    <input type="text" class="form-control" id="subject_name" name="subject_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sections" class="control-label">Sections</label>
                                    <input type="text" class="form-control" id="sections" name="sections">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="subject_type" class="control-label">Subject Type</label>
                                  <input type="text" class="form-control" id="subject_type" name="subject_type">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="units" class="control-label">Units</label>
                                  <input type="number" class="form-control" id="units" name="units" min="3" max="3">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="day" class="control-label">Day</label>
                                  <input type="text" class="form-control" id="day" name="day">
                              </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="time" class="control-label">Time</label>
                                  <input type="text" class="form-control" id="time" name="time">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="room_location" class="control-label">Room</label>
                                  <select class="form-control form-white" data-placeholder="Choose a color..." name="room_location">
                                    @foreach($rooms as $value)
                                      <option value="{{$value->id}}">{{$value->room_location}}</option>
                                    @endforeach
                                  </select>
                              </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                            <button type="button" id="subjectSubmit{{$key->id}}" class="btn btn-info waves-effect waves-light subject" data-dismiss="modal">Save Changes</button>
                        </div>
                        <input type='hidden' class='editMode' name='editMode' value=''/>
                        <input type='hidden' class="ed" name='editID' value=""/>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
    @endforeach
    <div id="deleteScheduleModal" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Rooms</h4>
                </div>
                <div class="modal-body">
                    <form id="roomForm" action="{{url('/addRoom')}}" method="post" enctype="multipart/form-data">
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
@endsection
