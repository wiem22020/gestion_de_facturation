<?php

namespace App\Http\Controllers;
use App\Models\Reglement;
use Illuminate\Http\Request;

class ReglementController extends Controller
{
    public function getLastReglementId()
    {
        $lastReglement = Reglement::orderBy('id', 'desc')->first();
        return response()->json($lastReglement ? $lastReglement->id : 0);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reglements = Reglement::with('facture')->get();
        return response()->json($reglements);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codeReg' => 'required',
            'dateReg' => 'required|date',
            'montant' => 'required',
            'modalite' => 'required',
            'facture_id' => 'required|exists:facture,id'
        ]);
        $reglement = Reglement::create([
            'codeReg' => $request->codeReg,
            'dateReg' => $request->dateReg,
            'montant' => $request->montant,
            'modalite' => $request->modalite,
            'facture_id' => $request->facture_id
        ]);
        
        return response()->json($reglement, 201);
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
