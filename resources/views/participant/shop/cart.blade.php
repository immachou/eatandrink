@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Panier</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(empty($cart))
        <div class="alert alert-info">
            Votre panier est vide.
            <a href="{{ route('participant.shop.index') }}" class="alert-link">Retourner aux stands</a>
        </div>
    @else
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>Prix unitaire</th>
                                        <th>Quantité</th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $id => $details)
                                        <tr>
                                            <td>{{ $details['name'] }}</td>
                                            <td>{{ number_format($details['price'], 2, ',', ' ') }} €</td>
                                            <td>{{ $details['quantity'] }}</td>
                                            <td>{{ number_format($details['price'] * $details['quantity'], 2, ',', ' ') }} €</td>
                                            <td>
                                                <form action="{{ route('participant.shop.removeFromCart', $id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total de la commande</h5>
                        <p class="card-text">
                            <strong>{{ number_format($cartTotal, 2, ',', ' ') }} €</strong>
                        </p>

                        <form action="{{ route('participant.shop.checkout') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="customer_name" class="form-label">Nom</label>
                                <input type="text" name="customer_name" id="customer_name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="customer_email" class="form-label">Email</label>
                                <input type="email" name="customer_email" id="customer_email" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-check"></i> Passer la commande
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
