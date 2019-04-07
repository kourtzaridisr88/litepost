<?php

namespace Litepost\Http\Controllers\Admin;

use Litepost\Http\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index() 
    {
        return view('litepost::pages.dashboard');
    }
}