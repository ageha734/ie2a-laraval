@extends('layouts.kadai')
@section('pageTitle', '課題9_1')
@section('title', '枚方市の今日の天気')
@section('content')

    <section>
        {{ $json['city']['name'] }}<br>
        {{ $json['list'][0]['dt'] }}<br>
        {{ $json['list'][0]['main']['temp'] }}<br>
        {{ $json['list'][0]['weather'][0]['icon'] }}<br>
        {{\Carbon\Carbon::parse($json['list'][0]['dt'])->isoFormat('YYYY年MM月DD日(ddd) HH時')}}<br>
        <img src='http://openweathermap.org/img/w/{{$json['list'][0]['weather'][0]['icon'] }}.png'>

    </section>

@endsection
