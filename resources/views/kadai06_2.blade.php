@extends('layouts.kadai')

@section('pageTitle', 'kadai07_1')
@section('title', 'EloquentORM 条件を使った参照')

@section('content')
    <section>
        <div class="bg-white hover:bg-white p-5 mb-10 rounded-md shadow-md">
            <h3 class="text-2xl font-bold leading-10 my-5 px-5 py-2 border-b">{{ $article->title }}</h3>
            <p class="text-gray-400 text-sm text-right px-3"><time
                    datetime="{{ $article->created_at }}">{{ $article->created_at }}</time></p>
            <div class="flex justify-between py-3">
                <p class="text-lg leading-loose px-3 py-5">{{ $article->body }}</p>
            </div>
            <div class="flex flex-row space-x-16">
                @foreach ($article->thumbnails as $thumbnail)
                    <figure>
                        <img src='{{ asset('/storage/article_images/' . $thumbnail->name) }}'>
                    </figure>
                @endforeach
            </div>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('kadai06_1.index') }}"
                class="block w-16 text-white text-center bg-gray-500 hover:bg-gray-400 mr-5 px-3 py-2 rounded-md">戻る</a>
            <form action="{{ route('kadai06_1.destroy', $article->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit"
                    class="block w-16 text-white text-center bg-red-600 hover:bg-red-500 mr-5 px-3 py-2 rounded-md">削除</button>
            </form>
            <a href="{{ route( "kadai06_1.edit", $article->id ) }}"
                class="block w-20 text-white text-center bg-pink-600 hover:bg-pink-500 px-3 py-2 rounded-md">編集</a>
        </div>
    </section>
@endsection
