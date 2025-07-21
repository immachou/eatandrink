@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Nos Exposants</h1>

    <div class="row">
        @foreach($stands as $stand)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $stand->name }}</h5>
                        <p class="card-text">{{ Str::limit($stand->description, 150) }}</p>
                        <a href="{{ route('participant.shop.show', $stand) }}" class="btn btn-primary w-100">
                            Voir les produits
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
