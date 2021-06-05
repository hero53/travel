<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Resources\ArticleResource;

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
        $article = Article::all();

        return new ArticleResource($article->toJson(JSON_PRETTY_PRINT));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $article = new article ;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();

        return response()->json([
            'success' => 'article créer avec succes',

        ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
        if($article){
            return new ArticleResource($article);
        }else{
            return response()->json(['error'=>'nous avons par retrouver votre article'],404);
        }

       
       
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
        //

         $article = Article::find($article);
        if($article){
            $article->title = $request->title;
            $article->content = $request->content;
            return response()->json(['succesr'=>'Article créer'],200);
        }else{
            return response()->json(['error'=>'nous avons par retrouver votre article'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
        $article->delete();
        return response()->json(['data'=>'article supprimer'],200);
    }
}
