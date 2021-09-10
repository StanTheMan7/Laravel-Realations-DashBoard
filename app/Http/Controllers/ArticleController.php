<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('backoffice.articles.indexA', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('backoffice.articles.createArticle', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            "nom"=>["required", "min:1", "max:10"],
            "description"=>["required", "min:1", "max:10"],
            "dateDePublication"=>["required", "min:1", "max:15"],
            "user_id" =>["numeric", "min:1", "max:5"]
            
        ]);
        $newEntry = new Article();
        $newEntry->nom = $request->nom;
        $newEntry->description = $request->description;
        $newEntry->dateDePublication = $request->dateDePublication;
        $newEntry->user_id = $request->user_id;
        $newEntry->save();
        return redirect()->route('articles.index')->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('backoffice.articles.showArticle', compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('backoffice.articles.showArticle', compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        request()->validate([
            "nom"=>["required", "min:1", "max:10"],
            "description"=>["required", "min:1", "max:10"],
            "dateDePublication"=>["required", "min:1", "max:15"],
            "user_id" =>["numeric", "min:1", "max:5"]
            
        ]);
        $newEntry = new Article();
        $newEntry->nom = $request->nom;
        $newEntry->description = $request->description;
        $newEntry->dateDePublication = $request->dateDePublication;
        $newEntry->user_id = $request->user_id;
        $newEntry->save();
        return redirect()->route('articles.index')->with('message', 'Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route("articles.index")->with('message','Task is completely deleted');
    }
}
