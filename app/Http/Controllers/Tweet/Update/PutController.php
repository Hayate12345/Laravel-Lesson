<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tweet;
use App\Http\Requests\Tweet\UpdateRequest;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request)
    {
        // 編集内容をDBに保存
        // 更新するidを指定
        $updateTweet = Tweet::where('id', $request->id())->firstOrFail();

        $updateTweet->name = $request->test();
        $updateTweet->content = $request->tweet();

        $updateTweet->save();
        return redirect()
            ->route('tweet.update.index', ['tweetId' => $updateTweet->id])
            ->with('feedback.success', 'ツイートを編集しました');
    }
}