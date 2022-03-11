<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticlesExtra;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::where(['user_id'=>$request->session()->get('user')->id])->get()->all();
        return view('articles.index',[
            'articles'=>$articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->input();
        $lastId = Article::insertGetId([
            'title'=>$inputs['title'],
            'content'=>$inputs['content'],
            'user_id'=>$request->session()->get('user')->id,
        ]);

        ArticlesExtra::insert([
            'article_id'=>$lastId,
            'cats'=>$inputs['categories'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::where(['id'=>$id])->first();
        return view('articles.show')->with('article',$article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::where(['id'=>$id])->first();
        $cats = ArticlesExtra::where(['article_id'=>$article->id])->first()->cats;
        return view('articles.edit',[
            'article'=>$article,
            'cats'=>$cats
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->input();
        Article::find($id)->update([
            'title'=>$inputs['title'],
            'content'=>$inputs['content'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();

        return back();
    }
}
