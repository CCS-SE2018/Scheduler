@extends('layouts.master')
@section('content')
<div class="wrapper-page">
    <div class="panel panel-color panel-primary panel-pages">
        <div class="panel-heading bg-img">
            <div class="bg-overlay"></div>
           <h3 class="text-center m-t-10 text-white"> Create a new Account </h3>
        </div>


        <div class="panel-body">
        <form class="form-horizontal m-t-20" method="POST" action="{{url('/store')}}">
            {{csrf_field()}}

            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control input-lg" id="instructor" name="instructor" type="text" placeholder="Instructor">
                </div>
            </div>

            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control input-lg" id="username" name="username" type="text" placeholder="Username">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control input-lg" id="password" name="password" type="password" placeholder="Password">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control input-lg" id="password_confirmation" name="password_confirmation" type="password" placeholder="Password Confirmation">
                </div>
            </div>

            <div class="form-group">
                @include('layouts.errors')
            </div>

            <div class="form-group text-center m-t-40">
                <div class="col-xs-12">
                    <button class="btn btn-primary waves-effect waves-light btn-lg w-lg" type="submit">Register</button>
                </div>
            </div>

            <div class="form-group m-t-30">
                <div class="col-sm-12 text-center">
                    <a href="{{url('/')}}">Already have account?</a>
                </div>
            </div>
        </form>
        </div>

    </div>
</div>
@endsection
