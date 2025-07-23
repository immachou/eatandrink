@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Statut de votre demande</div>

                <div class="card-body text-center">
                    @if($stand->statut === 'en_attente')
                        <div class="alert alert-warning">
                            <h4 class="alert-heading">En attente de validation</h4>
                            <p>Votre demande de stand est en cours d'examen par notre équipe.</p>
                            <hr>
                            <p class="mb-0">Date de soumission : {{ $stand->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    @elseif($stand->statut === 'approuve')
                        <div class="alert alert-success">
                            <h4 class="alert-heading">Demande approuvée !</h4>
                            <p>Félicitations ! Votre demande de stand a été approuvée.</p>
                            <hr>
                            <p class="mb-0">Date d'approbation : {{ $stand->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    @else
                        <div class="alert alert-danger">
                            <h4 class="alert-heading">Demande rejetée</h4>
                            <p>Votre demande de stand n'a pas été approuvée.</p>
                            <hr>
                            <p class="mb-0">Date de rejet : {{ $stand->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    @endif

                    <div class="card mt-4">
                        <div class="card-header">Détails de votre demande</div>
                        <div class="card-body text-start">
                            <p><strong>Type de stand :</strong> {{ ucfirst($stand->type) }}</p>
                            <p><strong>Surface demandée :</strong> {{ $stand->surface }} m²</p>
                            <p><strong>Description :</strong> {{ $stand->description }}</p>
                            @if($stand->besoins_specifiques)
                                <p><strong>Besoins spécifiques :</strong> {{ $stand->besoins_specifiques }}</p>
                            @endif
                            <p><strong>Statut :</strong> 
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

                    @if($stand->statut === 'approuve')
                        <div class="mt-4">
                            <a href="{{ route('entrepreneur.dashboard') }}" class="btn btn-primary">
                                Accéder à votre espace
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection