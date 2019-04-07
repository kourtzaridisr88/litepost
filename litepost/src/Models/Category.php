<?php

namespace Litepost\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get the parent post type.
     */
    public function postType()
    {
        return $this->belongsTo(PostType::class);
    }

    /**
     * Get all of the posts for the category.
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posts_categories');
    }
}
