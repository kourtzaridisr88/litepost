<?php

Route::group([
    'namespace' => 'Litepost\Http\Controllers\Api',
    'prefix' => 'litepost/api/v1',
    'middleware' => [
        // 'web'
    ]
], function() {
    // Categories
    Route::resource('categories', 'CategoriesController');

    // Images
    Route::post('images/store', 'ImagesController@store');
    Route::post('images/storeImagesFromTiny', 'ImagesController@storeImagesFromTiny');

    // Files
    Route::get('files/{filename}', 'FilesController@show');

    // Contact
    Route::post('contact', 'ContactController@store');

    // Subscribers
    Route::post('subscribers', 'SubscribersController@store');
});