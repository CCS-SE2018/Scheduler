@extends ('layouts.master-admin')

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
                    <h4 class="pull-left page-title">Teachers Table</h4>
                </div>
            </div>


            <div class="panel">

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="m-b-30">
                                <button data-toggle="modal" data-target="#teacherModal" class="btn btn-primary waves-effect waves-light">Add <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <table id="teacherTable" class="table table-bordered datatable table-striped">
                            <thead>
                                <tr>
                                    <th>Profile Picture</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teachers as $key)
                                <tr class="gradeX">
                                    <td>{{$key->profile_picture}}</td>
                                    <td>{{$key->teacher_FName}}</td>
                                    <td>{{$key->teacher_MName}}</td>
                                    <td>{{$key->teacher_LName}}</td>
                                  <td class="actions">
                                    <a class="edit" data-rel="{{$key->id}}" data-toggle="modal" data-target="#teacherModal" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                    <a class="delete" data-rel="{{$key->id}}" data-toggle="modal" data-target="#deleteTeacherModal" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                  </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
                <!-- end: page -->

            </div> <!-- end Panel -->

        </div> <!-- container -->

        <div id="teacherModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Teacher</h4>
                    </div>
                    <div class="modal-body">
                      <form id="teacherForm" action="{{url('/addTeacher')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="TeacherField-profile_picture" class="control-label">Instructor</label>
                                    <input type="text" class="form-control" id="TeacherField-profile_picture" name="profile_picture">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="TeacherField-FName" class="control-label">First Name</label>
                                    <input type="text" class="form-control" id="TeacherField-FName" name="teacher_FName">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="TeacherField-MName" class="control-label">Middle Name</label>
                                    <input type="text" class="form-control" id="TeacherField-MName" name="teacher_MName">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="TeacherField-LName" class="control-label">Last Name</label>
                                    <input type="text" class="form-control" id="TeacherField-LName" name="teacher_LName">
                                </div>
                            </div>
                        </div>

                    </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                      </div>
                      <input type='hidden' class='editMode' name='editMode' value=''/>
                      <input type='hidden' class="ed" name='editID' value=""/>
                    </form>
                </div>
            </div>
        </div><!-- /.modal -->
        <div id="deleteTeacherModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Rooms</h4>
                        </div>
                        <div class="modal-body">
                            <form id="roomForm" action="{{url('/addTeacher')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-4">
                                            <label class="control-label">Are you sure to delete?</label>
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

    </div> <!-- content -->
@endsection
