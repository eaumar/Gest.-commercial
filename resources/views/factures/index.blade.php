<!-- resources/views/factures/index.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Liste des factures</h1>

    <!-- Ajouter un bouton pour créer une nouvelle facture -->
    <a href="{{ route('factures.create') }}" class="btn btn-primary mb-3">Ajouter une facture</a>

    <!-- Table des factures -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Numéro</th>
                <th>Date</th>
                <th>Montant</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($factures as $facture)
                <tr>
                    <td>{{ $facture->numero_facture }}</td>
                    <td>{{ $facture->date_facture }}</td>
                    <td>{{ $facture->montant }} francs</td>
                    <td>{{ $facture->description }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
