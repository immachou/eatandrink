@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Détails de la demande de stand</div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Informations de l'entreprise</h5>
                            <p><strong>Nom :</strong> {{ $stand->utilisateur->nom_entreprise }}</p>
                            <p><strong>Contact :</strong> {{ $stand->utilisateur->nom_contact }}</p>
                            <p><strong>Email :</strong> {{ $stand->utilisateur->email }}</p>
                            <p><strong>Téléphone :</strong> {{ $stand->utilisateur->telephone }}</p>
                            <p><strong>SIRET :</strong> {{ $stand->utilisateur->siret }}</p>
                            <p><strong>Adresse :</strong> {{ $stand->utilisateur->adresse }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Détails du stand</h5>
                            <p><strong>Type :</strong> {{ $stand->type }}</p>
                            <p><strong>Surface :</strong> {{ $stand->surface }} m²</p>
                            <p><strong>Description :</strong> {{ $stand->description }}</p>
                            <p><strong>Date de la demande :</strong> {{ $stand->created_at->format('d/m/Y H:i') }}</p>
                            <p>
                                <strong>Statut :</strong>
                                @if($stand->statut === 'en_attente')
                                    <span class="badge bg-warning">En attente</span>
                                @elseif($stand->statut === 'approuve')
                                    <span class="badge bg-success">Approuvé</span>
                                @else
                                    <span class="badge bg-danger">Rejeté</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.stands.index') }}" class="btn btn-secondary">
                            Retour à la liste
                        </a>
                        
                        @if($stand->statut === 'en_attente')
                            <div>
                                <form action="{{ route('admin.stands.approuver', $stand) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        Approuver la demande
                                    </button>
                                </form>
                                <form action="{{ route('admin.stands.rejeter', $stand) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        Rejeter la demande
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection