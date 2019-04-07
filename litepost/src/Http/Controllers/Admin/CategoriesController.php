<?php

namespace Litepost\Http\Controllers\Admin;

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
        $postTypeId = $request->input('postType');
        $categories = Category::where('post_type_id', $postTypeId)
            ->paginate(15);
        
        return view('litepost::pages.categories.index', [
            'categories' => $categories,
            'postTypeId' => $postTypeId
        ]);
    }

    /**
     * Show the form to create a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $postTypeId = $request->input('postType');

        return view('litepost::pages.categories.create', [
            'view' => 'create',
            'postTypeId' => $postTypeId
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
        $slug = str_slug($request->input('slug'));

        $request->validate([
            'post_type_id' => 'required',
            'title' => 'required',
            'slug' => 'required|unique:categories'
        ]);

        $category = new Category();
        
        $category->post_type_id = $request->input('post_type_id');
        $category->title = $request->input('title');
        $category->slug = $slug;

        $category->save();

        return redirect()->route('litepost.categories', [
            'postType' => $request->input('post_type_id')
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $category = Category::find($id);
        $postTypeId = $request->input('postType');

        return view('litepost::pages.categories.edit', [
            'view' => 'edit',
            'postTypeId' => $postTypeId,
            'category' => $category
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
        $slug = str_slug($request->input('slug'));

        $request->validate([
            'post_type_id' => 'required',
            'title' => 'required',
            'slug' => 'required|unique:categories'
        ]);

        $category = Category::find($id);

        $category->post_type_id = $request->input('post_type_id');
        $category->title = $request->input('title');
        $category->slug = $slug;

        $category->save();

        return redirect()->route('litepost.categories', [
            'postType' => $request->input('post_type_id')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('litepost.categories', [
            'postType' => $request->input('post_type_id')
        ]);

    }
}
