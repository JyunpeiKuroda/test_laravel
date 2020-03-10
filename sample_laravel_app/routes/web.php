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

// Route::get('student/list','StudentController@getIndex');
// Route::get('/users/list','ComponentsController@user_list');

// Route::group(['prefix' => 'student'], function () {
//     Route::get('list', 'StudentController@getIndex'); //一覧
//     Route::get('new', 'StudentController@new_index'); //入力
//     Route::patch('new','StudentController@new_confirm'); //確認
//     Route::post('new', 'StudentController@new_finish'); //完了
// });

# 入力画面
Route::get('validation/', [
    'uses' => 'ValiDemoController@getIndex',
    'as' => 'validation.index'
]);
# 確認画面
Route::post('validation/confirm', [
    'uses' => 'ValiDemoController@confirm',
    'as' => 'validation.confirm'
]);