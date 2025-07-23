@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tableau de bord administrateur</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Bienvenue dans votre espace administrateur</h4>
                    <p>Ici, vous pourrez :</p>
                    <ul>
                        <li>Gérer les utilisateurs</li>
                        <li>Approuver les demandes de stands</li>
                        <li>Voir les statistiques</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection