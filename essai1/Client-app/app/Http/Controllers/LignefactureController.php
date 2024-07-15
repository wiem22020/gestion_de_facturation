<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;
use App\Models\Article;
use App\Models\LigneFacture;

class LignefactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ligneFactures = LigneFacture::all();
        return response()->json($ligneFactures);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'facture_id' => 'required|exists:facture,id',
            'article_id' => 'required|exists:article,id',
            'quantity' => 'required|integer|min:1'
        ]);

        try {
            $article = Article::findOrFail($request->article_id);

            $total_ht = $article->prixUnitaireHT * $request->quantity;
            $total_ttc = $total_ht + ($total_ht * $article->tvaArt / 100);

            $ligneFacture = LigneFacture::create([
                'facture_id' => $request->facture_id,
                'article_id' => $request->article_id,
                'code_article' => $article->codeArt,
                'descriptionArt' => $article->descriptionArt,
                'prix_unitaire' => $article->prixUnitaireHT,
                'tva' => $article->tvaArt,
                'quantity' => $request->quantity,
                'total_ht' => $total_ht,
                'total_ttc' => $total_ttc,
            ]);

            return response()->json($ligneFacture, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create ligne facture.', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
