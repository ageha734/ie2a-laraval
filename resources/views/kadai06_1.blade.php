@extends('layouts.kadai')

@section('pageTitle', 'kadai06_1')
@section('title', 'EloquentORM 参照')

@section('content')

    <div class="flex justify-end mb-10">
        <a href="{{ route('kadai06_1.create') }}"
            class="block w-24 text-white text-center bg-sky-600 hover:bg-sky-500 px-3 py-2 rounded-md">新規投稿</a>
    </div>

    <section class="grid grid-cols-1 lg:grid-cols-3 gap-10 mb-10">
        @foreach ($articles as $article)
            <article class=" bg-white hover:bg-white rounded-md shadow-md hover:shadow-lg transition-shadow">
                <a href="{{ route( "kadai06_1.show", $article->id ) }}" class="block w-full h-full">
                    @empty($article->thumbnail->name)
                    @else
                        <figure>
                            <img src='{{ asset('/storage/article_images/' . $article->thumbnail->name) }}'>
                        </figure>
                    @endempty
                    <h3 class="font-bold mt-5 mb-2 px-2">{{ $article->title }}</h3>
                    <p class="text-md p-5">{{ Str::limit($article->body, 30, '...') }}</p>
                    <p class="text-gray-400 text-xs mb-5 px-2">
                        <time datetime="{{ $article->created_at }}">
                            {{ $article->created_at }}
                        </time>
                    </p>
                </a>
            </article>
        @endforeach
    </section>
    {{ $articles->links() }}

@endsection
