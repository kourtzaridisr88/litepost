<?php

Route::get('/comming-soon', function() {
    return view('comming-soon');
})->name('comming-soon');

Route::get('/about', 'Theme\PagesController@about')->middleware('comming.soon')->name('about');
Route::group([
    'namespace' => 'Litepost\Http\Controllers\Theme',
    'middleware' => [
        'web',
        'comming.soon'
    ]
], function() {
    Route::get('/{postTypeSlug}', 'PostTypesController@index')->name('post-type');
    Route::get('/{postTypeSlug}/{postSlug}', 'PostTypesController@show')->name('post-type.single');
});