@extends('layouts.kadai')

@section('pageTitle', 'kadai08_2')
@section('title', 'EloquentORM 更新')

@section('content')
    <section>
        <form action="{{ route('kadai06_1.update', $article->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="bg-white hover:bg-white p-5 mb-10 rounded-md shadow-md">
                <div class="my-5 px-5 py-2 border-b">
                    <label class="block text-gray-500 text-sm uppercase" for="title">title</label>
                    <input type="text" name="title" id="title"
                        class="w-full text-2xl font-bold leading-10 border border-gray-300 rounded-md"
                        value="{{ $article->title }}">
                    @error('title')
                        <p class="text-sm text-red-600 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between py-3">
                    <div class="w-4/12 mr-5">
                        <label class="block text-gray-500 text-sm uppercase" for="image">image file</label>
                        <input type="file" name="image" id="image"
                            class="w-full h-80 text-xs px-3 py-2 border border-gray-300 rounded-md" value="">
                        @error('image')
                            <p class="text-sm text-red-600 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grow">
                        <label class="block text-gray-500 text-sm uppercase" for="body">body</label>
                        <textarea name="body" class="w-full h-80 text-lg px-3 py-2 border border-gray-300 rounded-md resize-none">{{ $article->body }}</textarea>
                        @error('body')
                            <p class="text-sm text-red-600 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('kadai06_1.index') }}"
                    class="block w-16 text-white text-center bg-gray-500 hover:bg-gray-400 mr-5 px-3 py-2 rounded-md">戻る</a>

                <button type="submit"
                    class="block w-20 text-white text-center bg-pink-600 hover:bg-pink-500 px-3 py-2 rounded-md">編集</button>

            </div>
        </form>
    </section>
@endsection
