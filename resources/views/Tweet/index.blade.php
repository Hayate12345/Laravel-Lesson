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
        <form action="{{ route('tweet.create') }}" method="POST">
            @csrf
            <label>今どうしてる？</label>
            <span>140字まで</span>
            <label>名前：<input type="text" name="name"></label>
            @error('name')
                <p style="color: red">{{ $message }}</p>
            @enderror
            <br>
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
            <hr>
            <p>{{ $tweet->name }}</p>
            <p>{{ $tweet->content }} 投稿時間{{ $tweet->created_at }}</p>
        @endforeach
    </div>
</body>

</html>
