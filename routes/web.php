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

Route::group(['prefix' => 'articles', 'as' => 'articles::'], function () {

    Route::get('/{id}/{slug}', "ArticleController@viewArticle")->name('view');

});

Route::group(['prefix' => 'admin', 'as' => 'admin::', 'namespace' => 'Admin'], function () {

    Route::get('/', "HomeController@index")->name('home');

    Route::group(['prefix' => 'articles', 'as' => 'articles::', 'namespace' => null], function () {

        Route::get('/', "ArticleController@index")->name('all');
        Route::get('/new', "ArticleController@newArticle")->name('new');
        Route::post('/new', "ArticleController@createArticle")->name('create');
        Route::get('/edit/{id}', "ArticleController@editArticle")->name('edit');
        Route::post('/edit/{id}', "ArticleController@updateArticle")->name('update');
        Route::delete('/delete/{id}', "ArticleController@deleteArticle")->name('delete');

    });

    Route::group(['prefix' => 'api', 'as' => 'api::', 'namespace' => 'Api'], function () {

        Route::post('/markdown/parse', "MarkdownParserController@parse")->name('markdown::parse');

    });

});