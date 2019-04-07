<?php

namespace Litepost\Http\Controllers\Api;

use Litepost\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Litepost\Models\Category;

class CategoriesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $postTypeId = $request->input('post_type_id');
        $title = $request->input('title');

        $categories = Category::where('post_type_id', $postTypeId)
            ->where('title', 'LIKE', '%' . $title . '%')
            ->get();
        
        return response()->json([
            'results' => $categories
        ], 200);
    }

    /**
     * Show the form to create a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //  Soon
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  Soon
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //  Soon
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //  Soon
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //  Soon
    }
}
