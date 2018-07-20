@extends('layouts.master')
@section('content')
<div class="wrapper-page">
    <div class="panel panel-color panel-primary panel-pages">
        <div class="panel-heading bg-img">
            <div class="bg-overlay"></div>
            <h3 class="text-center m-t-10 text-white"> Sign In to <strong>The Scheduler</strong> </h3>
        </div>


        <div class="panel-body">
        <form class="form-horizontal m-t-20" method="POST" action="{{url('/signin')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control input-lg" id="username" type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control input-lg" id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                </div>
            </div>

            <div class="form-group text-center m-t-40">
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                </div>
            </div>

            <!-- <div class="form-group m-t-30">
                <div class="col-sm-12 text-center">
                    <a href="{{url('/register')}}">Create an account</a>
                </div>
            </div> -->

            @include('layouts.errors')
        </form>
        </div>

    </div>
</div>
@endsection
