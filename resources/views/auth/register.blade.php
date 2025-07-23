@extends('layouts.app')

@section('content')
<div class="auth-page">
    <div class="auth-card">
        <div class="text-center mb-4">
            <h2 class="fw-bold">{{ __('Créer un compte') }}</h2>
            <p class="text-muted">Rejoignez notre communauté</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">{{ __('Nom complet') }} <span class="text-danger">*</span></label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">{{ __('Adresse Email') }} <span class="text-danger">*</span></label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="nom_entreprise" class="form-label">{{ __('Nom de l\'entreprise') }} <span class="text-danger">*</span></label>
                        <input id="nom_entreprise" type="text" class="form-control @error('nom_entreprise') is-invalid @enderror"
                               name="nom_entreprise" value="{{ old('nom_entreprise') }}" required>
                        @error('nom_entreprise')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="nom_contact" class="form-label">{{ __('Nom du contact') }} <span class="text-danger">*</span></label>
                        <input id="nom_contact" type="text" class="form-control @error('nom_contact') is-invalid @enderror"
                               name="nom_contact" value="{{ old('nom_contact') }}" required>
                        @error('nom_contact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">{{ __('Mot de passe') }} <span class="text-danger">*</span></label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                               name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="password-confirm" class="form-label">{{ __('Confirmer le mot de passe') }} <span class="text-danger">*</span></label>
                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="adresse" class="form-label">{{ __('Adresse') }} <span class="text-danger">*</span></label>
                        <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror"
                               name="adresse" value="{{ old('adresse') }}" required>
                        @error('adresse')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="telephone" class="form-label">{{ __('Téléphone') }} <span class="text-danger">*</span></label>
                        <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror"
                               name="telephone" value="{{ old('telephone') }}" required>
                        @error('telephone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="siret" class="form-label">{{ __('Numéro SIRET') }} <span class="text-danger">*</span></label>
                        <input id="siret" type="text" class="form-control @error('siret') is-invalid @enderror"
                               name="siret" value="{{ old('siret') }}" required maxlength="14">
                        @error('siret')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">{{ __('Description') }}</label>
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                                  name="description" rows="2">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>



            <div class="form-group mb-4">
                <div class="form-check">
                    <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox" name="terms" id="terms" {{ old('terms') ? 'checked' : '' }}>
                    <label class="form-check-label" for="terms">
                        {{ __('J\'accepte les conditions d\'utilisation') }} <span class="text-danger">*</span>
                    </label>
                    @error('terms')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">
                    {{ __('S\'inscrire') }}
                </button>
            </div>

            <div class="text-center mt-4">
                <p class="mb-0">Déjà inscrit ?
                    <a href="{{ route('login') }}" class="text-primary fw-bold">Se connecter</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
