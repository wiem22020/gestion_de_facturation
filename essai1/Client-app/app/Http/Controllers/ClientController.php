<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Client::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'phone' => 'required',
            'MF' => 'required',
        ]);
        $client = Client::create($request->all());
        return response()->json(['message' => 'Client created successfully', 'client' => $client], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Client::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);
        $client->update($request->all());

        return response()->json(['message' => 'Client updated successfully', 'client' => $client]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Client::destroy($id);

        return response()->json(['message' => 'Client deleted successfully'], 204);
    }
}
