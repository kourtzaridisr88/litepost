<?php

namespace Litepost\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $with = [
        'categories',
        'metas'
    ];

    /**
     * Get the parent post type.
     */
    public function postType()
    {
        return $this->belongsTo(PostType::class);
    }

    /**
     * Get all of the post's meta.
     */
    public function metas()
    {
        return $this->hasMany(PostMeta::class);
    }

    /**
     * Get all the categories for the post.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'posts_categories');
    }

    /**
     * Access post meta by key
     * 
     * @param string the field key
     * @return object the field object
     */
    public function getMetaByKey($key)
    {
        return $this->metas()->where('key', $key)->first();
    }

    /**
     * Access a specific post meta by key
     * 
     * @param string the field key
     * @return string the field value
     */
    public function field($key)
    {
        $field = $this->metas()->where('key', $key)->select('value')->first();

        return is_array(json_decode($field->value)) 
            ? json_decode($field->value) 
            : $field->value;
    }
}
