@extends('litepost::admin')

@section('title', 'Dashboard')

@section('main')
Main
@endsection

@section('main')
<section class="section breadcrumb">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="google_data">
    <div class="container-fluid">
        <div class="row">
        
            <div class="col-md-4 col-sm-6 col-xs-12 cardcol">
                <!-- TODAY -->
                <div class="card stats">
                    <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p class="value">{{$currentday['sessions'] == null ? "0" : $currentday['sessions']}}</p>
                        <footer class="blockquote-footer">USERS</footer>
                    </blockquote>
                    <blockquote class="blockquote mb-0">
                        <p class="value">{{$currentday['pageviews'] == null ? "0" : $currentday['pageviews']}}</p>
                        <footer class="blockquote-footer">VIEWS</footer>
                    </blockquote>
                    </div>
                    <div class="card-header dashboard">
                    TODAY
                    </div>
                </div>
            </div>    

            <!-- WEEK -->
            <div class="col-md-4 col-sm-6 col-xs-12 cardcol"> 
                    <div class="card stats">
                    <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p class="value">{{$currentweek['sessions'] == null ? "0" : $currentweek['sessions'] }}</p>
                        <footer class="blockquote-footer">USERS</footer>
                    </blockquote>
                    <blockquote class="blockquote mb-0">
                        <p class="value">{{$currentweek['pageviews'] == null ? "0" : $currentweek['pageviews'] }}</p>
                        <footer class="blockquote-footer">VIEWS</footer>
                    </blockquote>
                    </div>
                    <div class="card-header dashboard">
                        LAST WEEK
                    </div>
                </div>
            </div>

            <!-- MONTH -->
            <div class="col-md-4 col-sm-6 col-xs-12 cardcol"> 
                <div class="card stats">
                    <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p class="value">{{$currentmonth['sessions'] == null ? "0" : $currentmonth['sessions']}}</p>
                        <footer class="blockquote-footer">USERS</footer>
                    </blockquote>
                    <blockquote class="blockquote mb-0">
                        <p class="value">{{$currentmonth['pageviews'] == null ? "0" : $currentmonth['pageviews']}}</p>
                        <footer class="blockquote-footer">VIEWS</footer>
                    </blockquote>
                    </div>
                    <div class="card-header dashboard">
                    LAST MONTH
                    </div>
                </div>
            </div>

            <!-- YEAR -->
            <div class="col-md-4 col-sm-6 col-xs-12 cardcol"> 
                <div class="card stats">
                    <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p class="value">{{$currentyear['sessions'] == null ? "0" : $currentyear['sessions']}}</p>
                        <footer class="blockquote-footer">USERS</footer>
                    </blockquote>
                    <blockquote class="blockquote mb-0">
                        <p class="value">{{$currentyear['pageviews'] == null ? "0" : $currentyear['pageviews']}}</p>
                        <footer class="blockquote-footer">VIEWS</footer>
                    </blockquote>
                    </div>
                    <div class="card-header dashboard">
                    LAST YEAR
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
