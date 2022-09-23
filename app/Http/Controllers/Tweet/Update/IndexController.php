<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use App\Models\Tweet;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // urlから投稿番号を受け取る
        $tweetId = (int) $request->route('tweetId');

        // // DBから投稿情報を取得する 投稿情報がない場合はnullがレスポンス
        // $tweet = Tweet::where('id', $tweetId)->first();

        // // nullの場合の処理
        // if (is_null($tweet)){
        //     throw new NotFoundHttpException('投稿が存在しません');
        // }

        // 短縮形　自動的にNotFoundにしてくれる
        $tweet = Tweet::where('id', $tweetId)->firstOrFail();

        // viewに値を返す
        return view('tweet.update')->with('tweet', $tweet);
    }
}