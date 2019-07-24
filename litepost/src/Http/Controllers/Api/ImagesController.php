<?php

namespace Litepost\Http\Controllers\Api;

use Litepost\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Image;

class ImagesController extends BaseController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images = $request->all();
        
        $imageNames = [];
        $path = public_path() . '/storage/images/';

        foreach($images as $image) {
            $originalName = time() . str_random(10) . '.' . $image->getClientOriginalExtension();
            $originalImage = $image->storeAs('public/images', $originalName);

            array_push($imageNames, $originalName);
        }

        return response()->json([
            'images' => $imageNames
        ], 200);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeImagesFromTiny(Request $request)
    {
        $image = $request->file('file');

        $uploadedImage = $image->store('public/images');

        return response()->json([
            'location' =>  str_replace('public', '/storage', $uploadedImage)
        ], 200);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imageResizer($name, $width)
    {
        $path = public_path() . '/storage/images/';

        $splittedName = explode('.', $name);
        $newName = $splittedName[0] . 'w=' . $width . '.' . $splittedName[1]; 

        $img = Image::make($path . $name)
            ->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($path . $newName);

        return '/storage/images/' . $newName;
    }

}
