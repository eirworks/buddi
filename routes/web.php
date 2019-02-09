<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['as' => "articles::", 'prefix' => 'articles'], function () {
    Route::get('/', "ArticleController@index")->name('all');
    Route::get('/{id}/{slug?}', "ArticleController@show")->name('show');
});

Route::group(['prefix' => 'admin', 'as' => 'admin::', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {

    Route::get('/', "HomeController@index")->name('home');

    Route::group(['prefix' => 'articles', 'as' => 'articles::', 'namespace' => null], function () {

        Route::get('/', "ArticleController@index")->name('all');
        Route::get('/new', "ArticleController@newArticle")->name('new');
        Route::post('/new', "ArticleController@createArticle")->name('create');
        Route::get('/edit/{id}', "ArticleController@editArticle")->name('edit');
        Route::post('/edit/{id}', "ArticleController@updateArticle")->name('update');
        Route::delete('/delete/{id}', "ArticleController@deleteArticle")->name('delete');

    });

    Route::group(['prefix' => 'categories', 'as' => 'categories::'], function () {

        Route::get('/', "CategoryController@index")->name('all');
        Route::get('/new', "CategoryController@create")->name('new');
        Route::post('/new', "CategoryController@store")->name('create');
        Route::get('/edit/{category}', "CategoryController@edit")->name('edit');
        Route::post('/edit/{category}', "CategoryController@update")->name('update');
        Route::delete('/delete/{category}', "CategoryController@destroy")->name('destroy');

    });

    Route::group(['prefix' => 'users', 'as' => 'users::'], function () {

        Route::get('/', "UserController@index")->name('all');
        Route::get('/new', "UserController@create")->name('new');
        Route::post('/new', "UserController@store")->name('create');
        Route::get('/edit/{user}', "UserController@edit")->name('edit');
        Route::post('/edit/{user}', "UserController@update")->name('update');
        Route::delete('/delete/{user}', "UserController@destroy")->name('destroy');

    });

    Route::group(['prefix' => 'settings', 'as' => 'settings::'], function () {

        Route::get('/', "SettingController@index")->name('all');
        Route::post('/', "SettingController@store")->name('save');

    });

    Route::group(['prefix' => 'api', 'as' => 'api::', 'namespace' => 'Api'], function () {

        Route::post('/markdown/parse', "MarkdownParserController@parse")->name('markdown::parse');

    });

});