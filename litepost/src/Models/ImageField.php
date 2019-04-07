<?php

namespace Litepost\Models;

use Illuminate\Database\Eloquent\Model;

class ImageField extends Model
{
    public function fieldGroup()
    {
        return $this->morphOne(Field::class, 'fieldable');
    }
}
