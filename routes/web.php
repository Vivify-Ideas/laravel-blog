<?php

use \App\Http\Controllers\PostsController;
use \App\Http\Controllers\CommentsController;

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

Route::group([ 'middleware' => ['guest'] ], function() {
    Route::get('/register', 'RegisterController@create')
        ->name('show-register');
    Route::post('/register', 'RegisterController@store')
        ->name('register')
        ->middleware('age');
    Route::get('/login', 'LoginController@create')
        ->name('show-login');
    Route::post('/login', 'LoginController@store')
        ->name('login');
});

Route::group(
    [ 'middleware' => ['auth'] ],
    function() {
        Route::get('/my-posts', 'UserPostsController@index')
            ->name('my-posts');
    }
);


Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/posts', ['as' => 'all-posts', 'uses' => 'PostsController@index']);

Route::get('/posts/create', ['as' => 'create-post', 'uses' => 'PostsController@create']);

Route::post('/posts', ['as' => 'store-post', 'uses' => 'PostsController@store']);

Route::get('/posts/{id}', ['as' => 'single-post', 'uses' => 'PostsController@show']);

Route::post('/posts/{postId}/comments', ['as' => 'comments-post', 'uses' => 'CommentsController@store']);