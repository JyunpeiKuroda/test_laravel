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

Route::get('/image_index', 'TopicsController@index');  // 一覧画面
Route::delete('/image_index/delete/{topic_id}', 'TopicsController@delete');  //(削除)一覧画面
// Route::post('delete/{id}/', 'StudentController@us_delete'); //削除

Route::get('/new_input', 'TopicsController@getNewInput');  // 入力(投稿form)
Route::post('/new_confirm', 'TopicsController@getNewConfirm');  // 確認(投稿form)
Route::post('/new_complete', 'TopicsController@postNewComplete'); // 完了(投稿form)



// RESTfulサービスのルーティング
// Route::resource('/post', 'PostController')->middleware('auth');;

// Route::get('users','UsersController@index');


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
