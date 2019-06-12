<?php

Route::get('/about', 'Theme\PagesController@about')->name('about');
Route::group([
    'namespace' => 'Litepost\Http\Controllers\Theme',
    'middleware' => [
        'web'
    ]
], function() {
    Route::get('/{postTypeSlug}', 'PostTypesController@index')->name('post-type');
    Route::get('/{postTypeSlug}/{postSlug}', 'PostTypesController@show')->name('post-type.single');
});