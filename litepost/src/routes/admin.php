<?php

Route::group([
    'namespace' => 'Litepost\Http\Controllers\Admin',
    'prefix' => 'litepost',
    'middleware' => [
        'web',
        'auth'
    ]
], function() {
    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('litepost.dashboard');

    // Languages
    Route::resource('languages', 'LanguagesController', [
        'names' => [
            'index'    => 'litepost.languages',
            'create'   => 'litepost.languages.create',
            'store'    => 'litepost.languages.store',
            'edit'     => 'litepost.languages.edit',
            'update'   => 'litepost.languages.update',
            'destroy'  => 'litepost.languages.destroy'
        ]
    ]);

    // Categories
    Route::resource('categories', 'CategoriesController', [
        'names' => [
            'index'    => 'litepost.categories',
            'create'   => 'litepost.categories.create',
            'store'    => 'litepost.categories.store',
            'edit'     => 'litepost.categories.edit',
            'update'   => 'litepost.categories.update',
            'destroy'  => 'litepost.categories.destroy'
        ]
    ]);

    // Post Types
    Route::resource('post-types', 'PostTypesController', [
        'names' => [
            'index'    => 'litepost.post-types',
            'create'   => 'litepost.post-types.create',
            'store'    => 'litepost.post-types.store',
            'edit'     => 'litepost.post-types.edit',
            'update'   => 'litepost.post-types.update',
            'destroy'  => 'litepost.post-types.destroy'
        ]
    ]);

    // Posts
    Route::resource('posts', 'PostsController', [
        'names' => [
            'index'    => 'litepost.posts',
            'create'   => 'litepost.posts.create',
            'store'    => 'litepost.posts.store',
            'edit'     => 'litepost.posts.edit',
            'update'   => 'litepost.posts.update',
            'destroy'  => 'litepost.posts.destroy'
        ]
    ]);

    // Fields
    Route::resource('fields', 'FieldsController', [
        'names' => [
            'index'    => 'litepost.fields',
            'create'   => 'litepost.fields.create',
            'store'    => 'litepost.fields.store',
            'edit'     => 'litepost.fields.edit',
            'update'   => 'litepost.fields.update',
            'destroy'  => 'litepost.fields.destroy'
        ]
    ]);
});

Route::group([
    'namespace' => 'Litepost\Http\Controllers\Admin\Auth',
    'prefix' => 'litepost',
    'middleware' => [
        'web'
    ]
], function() {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

});