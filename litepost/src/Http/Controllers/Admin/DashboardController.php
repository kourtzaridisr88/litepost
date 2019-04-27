<?php

namespace Litepost\Http\Controllers\Admin;

use Litepost\Http\Controllers\BaseController;
use Analytics;
use Spatie\Analytics\Period;


class DashboardController extends BaseController
{
    public function index() 
    {
        // sessions(users) and pageviews for current day
        $today = Analytics::performQuery(Period::days(1), 'ga:sessions', [
            'metrics' => 'ga:sessions, ga:pageviews'
        ]); 

        // sessions(users) and pageviews for current week ago
        $week = Analytics::performQuery(Period::days(7), 'ga:sessions', [
            'metrics' => 'ga:sessions, ga:pageviews'
        ]);
        // sessions(users) and pageviews for current month
        $month = Analytics::performQuery(Period::months(1), 'ga:sessions', [
            'metrics' => 'ga:sessions, ga:pageviews'
        ]);

        // sessions(users) and pageviews for current year
        $year = Analytics::performQuery(Period::years(1), 'ga:sessions', [
            'metrics' => 'ga:sessions, ga:pageviews'
        ]);

        $currentDayData['sessions'] = $today->rows[0][0];
        $currentDayData['pageviews'] = $today->rows[0][1];
        

        $currentWeekData['sessions']= $week->rows[0][0];
        $currentWeekData['pageviews']= $week->rows[0][1];

        $currentMonthData['sessions']= $month->rows[0][0];
        $currentMonthData['pageviews']= $month->rows[0][1];

        $currentYearData['sessions']= $year->rows[0][0];
        $currentYearData['pageviews']= $year->rows[0][1];

        return view('litepost::pages.dashboard', [
            "currentday" => $currentDayData,
            "currentweek" => $currentWeekData,
            "currentmonth" => $currentMonthData,
            "currentyear" => $currentYearData
        ]);
    }
}