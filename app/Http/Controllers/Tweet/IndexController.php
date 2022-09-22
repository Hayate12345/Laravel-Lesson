<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Tweetモデルの読み込み
use App\Models\Tweet;


// 一つのメソッドでしか定義できない　メソッドの強制
class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  sail artisan make:controller Tweet/IndexController --invokable で作成
    public function __invoke(Request $request)
    {
        // DBから値を取得する
        // $sample = Tweet::all();

        // 新規投稿順に並び替え
        $tweet = Tweet::orderBy('created_at', 'DESC')->get();

        // dd($sample);

        // DBから取得した値をviewに返す　左にbladeで定義する値　右に渡す変数
        return view('tweet.index')
            ->with('tweets', $tweet);
    }
}