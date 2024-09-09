@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Gestion des utilisateurs</h2>
    <!-- Button to Add New User -->
  

    <!-- User List -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Telephone</th>
                <th>Type</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($suppliers as $u)
            <tr>
                <td>{{ $u['id'] }}</td>
                <td>{{ $u['first_name'] }}</td>
                <td>{{ $u['last_name'] }}</td>
                <td>{{ $u['telephone'] }}</td>
                <td>{{ $u['type'] }}</td>
                <td>{{ $u['email'] }}</td>
                <td>
                <a href="" class="btn btn-primary">Voir details</a>                
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
