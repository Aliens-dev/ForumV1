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

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/login', 'HomeController@login')->name('user.login.get');
Route::post('/login','HomeController@loginPost')->name('user.login.post');
Route::any('/logout','HomeController@logout')->name('user.logout');
Route::get('/profile/settings','HomeController@settings')->name('user.settings');
//Route::post('/profile/settings','HomeController@settings')->name('user.settings.post');
Route::get('/profile','HomeController@profile')->name('user.profile');

Route::get('search','ForumController@search')->name('search');
Route::post('search','ForumController@searchPost')->name('search.post');
Route::get('/forum/add','ForumController@add')->name('forum.add');
Route::post('/forum/add','ForumController@store')->name('forum.store');
Route::get('/forum/{id}/edit','ForumController@edit')->name('forum.edit');
Route::post('/forum/{id}/edit','ForumController@update')->name('forum.update');
Route::any('/forum/{id}/delete','ForumController@delete')->name('forum.delete');


Route::get('/forum/{id}','ForumController@index')->name('forum.index');
Route::get('/forum/{id}/add','ThreadController@add')->name('thread.add');
Route::post('/forum/{id}/add','ThreadController@store')->name('thread.store');
Route::get('/thread/{id}/edit','ThreadController@edit')->name('thread.edit');
Route::post('/thread/{id}/editPost','ThreadController@editPost')->name('thread.edit.post');



Route::post('/thread/{id}/edit','ThreadController@update')->name('thread.update');
Route::any('/thread/{id}/delete','ThreadController@delete')->name('thread.delete');
Route::get('/thread/{id}','ThreadController@index')->name('thread.index');
Route::post('/thread/{id}','ThreadController@indexpost')->name('thread.index.post');

Route::get('/thread/{id}/{reply}/edit','ThreadController@editReply')->name('reply.edit');
Route::post('/thread/{id}/{reply}/editReply','ThreadController@editReplyPost')->name('reply.edit.post');
Route::post('/thread/{id}/{reply}/edit','ThreadController@updateReply')->name('reply.update');