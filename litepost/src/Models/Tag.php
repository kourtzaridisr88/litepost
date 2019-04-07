<?php

namespace Litepost\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Get the parent post type.
     */
    public function postType()
    {
        return $this->belongsTo(PostType::class);
    }
}
