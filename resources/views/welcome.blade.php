<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Découvrez une expérience culinaire unique avec notre application de gestion de stands de nourriture et de boissons.">

    <title>Eat & Drink - Votre destination culinaire</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,600,700&display=swap" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">

    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                        url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            color: white;
            padding-top: 76px; /* Hauteur de la navbar */
        }

        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: transparent;
            border-radius: 10px;
            overflow: hidden;
            height: 100%;
            color: white;
            border: 1px solid rgba(0,0,0,0.1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background-color: #FF6B6B;
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #FF5252;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #FFD166 !important;
        }

        .logo-text {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            text-decoration: none;
        }

        .logo-text span {
            color: #FFD166;
        }

        /* Ajustement pour le contenu sous la navbar fixe */
        body {
            padding-top: 76px;
        }

        /* Correction pour les icônes Font Awesome */
        .fa-3x {
            color: #FF6B6B;
        }
    </style>
</head>
<body class="antialiased">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: rgba(0, 0, 0, 0.7);">
        <div class="container">
            <a class="navbar-brand logo-text" href="#">Eat<span>&</span>Drink</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fonctionnalités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">À Propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary ms-3" href="{{ route('register') }}">S'inscrire</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="display-4 fw-bold mb-4">Découvrez une expérience culinaire unique</h1>
                    <p class="lead mb-5">Réservez les meilleurs stands de nourriture et de boissons pour vos événements. Gestion simplifiée pour les organisateurs et les vendeurs.</p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Commencer</a>
                        <a href="#features" class="btn btn-outline-light btn-lg">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5 my-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Nos Fonctionnalités</h2>
                <p class="text-muted">Découvrez ce qui rend notre plateforme unique</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card p-4 text-center">
                        <div class="mb-4">
                            <i class="fas fa-calendar-check fa-3x text-primary mb-3"></i>
                            <h4>Réservation Facile</h4>
                            <p class="text-muted">Réservez vos stands préférés en quelques clics, à tout moment et de n'importe où.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card p-4 text-center">
                        <div class="mb-4">
                            <i class="fas fa-chart-line fa-3x text-primary mb-3"></i>
                            <h4>Gestion Simplifiée</h4>
                            <p class="text-muted">Gérez facilement vos réservations, votre inventaire et vos ventes en temps réel.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card p-4 text-center">
                        <div class="mb-4">
                            <i class="fas fa-headset fa-3x text-primary mb-3"></i>
                            <h4>Support 24/7</h4>
                            <p class="text-muted">Notre équipe est disponible pour vous aider à tout moment, 7j/7 et 24h/24.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">À Propos de Nous</h2>
                    <p class="lead mb-4">Nous connectons les amateurs de bonne cuisine avec les meilleurs stands de nourriture et de boissons.</p>
                    <p>Notre plateforme offre une solution complète pour la réservation et la gestion de stands alimentaires, que vous soyez organisateur d'événements ou vendeur de rue.</p>
                    <div class="d-flex gap-3 mt-4">
                        <a href="{{ route('register') }}" class="btn btn-primary">Rejoignez-nous</a>
                        <a href="#contact" class="btn btn-outline-secondary">Contactez-nous</a>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <img src="https://images.unsplash.com/photo-1556911220-bda0e78eaf0a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="À propos de nous" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-4">Contactez-nous</h2>
                    <p class="lead mb-5">Vous avez des questions ? Notre équipe est là pour vous aider.</p>

                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="p-4 bg-white rounded shadow-sm">
                                <i class="fas fa-envelope fa-2x text-primary mb-3"></i>
                                <h5>Email</h5>
                                <p class="mb-0">contact@eatanddrink.com</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="p-4 bg-white rounded shadow-sm">
                                <i class="fas fa-phone fa-2x text-primary mb-3"></i>
                                <h5>Téléphone</h5>
                                <p class="mb-0">+1 234 567 890</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="p-4 bg-white rounded shadow-sm">
                                <i class="fas fa-map-marker-alt fa-2x text-primary mb-3"></i>
                                <h5>Adresse</h5>
                                <p class="mb-0">123 Rue de la Gastronomie, Paris</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="mb-4">Eat<span class="text-warning">&</span>Drink</h5>
                    <p>Votre plateforme de réservation de stands de nourriture et de boissons préférée.</p>
                    <div class="d-flex gap-3 mt-4">
                        <a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h6 class="text-uppercase fw-bold mb-4">Liens Rapides</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Accueil</a></li>
                        <li class="mb-2"><a href="#features" class="text-white text-decoration-none">Fonctionnalités</a></li>
                        <li class="mb-2"><a href="#about" class="text-white text-decoration-none">À Propos</a></li>
                        <li><a href="#contact" class="text-white text-decoration-none">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h6 class="text-uppercase fw-bold mb-4">Mentions Légales</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Conditions d'utilisation</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Politique de confidentialité</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Politique des cookies</a></li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <h6 class="text-uppercase fw-bold mb-4">Newsletter</h6>
                    <p>Abonnez-vous à notre newsletter pour recevoir nos dernières actualités.</p>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Votre email" aria-label="Votre email">
                        <button class="btn btn-primary" type="button">S'inscrire</button>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; {{ date('Y') }} Eat & Drink. Tous droits réservés.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Conçu avec <i class="fas fa-heart text-danger"></i> pour les amoureux de la bonne cuisine</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    <script>
        // Smooth scrolling for anchor links
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scrolling
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Navbar background on scroll
            const navbar = document.querySelector('.navbar');
            if (navbar) {
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 50) {
                        navbar.style.backgroundColor = 'rgba(0, 0, 0, 0.9)';
                    } else {
                        navbar.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
                    }
                });

                // Initialiser la couleur de la navbar
                navbar.style.transition = 'background-color 0.3s ease';
                if (window.scrollY > 50) {
                    navbar.style.backgroundColor = 'rgba(0, 0, 0, 0.9)';
                }
            }
        });
    </script>
</body>
</html>
