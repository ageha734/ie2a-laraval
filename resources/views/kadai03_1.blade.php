@extends("layouts.kadai")
@section("pageTitle","課題3_1")
@section("title","Bladeのテンプレートで表示する")
@section("content")
@foreach ($collages as $collage)
        <section>
            <h4 class="text-xl font-bold text-pink-600 mb-2">{{ $collage['name'] }}</h4>

        </section>
    @endforeach
@endsection
