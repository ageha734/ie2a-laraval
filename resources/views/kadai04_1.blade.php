@extends('layouts.kadai')

@section('pageTitle', "kadai04_1")
@section('title', 'フォームのリクエストとバリデーション')

@section('content')
<section>
    <h3 class="text-xl border-b-2 border-sky-400 pb-2 mb-10">質問の投稿</h3>
    <form action="/kadai04_1" method="POST">
        @csrf
        <div class="flex justify-between flex-col lg:flex-row items-stretch mb-5">
            <div class="flex flex-col w-full lg:w-6/12 mr-5">
                <div class="flex flex-col w-full mb-5">
                    <label class="text-gray-400 text-sm">名前<em class="text-pink-600">※</em></label>
                    <input type="text" name="name" value="{{ old('name') }}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 rounded-md outline-none">
                    @error('name')
                    <p class="text-xs text-pink-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col w-full mb-5">
                    <label class="text-gray-400 text-sm">学籍番号<em class="text-xs text-pink-600">※</em></label>
                    <input type="text" name="student_id" value="{{ old('student_id') }}" maxlength="7" class="w-full h-10 px-3 text-lg border-2 border-gray-200 rounded-md outline-none">
                    @error('student_id')
                    <p class="text-xs text-pink-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col w-full mb-5">
                    <label class="text-gray-400 text-sm">メールアドレス</label>
                    <input type="text" name="email" value="{{ old('email') }}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 rounded-md outline-none">
                    @error('email')
                    <p class="text-xs text-pink-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col w-full mb-5">
                    <label class="text-gray-400 text-sm">コース</label>
                    <select name="course" class="w-full h-10 px-3 border-2 border-gray-200 rounded-md outline-none">
                    @foreach( $courses as $course )
                        <option value="{{ $course['id'] }}" @if(old('course') == $course['id']) selected @endif>{{ $course['name'] }}</option>
                    @endforeach
                    </select>
                    @error('course')
                    <p class="text-xs text-pink-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-col items-stretch flex-grow">
                <label class="text-gray-400 text-sm">メッセージ</label>
                <textarea name="note" class="w-full h-40 lg:h-full text-lg px-2 py-2 border-2 border-gray-200 rounded-md">{{ old('note') }}</textarea>
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="text-white text-center leading-10 bg-pink-600 px-10 hover:bg-pink-500 rounded-md">送信</button>
        </div>
    </form>

</section>
@endsection
