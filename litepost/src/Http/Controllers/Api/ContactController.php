<?php

namespace Litepost\Http\Controllers\Api;

use Litepost\Http\Controllers\BaseController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Litepost\Mail\Contact;
use Exception;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $data = $request->all();

        try{
            $contact = Mail::to(env('MAIL'))
                ->send(new Contact($data));

            return response()->json([
                'contact' => $contact
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }    
    }
}