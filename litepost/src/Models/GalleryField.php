<?php

namespace Litepost\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryField extends Model
{
    public function fieldGroup()
    {
        return $this->morphOne(Field::class, 'fieldable');
    }
}
