<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Article::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codeArt'=>'required',
            'descriptionArt'=>'required',
            'prixUnitaireHT'=>'required',
            'tvaArt'=>'required',
            'prixUnitaireTTC'=>'required'
        ]);
        $article =  Article::create($request->all());
        return response()->json(['message' => 'Client created successfully', 'article' => $article], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Article::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return response()->json(['message' => 'article updated successfully', 'article' => $article]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::destroy($id);

        return response()->json(['message' => 'Article deleted successfully'], 204);
    }
}
