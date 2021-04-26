<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//User
Route::post('login','Api\AuthController@login');
Route::post('register','Api\AuthController@register');
Route::get('logout','Api\AuthController@logout');
Route::post('save_user_info','Api\AuthController@saveUserInfo')->middleware('jwtAuth');
Route::get('user','Api\AuthController@user')->middleware('jwtAuth');
//Book
Route::get('books','Api\BooksController@books')->middleware('jwtAuth');

//Comment
Route::post('books/comments','Api\CommentsController@comments')->middleware('jwtAuth');

Route::post('comments/create','Api\CommentsController@create')->middleware('jwtAuth');
Route::post('comments/delete','Api\CommentsController@delete')->middleware('jwtAuth');
Route::post('comments/update','Api\CommentsController@update')->middleware('jwtAuth');
