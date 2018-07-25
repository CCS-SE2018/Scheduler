@extends('layouts.master-admin')
@section('content')


  <div class="content-page">
    <div class="content">
        <div class="container">
            <div class="col-md-6">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">Main Menu</h3>
                  </div>
                  <div class="col-md-6">
                    <div class="panel-body">
                      <a href="{{url('/schedules')}}" class="btn btn-lg btn-primary btn-block waves-effect waves-light">
                          <i class="fa fa-plus"></i> Create New Schedule
                      </a>

                      <!-- Delete Schedule modal must be edited -->
                      <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-lg btn-danger btn-block waves-effect waves-light">
                          <i class="fa fa-minus"></i> Delete Schedule
                      </a>
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
  </div>
@endsection
