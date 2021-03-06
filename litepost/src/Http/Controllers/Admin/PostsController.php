<?php

namespace Litepost\Http\Controllers\Admin;

use Litepost\Http\Controllers\BaseController;
use Validator;
use Session;
use Illuminate\Http\Request;
use Litepost\Models\Post;
use Litepost\Models\PostType;
use Litepost\Models\PostMeta;
use Litepost\Models\Category;

class PostsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $postTypeId = $request->input('postType');
        $posts = Post::where('post_type_id', $postTypeId)->paginate(15);
        
        return view('litepost::pages.posts.index', [
            'posts' => $posts,
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
        $postType = PostType::find($request->input('postType'));

        return view('litepost::pages.posts.create', [
            'view' => 'create',
            'postType' => $postType
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

        $validator = Validator::make($request->all(), [
            'post_type_id' => 'required',
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'status' => 'required',
            'order' => 'required'
        ]);

        if ($validator->fails()) {
            $categories = Category::find($request->input('categories'));
            $request->merge([
                'categories' => $categories
            ]);

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $post = new Post();
        
        $post->post_type_id = $request->input('post_type_id');
        $post->title = $request->input('title');
        $post->slug = $slug;
        $post->status = $request->input('status');
        $post->order = $request->input('order');

        $post->save();

        // CustomFields
        $customFields = $request->input('custom_fields') ?? [];

        foreach($customFields as $key => $value) {  
            $meta = new PostMeta();

            $meta->post_id = $post->id;
            $meta->key = $key;
            $meta->value = is_array($value) ? json_encode($value) : $value;

            $meta->save();
        }

        // Files Custom Fields
        $files = $request->file('custom_file_fields') ?? [];

        foreach($files as $key => $file) {  
            // Upload The file
            $path = $file->storeAs('public/files', $file->getClientOriginalName());

            // Create The Meta
            $meta = new PostMeta();

            $meta->post_id = $post->id;
            $meta->key = $key;
            $meta->value = $file->getClientOriginalName(); // The Name Of the file

            $meta->save();
        }

        $post->categories()->attach($request->input('categories'));

        return redirect()->route('litepost.posts', [
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
        $post = Post::find($id);
        $postType = PostType::find($request->input('postType'));

        return view('litepost::pages.posts.edit', [
            'view' => 'edit',
            'postType' => $postType,
            'post' => $post
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

        $validator = Validator::make($request->all(), [
            'post_type_id' => 'required',
            'title' => 'required',
            'slug' => 'required|unique:posts,slug,' . $id,
            'order' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            $categories = Category::find($request->input('categories'));
            $request->merge([
                'categories' => $categories
            ]);

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput($request->all());
        }

        $post = Post::find($id);

        $post->post_type_id = $request->input('post_type_id');
        $post->title = $request->input('title');
        $post->order = $request->input('order');
        $post->slug = $slug;
        $post->status = $request->input('status');

        $post->save();

        // CustomFields
        $customFields = $request->input('custom_fields') ?? [];
        
        foreach($customFields as $key => $value) {
            $meta = $post->getMetaByKey($key);

            if($meta == null) {
                $meta = new PostMeta();

                $meta->post_id = $post->id;
                $meta->key = $key;
            }

            $meta->value = is_array($value) ? json_encode($value) : $value;

            $meta->save();
        }

        // Files Custom Fields
        $files = $request->file('custom_file_fields') ?? [];

        foreach($files as $key => $file) {  
            // Upload The file
            $path = $file->storeAs('public/files', $file->getClientOriginalName());

            $meta = $post->getMetaByKey($key);

            if($meta == null) {
                $meta = new PostMeta();

                $meta->post_id = $post->id;
                $meta->key = $key;
            }

            $meta->value = $file->getClientOriginalName(); // The Name Of the file

            $meta->save();
        }

        $post->categories()->sync($request->input('categories'));

        return redirect()->route('litepost.posts', [
            'postType' => $request->input('post_type_id')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('litepost.posts', [
            'postType' => $request->input('post_type_id')
        ]);
    }
}
