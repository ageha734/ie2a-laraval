@extends('layouts.kadai')

@section('pageTitle', "kadai04_1")
@section('title', 'フォームのリクエストとバリデーション')

@section('content')
<section>
    <h3 class="text-xl border-b-2 border-sky-400 pb-2 mb-10">質問内容の確認</h3>
    <div class="flex flex-col w-full mb-5">
        <label class="text-gray-400 text-sm">名前</label>
        <p class="w-full h-10 px-3 py-1 text-lg bg-white border-2 border-gray-200 rounded-md">{{ $result['name'] }}</p>
    </div>
    <div class="flex flex-col w-full mb-5">
        <label class="text-gray-400 text-sm">学籍番号</label>
        <p class="w-full h-10 px-3 py-1 text-lg bg-white border-2 border-gray-200 rounded-md">{{ $result['student_id'] }}</p>
    </div>
    <div class="flex flex-col w-full mb-5">
        <label class="text-gray-400 text-sm">メールアドレス</label>
        <p class="w-full h-10 px-3 py-1 text-lg bg-white border-2 border-gray-200 rounded-md">{{ $result['email'] }}</p>
    </div>
    <div class="flex flex-col w-full mb-5">
        <label class="text-gray-400 text-sm">コース</label>
        <p class="w-full h-10 px-3 py-1 text-lg bg-white border-2 border-gray-200 rounded-md">{{$courses[$result['course']] }}</p>
    </div>
    <div class="flex flex-col w-full mb-5">
        <label class="text-gray-400 text-sm">メモ</label>
        <p class="w-full h-10 px-3 py-1 text-lg bg-white border-2 border-gray-200 rounded-md">{{ $result['note'] }}</p>
    </div>

    <a href="{{route('kadai04_1')}}">入力に戻る</a>

</section>
@endsection
