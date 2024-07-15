<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;


class FactureController extends Controller
{
    public function getLastFactureId()
    {
        $lastFacture = Facture::orderBy('id', 'desc')->first();
        return response()->json($lastFacture ? $lastFacture->id : 0);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $factures = Facture::with('client')->get();
        return response()->json($factures);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'date' => 'required|date',
            'client_id' => 'required|exists:clients,id'
        ]);
        $facture = Facture::create([
            'code' => $request->code,
            'date' => $request->date,
            'client_id' => $request->client_id
        ]);
        
        return response()->json($facture, 201);
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
