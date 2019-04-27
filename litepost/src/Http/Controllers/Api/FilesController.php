<?php

namespace Litepost\Http\Controllers\Api;

use Litepost\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends BaseController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $filename)
    {
        return Storage::disk('public')
            ->download('files/' . $filename);
    }
}
