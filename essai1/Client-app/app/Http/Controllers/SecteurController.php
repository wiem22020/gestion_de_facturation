<?php

namespace App\Http\Controllers;

use App\Models\Secteur;
use Illuminate\Http\Request;


class SecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Secteur::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle'
        ]);
        $secteur = Secteur::create($request->all());
        return response()->json(['message' => 'Secteur ajoutée avec succes', 'secteur$secteur' => $secteur], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Secteur::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $secteur = Secteur::findOrFail($id);
        $secteur->update($request->all());
        return response()->json(['message' => 'Secteur modifiée avec succes', 'secteur$secteur' => $secteur], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Secteur::destroy($id);
        return response()->json(['message' => 'Tva deleted successfully'], 204);
    }
}
