@extends('layouts.master-admin')
@section ('content')
<!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <!-- Start Widget -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-2">
                            <div class="mini-stat clearfix bx-shadow">
                                <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                                <div class="mini-stat-info text-right text-muted">
                                    <span class="counter">{{$count['userCount']}}</span>
                                    <a href="home/users">Users</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-2">
                            <div class="mini-stat clearfix bx-shadow">
                                <span class="mini-stat-icon bg-warning"><i class="md md-school"></i></span>
                                <div class="mini-stat-info text-right text-muted">
                                    <span class="counter">{{$count['collegeCount']}}</span>
                                    <a href="home/colleges">Colleges</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-2">
                            <div class="mini-stat clearfix bx-shadow">
                                <span class="mini-stat-icon bg-pink"><i class="md md-book"></i></span>
                                <div class="mini-stat-info text-right text-muted">
                                    <span class="counter">{{$count['degreeCount']}}</span>
                                    <a href="home/degrees">Degrees</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-2">
                            <div class="mini-stat clearfix bx-shadow">
                                <span class="mini-stat-icon bg-success"><i class="md md-question-answer"></i></span>
                                <div class="mini-stat-info text-right text-muted">
                                    <span class="counter">{{$count['questionCount']}}</span>
                                    <a href="home/questions">Questions</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-2">
                            <div class="mini-stat clearfix bx-shadow">
                                <span class="mini-stat-icon bg-primary"><i class="md md-vpn-key"></i></span>
                                <div class="mini-stat-info text-right text-muted">
                                    <span class="counter">{{$count['answerCount']}}</span>
                                    <a href="home/answers">Answers</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-2">
                            <div class="mini-stat clearfix bx-shadow">
                                <span class="mini-stat-icon bg-warning"><i class="md md-view-list"></i></span>
                                <div class="mini-stat-info text-right text-muted">
                                    <span class="counter">{{$count['resultCount']}}</span>
                                    <a href="home/results">Results</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-border panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Recommended Users per College</h3>
                                </div>
                                <div class="panel-body">
                                    <canvas id="bar" data-type="Bar"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- container -->
            </div> <!-- content -->
@endsection
