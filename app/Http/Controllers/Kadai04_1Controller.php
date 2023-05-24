<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Kadai04_1Request;

class Kadai04_1Controller extends Controller
{
    //indexメソッド
    public function index()
    {
        $courses = [
            [
                'id'   => 1,
                'name' => 'IT開発エキスパート',
            ],
            [
                'id'   => 2,
                'name' => 'IT開発研究',
            ],
            [
                'id'   => 3,
                'name' => 'システムエンジニア',
            ],
            [
                'id'   => 4,
                'name' => 'Webデザイン',
            ],
        ];

        return view('kadai04_1', compact('courses'));
    }
    //postメソッド
    public function post(Kadai04_1Request $request)
    {

        $courses = [
            1 => 'IT開発エキスパート',
            2 => 'IT開発研究',
            3 => 'システムエンジニア',
            4 => 'Webデザイン',
        ];


        $result = [];
        $result['name'] = $request->input('name');
        $result['student_id'] = $request->input('student_id'); //以下は自分で書くこと
        $result['email'] = $request->input('email'); //以下は自分で書くこと
        $result['course'] = $request->input('course'); //以下は自分で書くこと
        $result['note'] = $request->input('note'); //以下は自分で書くこと

        // CSRFトークンを破棄
        $request->session()->regenerateToken();
        return view('kadai04_2', compact('result','courses'));
    }
}
