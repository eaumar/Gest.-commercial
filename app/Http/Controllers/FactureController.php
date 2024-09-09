<?php

namespace App\Http\Controllers;
use App\Models\Facture;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function create()
    {
        return view('factures.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero_facture' => 'required|string|max:255',
            'date_facture' => 'required|date',
            'montant' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        Facture::create($request->all());

        return redirect()->route('factures.index');
    }
    public function index()
    {
        $factures = Facture::all();
        return view('factures.index', compact('factures'));
    }
}
