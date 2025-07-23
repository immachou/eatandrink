@extends('layouts.app')

@section('content')
<div class="auth-page">
    <div class="auth-card">
        <div class="text-center mb-4">
            <h2 class="fw-bold">{{ __('Connexion') }}</h2>
            <p class="text-muted">Accédez à votre espace personnel</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group mb-3">
                <label for="email" class="form-label">{{ __('Adresse Email') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="role" class="form-label">{{ __('Je me connecte en tant que') }}</label>
                <select id="role" class="form-select @error('role') is-invalid @enderror" name="role" required>
                    <option value="">Sélectionnez un rôle</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrateur</option>
                    <option value="entrepreneur_approuve" {{ old('role') == 'entrepreneur_approuve' ? 'selected' : '' }}>Entrepreneur</option>
                </select>
                @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Se souvenir de moi') }}
                    </label>
                </div>
                @if (Route::has('password.request'))
                    <a class="text-primary" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                @endif
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">
                    {{ __('Se connecter') }}
                </button>
            </div>

            <div class="text-center mt-4">
                <p class="mb-0">Pas encore de compte ?
                    <a href="{{ route('register') }}" class="text-primary fw-bold">S'inscrire</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
