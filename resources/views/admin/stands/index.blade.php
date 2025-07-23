@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Gestion des demandes de stand</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h4>Demandes en attente</h4>
                    @if($demandesEnAttente->isEmpty())
                        <p>Aucune demande en attente pour le moment.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Entreprise</th>
                                        <th>Contact</th>
                                        <th>Date de demande</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($demandesEnAttente as $demande)
                                        <tr>
                                            <td>{{ $demande->utilisateur->nom_entreprise }}</td>
                                            <td>
                                                {{ $demande->utilisateur->nom_contact }}<br>
                                                {{ $demande->utilisateur->email }}<br>
                                                {{ $demande->utilisateur->telephone }}
                                            </td>
                                            <td>{{ $demande->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <a href="{{ route('admin.stands.show', $demande) }}" class="btn btn-sm btn-info">
                                                    Voir
                                                </a>
                                                <form action="{{ route('admin.stands.approuver', $demande) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">
                                                        Approuver
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.stands.rejeter', $demande) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        Rejeter
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <hr>

                    <h4>Historique des demandes</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Entreprise</th>
                                    <th>Statut</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($demandesTraitees as $demande)
                                    <tr>
                                        <td>{{ $demande->utilisateur->nom_entreprise }}</td>
                                        <td>
                                            @if($demande->statut === 'approuve')
                                                <span class="badge bg-success">Approuvé</span>
                                            @else
                                                <span class="badge bg-danger">Rejeté</span>
                                            @endif
                                        </td>
                                        <td>{{ $demande->updated_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.stands.show', $demande) }}" class="btn btn-sm btn-info">
                                                Voir
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $demandesTraitees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection