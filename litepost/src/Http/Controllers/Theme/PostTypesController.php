<?php

namespace Litepost\Http\Controllers\Theme;

use Litepost\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Litepost\Models\PostType;
use Litepost\Models\Post;

class PostTypesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($postTypeSlug)
    {
        $postType = PostType::where('slug', $postTypeSlug)->firstOrFail();

        $posts = $postType->posts()->orderBy('order', 'ASC')->paginate(15);

        return view('theme.' . $postTypeSlug . '.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the spesific resource
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($postTypeSlug, $postSlug)
    {
        $postType = PostType::where('slug', $postTypeSlug)->firstOrFail();

        $post = $postType->posts()->where('slug', $postSlug)->firstOrFail();

        return view('theme.' . $postTypeSlug . '.single', [
            'post' => $post
        ]);
    }
}
