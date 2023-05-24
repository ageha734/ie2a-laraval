<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Kadai05_1Request;
use Illuminate\Support\Facades\Storage;


class Kadai05_1Controller extends Controller
{
    //
    public function index()
    {
        return view('kadai05_1');
    }

    //postメソッド
    public function post(Kadai05_1Request $request)
    {

        $image = Storage::disk('public')->put('/kadai05_images/',$request->image);
        $image = basename($image);
        // CSRFトークンを破棄
        $request->session()->regenerateToken();
        return view('kadai05_2', compact('image'));
    }
}
