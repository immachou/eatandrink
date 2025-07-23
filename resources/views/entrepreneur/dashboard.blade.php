@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mon espace entrepreneur</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card text-white bg-primary h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Mon stand</h5>
                                    <p class="card-text">Gérez les informations de votre stand.</p>
                                    <a href="#" class="btn btn-light">Voir mon stand</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card text-white bg-success h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Mes produits</h5>
                                    <p class="card-text">Gérez votre catalogue de produits.</p>
                                    <a href="#" class="btn btn-light">Gérer les produits</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card text-white bg-info h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Statistiques</h5>
                                    <p class="card-text">Consultez vos statistiques de vente.</p>
                                    <a href="#" class="btn btn-light">Voir les statistiques</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            Dernières activités
                        </div>
                        <div class="card-body">
                            <p>Ici seront affichées vos dernières activités et notifications.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection