@extends('layouts.kadai')
@section('pageTitle', '課題9_3')
@section('title', 'ERROR')
@section('content')

    <section>
        <h1 class='text-pink-600'>ERROR!!!!!</h1>
        <h2>{{ $json['message'] }} (code:{{ $json['cod'] }})</h2>

    </section>

@endsection
