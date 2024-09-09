@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Ajouter un nouvel utilisateur</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="first_name">Prénom:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>
        <div class="form-group mb-3">
            <label for="last_name">Nom :</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>
        <div class="form-group mb-3">
            <label for="telephone">Telephone:</label>
            <input type="text" class="form-control" id="telephone" name="telephone" required>
        </div>
        <div class="form-group mb-3">
            <label for="type">Type:</label>
            <select class="form-control" id="type" name="type" required>
                <option value="admin">Admin</option>
                <option value="supplier">Supplier</option>
                <option value="customer">Clients</option>

            </select>
        </div>
        <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Mot de Passe:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
