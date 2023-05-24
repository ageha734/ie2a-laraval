<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Kadai02_1Controller extends Controller
{
    public function index(){
        $message = "コントローラーからビューへ渡された値。";
        $today = new Carbon();
        return view('kadai02_1', compact('message','today'));
  }
}
