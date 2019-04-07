<?php

namespace Litepost\Models;

use Illuminate\Database\Eloquent\Model;
use Litepost\Models\Field;

class PostType extends Model
{
    /**
     * Get all of the post's.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get all of the post's.
     */
    public function fields()
    {
        return $this->hasMany(Field::class);
    }

}
