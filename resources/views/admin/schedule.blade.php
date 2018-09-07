@extends('layouts.master-admin')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
          <div class="row port">
              @foreach($teachers as $key)
              <div class="portfolioContainer">
                  <div class="col-sm-2 col-lg-2 col-md-2 webdesign illustrator">
                      <div class="gal-detail thumb">
                          <a href="#sched1" data-toggle="modal" title="Schedule-1">
                              <img class="pics" src="public/images/uploads/{{$key->profile_picture}}" class="thumb-img" alt="work-thumbnail" style="width:200px;height:200px;">
                          </a>
                          <h4>{{$key->teacher_FName}} {{$key->teacher_MName}} {{$key->teacher_LName}}</h4>
                      </div>
                  </div>
                </div>
                @endforeach
            </div>
            <div id="sched1" class="modal fade">
              <div class="modal-dialog" style="width:70%;">
                <div class="modal-content">
                  <div class="row">
                      <div class="col-sm-12">
                          <h4 class="pull-left page-title">Calendar</h4>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="row">
                              <div class="col-md-9">
                                  <div class="panel panel-default">
                                      <div class="panel-body">
                                          <div class="row">
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                  <div id="calendar"></div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div> <!-- end col -->

                              <div class="col-md-3">
                                  <div class="widget">
                                      <div class="widget-body">
                                          <div class="row">
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                  <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-lg btn-primary btn-block waves-effect waves-light">
                                                      <i class="fa fa-plus"></i> Create New Subject
                                                  </a>
                                                  <div id="external-events" class="m-t-20">
                                                      <br>
                                                      @foreach($subjects as $key)
                                                      <div class="external-event bg-inverse" data-class="bg-inverse" style="position: relative;">
                                                          <i class="fa fa-move"></i>{{$key->subject_name}}
                                                      </div>
                                                      @endforeach
                                                  </div>
                                                  <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-lg btn-success btn-block waves-effect waves-light">
                                                      <i class="fa fa-plus"></i> Archive Schedule
                                                  </a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div> <!-- end col-->
                          </div>  <!-- end row -->
                          <!-- BEGIN MODAL -->
                      </div>
                      <!-- end col-12 -->
                  </div> <!-- end row -->
                </div>
              </div>
            </div>
            <div class="modal fade" id="event-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><strong>Manage</strong> my events</h4>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                            <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Add Category -->
            <div class="modal fade" id="add-category">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><strong>Add</strong> a subject</h4>
                        </div>
                        <div id="schedSetup" class="modal-body">
                            <form role="form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Subject Name</label>
                                        <input class="form-control form-white" id="" placeholder="Enter name" type="text" name="subject_name"/>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">No. of Sections</label>
                                        <input class="form-control form-white" id="" min="0" max="13" placeholder="Enter number" type="number" name="sections"/>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                      <label class="control-label">Subject Type</label>
                                      <select class="form-control form-white" id="" data-placeholder="Select Type" name="subject_type">
                                          <option value="lecture">Lecture</option>
                                          <option value="leclab">Lecture and Laboratory</option>
                                      </select>
                                  </div>
                                  <div class="col-md-4">
                                      <label class="control-label">Year Level</label>
                                      <input class="form-control form-white" id="" placeholder="Enter year level" type="text" name="year_level"/>
                                  </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success waves-effect waves-light addSubject" data-dismiss="modal">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Page-Title -->
        </div> <!-- container -->
    </div> <!-- content -->
@endsection
