@extends('layouts.kadai')

@section('pageTitle', 'kadai04_1')
@section('title', 'フォームのリクエストとバリデーション')

@section('content')
    <section>
        <div class="flex flex-col w-full mb-5">
            <label class="text-gray-400 text-sm">以下のファイルをアップロードしました</label>
            <img src="{{asset('/storage/kadai05_images/'.$image)}}" alt="">
        </div>

        <a href="./kadai05_1">戻る</a>

    </section>
@endsection
