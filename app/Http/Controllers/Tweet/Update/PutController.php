<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tweet;
use App\Http\Requests\Tweet\UpdateRequest;

use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        // 自分の投稿でない場合は編集ができない
        if (!$tweetService->checkOwnTweet($request->user()->id, $request->id())) {
            throw new AccessDeniedHttpException();
        }

        // 編集内容をDBに保存
        // 更新するidを指定
        $updateTweet = Tweet::where('id', $request->id())->firstOrFail();

        // $updateTweet->name = $request->test();
        $updateTweet->content = $request->tweet();

        $updateTweet->save();
        return redirect()
            ->route('tweet.update.index', ['tweetId' => $updateTweet->id])
            ->with('feedback.success', 'ツイートを編集しました');
    }
}