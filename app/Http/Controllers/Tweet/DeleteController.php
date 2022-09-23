<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tweet;

use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        // 投稿Idを削除する
        $tweetId = (int) $request->route('tweetId');

        if (!$tweetService->checkOwnTweet($request->user()->id, $tweetId)) {
            throw new AccessDeniedHttpException();
        }

        // 指定の投稿Idの投稿を削除する
        $deleteTweet = Tweet::where('id', $tweetId)->firstOrFail();
        $deleteTweet->delete();

        // 削除後の処理
        return redirect()
            ->route('tweet.index')
            ->with('feedback.success', '投稿を削除しました。');
    }
}
