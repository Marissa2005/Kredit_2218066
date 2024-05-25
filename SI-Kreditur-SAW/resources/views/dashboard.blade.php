@extends('layout')
@section('content')
<div class="col-sm-12">
    <div class="alert  alert-success alert-dismissible fade show" role="alert">
        Selamat Datang {{ session('user.nama') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>


<div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-flat-color-1">
        <div class="card-body pb-0">
            <div class="dropdown float-right">
                <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button"
                    id="dropdownMenuButton1" data-toggle="dropdown">
                    <i class="fa fa-cog"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <div class="dropdown-menu-content">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <h4 class="mb-0">
                <span class="count">10468</span>
            </h4>
            <p class="text-light">Members online</p>

            <div class="chart-wrapper px-0" style="height:100px;" height="100">
                <canvas id="widgetChart1"></canvas>
            </div>

        </div>

    </div>
</div>
<!--/.col-->

<div class="col-lg-3 col-md-6">
    <div class="social-box facebook">
        <i class="fa fa-facebook"></i>
        <ul>
            <li>
                <span class="count">40</span> k
                <span>friends</span>
            </li>
            <li>
                <span class="count">450</span>
                <span>feeds</span>
            </li>
        </ul>
    </div>
    <!--/social-box-->
</div>
<!--/.col-->


<div class="col-lg-3 col-md-6">
    <div class="social-box twitter">
        <i class="fa fa-twitter"></i>
        <ul>
            <li>
                <span class="count">30</span> k
                <span>friends</span>
            </li>
            <li>
                <span class="count">450</span>
                <span>tweets</span>
            </li>
        </ul>
    </div>
    <!--/social-box-->
</div>
<!--/.col-->


<div class="col-lg-3 col-md-6">
    <div class="social-box linkedin">
        <i class="fa fa-linkedin"></i>
        <ul>
            <li>
                <span class="count">40</span> +
                <span>contacts</span>
            </li>
            <li>
                <span class="count">250</span>
                <span>feeds</span>
            </li>
        </ul>
    </div>
    <!--/social-box-->
</div>
<!--/.col-->


<div class="col-lg-3 col-md-6">
    <div class="social-box google-plus">
        <i class="fa fa-google-plus"></i>
        <ul>
            <li>
                <span class="count">94</span> k
                <span>followers</span>
            </li>
            <li>
                <span class="count">92</span>
                <span>circles</span>
            </li>
        </ul>
    </div>
    <!--/social-box-->
</div>
<!--/.col-->

<div class="col-xl-6">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <h4 class="card-title mb-0">Traffic</h4>
                    <div class="small text-muted">May 2024</div>
                </div>
                <!--/.col-->
                <div class="col-sm-8 hidden-sm-down">
                    <button type="button" class="btn btn-primary float-right bg-flat-color-1"><i
                            class="fa fa-cloud-download"></i></button>
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-3" data-toggle="buttons" aria-label="First group">
                            <label class="btn btn-outline-secondary">
                                <input type="radio" name="options" id="option1"> Day
                            </label>
                            <label class="btn btn-outline-secondary active">
                                <input type="radio" name="options" id="option2" checked=""> Month
                            </label>
                            <label class="btn btn-outline-secondary">
                                <input type="radio" name="options" id="option3"> Year
                            </label>
                        </div>
                    </div>
                </div>
                <!--/.col-->


            </div>
            <!--/.row-->
            <div class="chart-wrapper mt-4">
                <canvas id="trafficChart" style="height:100px;" height="100"></canvas>
            </div>

        </div>
    </div>
</div>
<!--/.col-->




<div class="card-footer">
    <ul>
        <li>
            <div class="text-muted">Visits</div>
            <strong>29.703 Users (40%)</strong>
            <div class="progress progress-xs mt-2" style="height: 5px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 40%;" aria-valuenow="40"
                    aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </li>
        <li class="hidden-sm-down">
            <div class="text-muted">Unique</div>
            <strong>24.093 Users (20%)</strong>
            <div class="progress progress-xs mt-2" style="height: 5px;">
                <div class="progress-bar bg-info" role="progressbar" style="width: 20%;" aria-valuenow="20"
                    aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </li>
        <li>
            <div class="text-muted">Pageviews</div>
            <strong>78.706 Views (60%)</strong>
            <div class="progress progress-xs mt-2" style="height: 5px;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60"
                    aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </li>
        <li class="hidden-sm-down">
            <div class="text-muted">New Users</div>
            <strong>22.123 Users (80%)</strong>
            <div class="progress progress-xs mt-2" style="height: 5px;">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 80%;" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </li>
        <li class="hidden-sm-down">
            <div class="text-muted">Bounce Rate</div>
            <strong>40.15%</strong>
            <div class="progress progress-xs mt-2" style="height: 5px;">
                <div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0"
                    aria-valuemax="100"></div>
            </div>
        </li>
    </ul>
</div>
@endsection