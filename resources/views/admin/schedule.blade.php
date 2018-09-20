<?php /*dd($subjects);*/?>
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
                        <div class="col-sm-6">
                            <div class="m-b-30">
                                <button id="click{{$key->id}}" data-toggle="modal" data-target="#addSchedule" class="btn btn-primary waves-effect waves-light add">Add <i class="fa fa-plus"></i></button>
                                <button id="btnPrint_printSched{{$key->id}}" data-toggle="modal" data-target="#FNModal" class="btn btn-primary waves-effect waves-light">Print <i class="fa fa-print"></i></button>
                            </div>
                        </div>
                    </div>
                  <div id="print{{$key->id}}">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="pull-left page-title">{{$key->teacher_FName}} {{$key->teacher_MName}} {{$key->teacher_LName}}'s Subjects</h4>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-body">
                            <div id="initSched{{$key->id}}" class="notaschedule">
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </div> <!-- container -->
    </div> <!-- content -->
    <div id="addSchedule" class="modal fade schedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Subject</h4>
                </div>
                <div class="modal-body">
                    <form id="scheduleForm" enctype="multipart/form-data">
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
                                    <label for="sections" class="control-label">Section</label>
                                    <input type="text" class="form-control" id="section" name="sections">
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
                                  <select id="room{{$key->id}}" class="form-control form-white" data-placeholder="Choose a color..." name="room_location">
                                    @foreach($rooms as $value)
                                      <option value="{{$value->id}}">{{$value->room_location}}</option>
                                    @endforeach
                                  </select>
                              </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                            <button type="button" id="subjectSubmit" data-rel="" class="btn btn-info waves-effect waves-light subject" data-dismiss="modal">Save Changes</button>
                        </div>
                        <input type='hidden' id="addMode" name='mode' value="add"/>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
    <div id="subjectModals">

    </div>
@endsection
