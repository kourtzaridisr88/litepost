<?php

namespace Litepost\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $with = ['fieldable'];

    public function postType()
    {
        return $this->belongsTo(PostType::class);
    }

    /**
     * Get all the fields.
     */
    public function fieldable()
    {
        return $this->morphTo();
    }

    public static function createField(array $data)
    {
        switch($data['type']) {
            case 'richtext':
                static::setField(new RichText(), $data);
                break;

            case 'text': 
                static::setField(new TextField(), $data);
                break;

            case 'image': 
                static::setField(new ImageField(), $data);
                break;

            case 'gallery': 
                static::setField(new GalleryField(), $data);
                break;

            default: 
                break;
        }
    }

    public static function setField(Model $fieldClass, array $data)
    {
        $fieldClass->label = $data['label'];
        $fieldClass->name = $data['name'];

        $fieldClass->save();

        $fieldGroup = new static;    

        $fieldGroup->post_type_id = $data['post_type_id'];

        $fieldClass->fieldGroup()->save($fieldGroup);
    }

}
