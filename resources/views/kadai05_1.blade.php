@extends('layouts.kadai')

@section('pageTitle', "kadai05_1")
@section('title', 'ファイルのアップロード')

@section('content')
<section>
    <h3 class="text-xl border-b-2 border-sky-400 pb-2 mb-10">画像ファイルをアップロードします</h3>
    <form action="/kadai05_1" method="POST" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="flex justify-between flex-col lg:flex-row items-stretch mb-5">
            <div class="flex flex-col w-full lg:w-6/12 mr-5">
                <div class="flex flex-col w-full mb-5">
                    <input type="file" class="form-control" name="image">
                    @error('image')
                    <p class="text-xs text-pink-600">{{ $message }}</p>
                    @enderror
                </div>

        <div class="flex justify-end">
            <button type="submit" class="text-white text-center leading-10 bg-pink-600 px-10 hover:bg-pink-500 rounded-md">送信</button>
        </div>
    </form>

</section>
@endsection
