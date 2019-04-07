<?php

namespace Litepost\Http\Controllers;

use App\Http\Controllers\Controller;
use Litepost\Models\PostType;
use View;

class BaseController extends Controller
{
    public function __construct() 
    {
        $globalPostTypes = PostType::get();

        View::share('globalPostTypes', $globalPostTypes);
    }
}