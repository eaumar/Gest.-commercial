<!-- resources/views/factures/create.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Ajouter une facture</h1>
    <form action="{{ route('factures.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="numero_facture" class="form-label">Numéro de facture</label>
            <input type="text" class="form-control" id="numero_facture" name="numero_facture" required>
        </div>
        <div class="mb-3">
            <label for="date_facture" class="form-label">Date de facture</label>
            <input type="date" class="form-control" id="date_facture" name="date_facture" required>
        </div>
        <div class="mb-3">
            <label for="montant" class="form-label">Montant</label>
            <input type="number" step="0.01" class="form-control" id="montant" name="montant" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
