@extends('layouts.supplier')

@section('title', 'Admin Dashboard')

@section('content')
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Tous les produits</li>
</ol>
<a href="{{ url('/products/create') }}" class="btn btn-success w-25" >Ajouter un Produit</a>

<div class="row">
    @foreach ($products as $product)
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row justify-content-center mb-3">
                <div class="col-md-12 col-xl-10">
                    <div class="card shadow-0 border rounded-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                        <a href="#!">
                                            <div class="hover-overlay">
                                                <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <h5>{{ $product->name }}</h5>
                                    <div class="d-flex flex-row">
                                        <div class="text-danger mb-1 me-2">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <span>Stock : {{ $product->stock }}</span>
                                    </div>
                                    <div class="mt-1 mb-0 text-muted small">
                                        <span>Ajouté le : {{ $product->created_at }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                    <div class="d-flex flex-row align-items-center mb-1">
                                        <h4 class="mb-1 me-1">{{ $product->price }} Francs</h4>
                                    </div>
                                    <div class="d-flex flex-column mt-4">
                                        <!-- Correct the closing tag for the anchor tag -->
                                        <a href="{{ url('products/'.$product->id . '/edit') }}"
                                            class="btn btn-primary btn-sm">Editer</a>
                                        <form action="{{ url('product/'.$product->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm mt-2 h-100"
                                                onclick="return confirm('Voulez-vous vraiment supprimer ce produits ?');">
                                                Supprimer
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
</div>
@endsection