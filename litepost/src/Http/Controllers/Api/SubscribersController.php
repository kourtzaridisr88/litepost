<?php

namespace Litepost\Http\Controllers\Api;

use Litepost\Http\Controllers\BaseController as Controller;
use Illuminate\Http\Request;
use Litepost\Models\Subscriber;

class SubscribersController extends Controller
{
    /**
     * Create a subscriber
     * 
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers'
        ]);

        $subscriber = new Subscriber();

        $subscriber->email = $request->input('email');

        $subscriber->save();

        return response()->json([
            'subscriber' => $subscriber
        ], 200);
    }
}