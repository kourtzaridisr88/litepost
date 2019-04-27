<?php

namespace Litepost\Http\Controllers\Admin;

use Litepost\Http\Controllers\BaseController;
use Validator;
use Session;
use Illuminate\Http\Request;
use Litepost\Models\Subscriber;

class SubscribersController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subscribers = Subscriber::paginate(15);
        
        return view('litepost::pages.subscribers.index', [
            'subscribers' => $subscribers
        ]);
    }
}
