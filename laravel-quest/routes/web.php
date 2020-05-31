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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'UsersController@index')->name('top');
Route::get('users/{id}','UsersController@show')->name('users.show');
// Route::resourse('users','UsersController',['only'=>['show']]);

Route::group(['prefix'=>'users/{id}'], function(){
   Route::get('followings', 'UsersController@followings')->name('followings');
   Route::get('followers','UsersController@followers')->name('followers');
});

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login')->name('login.post');
Route::get('logout','Auth\LoginController@logout')->name('logout');




Route::group(['middleware'=>'auth'], function() {
    
    Route::group(['prefix'=>'users/{id}'], function() {
        Route::post('follow', 'UserFollowController@store')->name('follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('unfollow');
    });
    
    Route::put('users','UsersController@rename')->name('users.rename');
    Route::get('movies/create','MoviesController@create')->name('movies.create');
    Route::post('movies', 'MoviesController@store')->name('movies.store');
    Route::delete('movies/{id}', 'MoviesController@destroy')->name('movies.destroy');
});


