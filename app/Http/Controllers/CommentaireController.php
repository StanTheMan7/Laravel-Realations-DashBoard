<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentaires =  Commentaire::all();
        return view('backoffice.commentaires.indexC', compact('commentaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles = Article::all();
        return view('backoffice.commentaires.createCommentaire', compact('articles'));
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
            "contenu"=>["required", "min:1", "max:1000"],
            "article_id"=>["required", "min:1", "max:500"],
            
        ]);
        $newEntry = new Commentaire();
        $newEntry->contenu = $request->contenu;
        $newEntry->article_id = $request->article_id;
        $newEntry->save();
        return redirect()->route('commentaires.index')->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Commentaire $commentaire)
    {
        return view('backoffice.commentaires.showCommentaire', compact('commentaire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Commentaire $commentaire)
    {
        return view('backoffice.commentaires.showCommentaire', compact('commentaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        request()->validate([
            "contenu"=>["required", "min:1", "max:1000"],
            "article_id"=>["required", "min:1", "max:500"],
            
        ]);
        $newEntry = new Commentaire();
        $newEntry->contenu = $request->contenu;
        $newEntry->article_id = $request->article_id;
        $newEntry->save();
        return redirect()->route('commentaires.index')->with('message', 'Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->route("commentaires.index")->with('message','Task is completely deleted');
    }
}
