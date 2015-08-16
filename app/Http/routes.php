<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'Home\HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('register/confirm/{token}', 'Auth\AuthController@confirmEmail');

Route::get('contact', 'Flash\FlashController@contact');
Route::get('about', 'Flash\FlashController@about');
Route::get('delete', [

    'as' => 'delete_status',
    'uses' => 'Flash\FlashController@deleteStatus'
]);


Route::resource('crimibook', 'Crimibook\CrimibookController');

Route::resource('status', 'Status\StatusController');

Route::get('users', 'Users\UsersController@index');

Route::get('@{name}', [
    'as' => 'profile_path',
    'uses' => 'Users\UsersController@show'
]);

/**
 * Follows
 */
Route::resource('follows', 'Follows\FollowsController');

/**
 * Comment status
 */

Route::post('status/{id}/comment', [
    'as' => 'comment_path',
    'uses' =>'Comments\CommentController@store'
]);

Route::delete('comment/{id}', [
    'as' => 'comment_delete',
    'uses' => 'Comments\CommentController@destroy'
]);


