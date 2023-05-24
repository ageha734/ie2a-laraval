<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kadai02_2 - サーバーサイドスクリプト演習２</title>
</head>

<body>
    <h1>kadai02 Bladeを使ったページの表示</h1>
    <h2>コントローラーからビューへデータを送る</h2>

    @foreach ($courses as $course)
        <section>
            <h3>{{ $course['name'] }}</h3>
            <p>{{ $course['note'] }}</p>
            <p><a href=" {{$course['url'] }}">コース紹介</a></p>
        </section>
    @endforeach

</body>

</html>
