@extends('layouts.supplier')

@section('content')
<div class="container">
    <h2>Ajouter un Produit</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Nom:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group mb-3">
            <label for="price">Prix:</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group mb-3">
            <label for="stock">Stock:</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>      
        <button type="submit" class="btn btn-primary">Ajouter un produit</button>
    </form>
</div>
@endsection
