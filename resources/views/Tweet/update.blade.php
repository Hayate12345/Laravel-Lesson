<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>投稿を編集する</h1>
    <div>
        <a href="{{ route('tweet.index') }}">戻る</a>

        @if (session('feedback.success'))
            <p style="color: green">{{ session('feedback.success') }}</p>
        @endif

        {{-- RouteのtweetIdはulrから --}}
        <form action="{{ route('tweet.update.put', ['tweetId' => $tweet->id]) }}" method="POST">
            @method('PUT')
            @csrf
            <label>今どうしてる？</label>
            <span>140字まで</span>
            <br>
            <textarea name="tweet" id="tweet-content" placeholder="今、どうしてる？？" cols="100" rows="5">{{ $tweet->content }}</textarea>

            {{-- バリーデーションの表示 --}}
            @error('tweet')
                <p style="color: red">{{ $message }}</p>
            @enderror

            <button type="submit">編集</button>
        </form>
    </div>
</body>

</html>
