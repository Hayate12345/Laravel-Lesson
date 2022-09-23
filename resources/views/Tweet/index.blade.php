<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tweet</title>
</head>

<body>
    <h1>つぶやきアプリ</h1>

    <div>
        <p>投稿フォーム</p>

        @if (session('feedback.success'))
            <p style="color: green">{{ session('feedback.success') }}</p>
        @endif

        <form action="{{ route('tweet.create') }}" method="POST">
            @csrf
            <label>今どうしてる？</label>
            <span>140字まで</span>
            <textarea name="tweet" id="tweet-content" placeholder="今、どうしてる？？" cols="100" rows="5"></textarea>

            {{-- バリーデーションの表示 --}}
            @error('tweet')
                <p style="color: red">{{ $message }}</p>
            @enderror



            <button type="submit">ツイート</button>
        </form>
    </div>

    <div>
        @foreach ($tweets as $tweet)
            <details>
                <summary>
                    <p>{{ $tweet->user->name }}</p>
                    <p>{{ $tweet->content }} 投稿時間{{ $tweet->created_at }}</p>
                </summary>

                <div>
                    @if (\Illuminate\Support\Facades\Auth::id() === $tweet->user_id)
                        <a href="{{ route('tweet.update.index', ['tweetId' => $tweet->id]) }}">編集</a>

                        <form action="{{ route('tweet.delete', ['tweetId' => $tweet->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit">削除</button>
                        </form>
                    @else
                        {{-- ログイン当人でないと権限がない 編集、削除を表示しない --}}
                    @endif
                </div>
            </details>
            <hr>
        @endforeach
    </div>
</body>

</html>
