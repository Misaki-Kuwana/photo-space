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

Route::get('/', 'PostsController@index');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('posts', 'PostsController', ['only' => ['store', 'create', 'destroy', 'show']]);
    Route::get('posts', 'PostsController@list')->name('posts.list');
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('user.followings');
        Route::get('followers', 'UsersController@followers')->name('user.followers');
        
        Route::post('favorite', 'FavoriteController@store')->name('favorite.store');
        Route::delete('unfavorite', 'FavoriteController@destroy')->name('favorite.destroy');
        Route::get('favorite', 'FavoriteController@index')->name('favorite.index');
    });
});