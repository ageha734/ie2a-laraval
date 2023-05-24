<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Thumbnail;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $articles = Article::all();

        //作成日の降順に１０件ずつレコードを取得課題７で修正
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);

        return view('kadai06_1', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kadai08_1');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        //
        $article = new Article();
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        ///////////画像追加部分////////
        $thumbnail = new Thumbnail();
        if (isset($request->image)) {
            $image = Storage::disk('public')->put('/article_images/', $request->image);
            $thumbnail->name = basename($image);
        }
        ////////////////////
        DB::transaction(function () use ($article, $thumbnail) {
            $article->save();
            ///////////画像追加部分////////
            if ($thumbnail->name != "") {
                $thumbnail->article_id = $article->id;
                $thumbnail->save();
            }
            ///////////////////////////////////
        });
        // CSRFトークンを破棄
        $request->session()->regenerateToken();
        return redirect(route('kadai06_1.index'));    //一覧表示にリダイレクト

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //1件検索
        $article = Article::find($id);
        return view('kadai06_2', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //1件検索
        $article = Article::find($id);
        return view('kadai08_2', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, $id)
    {
        //PHP1ではまった内容そのままはまった。
        //MySQLは、最初のSQLが実行されたとき（それがselect文でも）にトランザクションがBIGINされる。
        //なので、commitしないまま次のトランザクションをはじめようとするとPDOエラーがおこる。
        //更新の場合は、1件検索必須なので、findのところからトランサクションで囲む必要がある。
        DB::transaction(function () use ($id, $request) {
            $article = Article::find($id);

            $article->title = $request->input('title');
            $article->body = $request->input('body');
            $article->save();
        });
        // CSRFトークンを破棄
        $request->session()->regenerateToken();
        return redirect(route('kadai06_1.index'));    //一覧表示にリダイレクト
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::transaction(function () use ($id) {
            Article::destroy($id);    //テーブルの内容を変更する処理
        });
        return redirect('/kadai06_1/');    //一覧表示にリダイレクト

    }
}
