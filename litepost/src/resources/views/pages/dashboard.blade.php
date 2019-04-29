@extends('litepost::admin')

@section('title', 'Dashboard')

@section('main')
<section class="section" style="background-color: #e9ecef;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('litepost.dashboard') }}">Admin</a></li>
                </ol>
            </div><!-- ./col -->
        </div><!-- ./row -->
    </div><!-- ./container-fluid -->
</section><!-- ./section -->

<section class="google_data">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6 col-sm-6 col-xs-12 cardcol mt-5">
                <!-- TODAY -->
                <div class="card stats">
                    <div class="card-body">
                        <div class="py-2">
                            <span class="value">{{$currentday['sessions'] == null ? "0" : $currentday['sessions']}}</span>
                            <span class="blockquote-footer" style="display: inline;">USERS</span>
                        </div>
                        <div class="py-2">
                            <span class="value">{{$currentday['pageviews'] == null ? "0" : $currentday['pageviews']}}</span>
                            <span class="blockquote-footer" style="display: inline;">VIEWS</span>
                        </div>
                    </div>
                    <div class="card-header dashboard">
                    TODAY
                    </div>
                </div>
            </div>   

            <!-- WEEK -->
            <div class="col-md-6 col-sm-6 col-xs-12 cardcol mt-5">
                <div class="card stats">
                    <div class="card-body">
                        <div class="py-2">
                            <span class="value">{{$currentweek['sessions'] == null ? "0" : $currentweek['sessions'] }}</span>
                            <span class="blockquote-footer" style="display: inline;">USERS</span>
                        </div>
                        <div class="py-2">
                            <span class="value">{{$currentweek['pageviews'] == null ? "0" : $currentweek['pageviews'] }}</span>
                            <span class="blockquote-footer" style="display: inline;">VIEWS</span>
                        </div>
                    </div>
                    <div class="card-header dashboard">
                        LAST WEEK
                    </div>
                </div>
            </div> 

            <!-- MONTH -->
            <div class="col-md-6 col-sm-6 col-xs-12 cardcol mt-5">
                <div class="card stats">
                    <div class="card-body">
                        <div class="py-2">
                            <span class="value">{{$currentmonth['sessions'] == null ? "0" : $currentmonth['sessions']}}</span>
                            <span class="blockquote-footer" style="display: inline;">USERS</span>
                        </div>
                        <div class="py-2">
                            <span class="value">{{$currentmonth['pageviews'] == null ? "0" : $currentmonth['pageviews']}}</span>
                            <span class="blockquote-footer" style="display: inline;">VIEWS</span>
                        </div>
                    </div>
                    <div class="card-header dashboard">
                    LAST MONTH
                    </div>
                </div>
            </div> 

            <!-- YEAR -->
            <div class="col-md-6 col-sm-6 col-xs-12 cardcol mt-5">
                <div class="card stats">
                    <div class="card-body">
                        <div class="py-2">
                            <span class="value">{{$currentyear['sessions'] == null ? "0" : $currentyear['sessions']}}</span>
                            <span class="blockquote-footer" style="display: inline;">USERS</span>
                        </div>
                        <div class="py-2">
                            <span class="value">{{$currentyear['pageviews'] == null ? "0" : $currentyear['pageviews']}}</span>
                            <span class="blockquote-footer" style="display: inline;">VIEWS</span>
                        </div>
                    </div>
                    <div class="card-header dashboard">
                        YEAR
                    </div>
                </div>
            </div>     
        </div>
    </div>
</section>
@endsection
