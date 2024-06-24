<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;

class VilleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Ville::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle'
        ]);
        $ville=Ville::create($request->all());
        return response()->json(['message' => 'Ville ajoutée avec succes', 'ville' => $ville], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Ville::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ville=Ville::findOrFail($id);
        $ville->update($request->all());
        return response()->json(['message' => 'Ville modifiée avec succes', 'ville' => $ville], 201);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Ville::destroy($id);
        return response()->json(['message' => 'Tva deleted successfully'], 204);
    }
}
