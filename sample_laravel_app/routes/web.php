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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/image_index', 'ImageController@index');  // 一覧画面

Route::get('/new_input', 'ImageController@getNewInput');  // 入力
Route::post('/new_confirm', 'ImageController@getNewConfirm');  // 確認
Route::post('/new_complete', 'ImageController@postNewComplete'); // 完了



// RESTfulサービスのルーティング
Route::resource('/post', 'PostController')->middleware('auth');;

Route::get('users','UsersController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
