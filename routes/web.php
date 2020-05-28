<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PostsController@index')->name('top');

// Route::get('/', function () {
//     return view('welcome');
//   });

Route::resource('/posts', 'PostsController');
Route::get('posts/category/{id?}', 'PostsController@index')->name('post.category');
Route::post('posts/search', 'PostsController@search')->name('post.search');
Route::get('contact', 'ContactController@index')->name('contact.index');
Route::get('list', 'ShoppingController@index');
Route::post('search', 'ShoppingController@search')->name('search');
Route::get('list/{id?}', 'ShoppingController@index')->name('list');
Route::get('list/detail/{id}', 'ShoppingController@detail')->name('detail');
Route::post('contact/confirm', 'ContactController@confirm')->name('contact.confirm');
Route::post('contact/thanks', 'ContactController@send')->name('contact.send');
Auth::routes();

Route::get('/user', 'UserController@index')->name('user.index')->middleware('auth');
Route::get('/user/userEdit', 'UserController@userEdit')->name('user.userEdit')->middleware('auth');
Route::post('/user/userEdit', 'UserController@userUpdate')->name('user.userUpdate')->middleware('auth');

Route::get('home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/posts', 'PostsController', ['only' => ['create', 'store', 'edit', 'update', 'destroy','show']]);
    Route::resource('comments', 'CommentsController', ['only' => ['store','edit','update','destroy']]);
    Route::get('comments/delete', 'CommentsController@delete')->name('comment_delete');
    Route::get('cart', 'ShoppingController@cart')->name('cart');
    Route::get('cart/delete/{id?}', 'ShoppingController@delete')->name('delete');
    Route::get('cart/complete', 'ShoppingController@complete')->name('complete');
    Route::get('cart/complete2', 'ShoppingController@complete2')->name('complete2');
    Route::get('cart/history', 'ShoppingController@history')->name('history');
});