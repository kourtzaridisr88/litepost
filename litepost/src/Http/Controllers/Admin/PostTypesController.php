<?php

namespace Litepost\Http\Controllers\Admin;

use Litepost\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Litepost\Models\PostType;

class PostTypesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postTypes = PostType::paginate(15);

        return view('litepost::pages.post-types.index', [
            'view' => 'index',
            'postTypes' => $postTypes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_singular' => 'required',
            'name_plural'   => 'required',
            'slug'          => 'required|unique:post_types'
        ]);

        $postType = new PostType();

        $postType->name_singular = $request->input('name_singular');
        $postType->name_plural = $request->input('name_plural');
        $postType->slug = $request->input('slug');

        $postType->save();

        return redirect()->route('litepost.post-types');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postType = PostType::find($id);

        return view('litepost::pages.post-types.edit', [
            'view' => 'edit',
            'postType' => $postType
        ]);
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
        $request->validate([
            'name_singular' => 'required',
            'name_plural'   => 'required'
        ]);

        $postType = PostType::findOrFail($id);

        $postType->name_singular = $request->input('name_singular');
        $postType->name_plural = $request->input('name_plural');

        $postType->save();

        return redirect()->route('litepost.post-types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postType = PostType::findOrFail($id);

        $postType->delete();

        return redirect()->route('litepost.post-types');

    }
}
