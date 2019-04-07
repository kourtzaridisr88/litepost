<?php

namespace Litepost\Models;

use Illuminate\Database\Eloquent\Model;

class RichText extends Model
{
    protected $table = 'rich_text_fields';

    public function fieldGroup()
    {
        return $this->morphOne(Field::class, 'fieldable');
    }
}
