@extends('layouts.master-admin')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
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
                                            <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-lg btn-primary btn-block waves-effect waves-light">
                                                <i class="fa fa-plus"></i> Create New Room
                                            </a>
                                            <div id="external-events" class="m-t-20">
                                                <br>
                                                <p>Drag and drop your event or click in the calendar</p>
                                                <div class="external-event bg-inverse" data-class="bg-inverse" style="position: relative;">
                                                    <i class="fa fa-move"></i>My Event One
                                                </div>
                                                <div class="external-event bg-danger" data-class="bg-danger" style="position: relative;">
                                                    <i class="fa fa-move"></i>My Event Two
                                                </div>
                                                <div class="external-event bg-primary" data-class="bg-primary" style="position: relative;">
                                                    <i class="fa fa-move"></i>My Event Three
                                                </div>
                                                <div class="external-event bg-purple" data-class="bg-purple" style="position: relative;">
                                                    <i class="fa fa-move"></i>My Event Four
                                                </div>
                                            </div>

                                            <!-- checkbox -->
                                            <div class="checkbox checkbox-primary m-t-40">
                                                <input id="drop-remove" type="checkbox">
                                                <label for="drop-remove">
                                                    Remove after drop
                                                </label>
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
                                    <h4 class="modal-title"><strong>Add</strong> a category</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label">Subject Name</label>
                                                <input class="form-control form-white" id="" placeholder="Enter name" type="text" name="category-name"/>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label">No. of Sections</label>
                                                <input class="form-control form-white" id="" placeholder="Enter number" type="text" name="category-name"/>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Subject Type</label>
                                                <select class="form-control form-white" id="" data-placeholder="Select Type" name="category-color">
                                                    <option value="success">Lecture</option>
                                                    <option value="danger">Lecture and Laboratory</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label">Year Level</label>
                                                <input class="form-control form-white" id="" placeholder="Enter year level" type="text" name="category-name"/>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MODAL -->
                </div>
                <!-- end col-12 -->
            </div> <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection
