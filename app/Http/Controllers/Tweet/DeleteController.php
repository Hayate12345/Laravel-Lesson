<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tweet;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // 投稿Idを削除する
        $tweetId = (int) $request->route('tweetId');

        // 指定の投稿Idの投稿を削除する
        $deleteTweet = Tweet::where('id', $tweetId)->firstOrFail();
        $deleteTweet->delete();

        // 削除後の処理
        return redirect()
            ->route('tweet.index')
            ->with('feedback.success', '投稿を削除しました。');
    }
}