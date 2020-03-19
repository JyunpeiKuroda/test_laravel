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

//画像updateのお試し用
Route::get('/image_index', 'ImageController@index');  // 一覧画面

Route::get('/new_input', 'ImageController@getNewInput');  // 入力
Route::post('/new_confirm', 'ImageController@postNewConfirm');  // 確認
Route::post('/new_complete', 'ImageController@postNewComplete'); // 完了

// Route::get('student/list','StudentController@getIndex');
// Route::get('/users/list','ComponentsController@user_list');

// Route::group(['prefix' => 'student'], function () {
//     Route::get('list', 'StudentController@getIndex'); //一覧
//     Route::get('new', 'StudentController@new_index'); //入力
//     Route::patch('new','StudentController@new_confirm'); //確認
//     Route::post('new', 'StudentController@new_finish'); //完了
// });

// Route::resource('/posts', 'PostController', ['only' => ['index', 'create', 'destroy']]);     #投稿画面のpathのroute

// Route::group(['prefix' => 'posts'], function () {
//     Route::get('list', 'PostController@getIndex'); //一覧
//     Route::get('new', 'StudentController@new_index'); //入力
//     Route::patch('new','StudentController@new_confirm'); //確認
//     Route::post('new', 'StudentController@new_finish'); //完了
// });
