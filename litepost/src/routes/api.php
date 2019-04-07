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
});