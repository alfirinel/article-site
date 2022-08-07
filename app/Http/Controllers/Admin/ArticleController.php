<?php

namespace App\Http\Controllers\Admin;

use App\Model\Article;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $articles = DB::table('articles')->paginate(3);

        $articles = Article::paginate(3);
        return view('admin.articles.index', ['articles' => $articles]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:255|min:5',
            'article'=>'required|min:100'
        ]);
        $request->user()->articles()->create([
            'name' => $request->name,
            'article'=>$request->article,
        ]);
        return redirect(route('admin.article.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit($article)
    {
        $result = Article::find($article);
        return view('admin.articles.edit')->with('articleUnderEdit', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->validate($request, [
            'updatedName'=>'required|max:255|min:5',
            'updatedArticle'=>'required|min:100'
        ]);
        $article->name = $request->updatedName;
        $article->article = $request->updatedArticle;

        $article->save();
        return redirect(route('admin.article.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($article)
    {
        $result = Article::find($article);
        $result->delete();
        return redirect(route('admin.article.index'));
    }
}
