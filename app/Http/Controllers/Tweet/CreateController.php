<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// 独自に追加したをRequestを読み込む
use App\Http\Requests\Tweet\CreateRequest;

// DBモデルの読み込み
use App\Models\Tweet;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateRequest $request)
    {
        // 新規投稿をする
        $tweet = new Tweet;

        // カラムcontentに入力する値の指定　CreateRequestで定義したtweet()の呼び出す
        $tweet->content = $request->tweet();

        $tweet->name = $request->test();

        // 投稿を保存する
        $tweet->save();

        // 投稿が終わると一覧ページへ移動する
        return redirect()->route('tweet.index');
    }
}