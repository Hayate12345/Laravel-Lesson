<?php

use App\Models\Tweet;
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

// // SampleControllerのshowHelloの起動
// Route::get('/sample', [\App\Http\Controllers\Sample\IndexController::class, 'showHello']);

// // SampleControllerのshowIdの起動
// Route::get('/sample/{id}', [\App\Http\Controllers\Sample\IndexController::class, 'showId']);

// ツイートの一覧を表示する
Route::get('/tweet', \App\Http\Controllers\Tweet\IndexController::class)->name('tweet.index');

// 投稿するルートの定義
Route::post('tweet/create', \App\Http\Controllers\Tweet\CreateController::class)->name('tweet.create');

// postテーブルから1つの投稿を取得し表示する
Route::get('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\IndexController::class)->name('tweet.update.index')->where('tweetId', '[0-9]+');

// 投稿を編集する
Route::put('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\PutController::class)->name('tweet.update.put')->where('tweetId', '[0-9]+');

// 投稿を削除する
Route::delete('/tweet/delete/{tweetId}', \App\Http\Controllers\Tweet\DeleteController::class)->name('tweet.delete');