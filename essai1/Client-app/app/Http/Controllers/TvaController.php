<?php

namespace App\Http\Controllers;

use App\Models\Tva;
use Illuminate\Http\Request;

class TvaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Tva::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service' => 'required',
            'valeur' => 'required',
            
        ]);
        $tva = Tva::create($request->all());
        return response()->json(['message' => 'TVA ajouté avec succes', 'tva' => $tva], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Tva::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tva = Tva::findOrFail($id);
        $tva->update($request->all());

        return response()->json(['message' => 'tva updated successfully', 'tva' => $tva]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tva::destroy($id);

        return response()->json(['message' => 'Tva deleted successfully'], 204);
    }
}
