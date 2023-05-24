<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kadai09_1Controller extends Controller
{
    //
    public function index()
    {
        $url = 'http://api.openweathermap.org/data/2.5/forecast?q=Hirakata,JP&mode=json&appid=003ef1d65597b85d2ab6fa19b59383b6&lang=ja&units=metric';
        $response = Http::get($url);
        $json = $response->json();

        if ($response->successful()) {
            return view('kadai09_1', compact('json'));
        }else{
            return view('kadai09_2', compact('json'));
        }

    }
}
