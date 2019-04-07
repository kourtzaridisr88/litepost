<?php

Route::group([
    'namespace' => 'Litepost\Http\Controllers\Theme'
], function() {

    Route::get('/{postTypeSlug}', 'PostTypesController@index');
    Route::get('/{postTypeSlug}/{postSlug}', 'PostTypesController@show');
});