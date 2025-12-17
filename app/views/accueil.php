<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Coopérative</title>
    <link href="<?= BASE_URL ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <header class="bg-primary bg-gradient shadow-lg sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark py-3">
                <a href="/" class="navbar-brand fs-2 fw-bold">Societe de livraison</a>
            </nav>
        </div>
    </header>

    <main class="py-5">
        <section class="container">
            <h1 class="text-center fw-bold text-dark mb-5 display-4">Bienvenue sur l'appli de gestion de societe de livraison</h1>
            
            <article class="row g-4">
                <section class="col-12 col-md-6 col-lg-6">
                    <article class="card h-100 shadow-sm border-0 text-center">
                        <a href="" class="text-decoration-none text-dark">
                            <section class="card-body p-4">
                                <i class="bi bi-clipboard2 text-primary display-1 mb-3"></i>
                                <h2 class="card-title h4 fw-bold mb-3">Gestion de livraison</h2>
                                <p class="card-text text-muted">Insertion d'une livraison</p>
                            </section>
                        </a>
                    </article>
                </section>

                <section class="col-12 col-md-6 col-lg-6">
                    <article class="card h-100 shadow-sm border-0 text-center">
                        <a href="" class="text-decoration-none text-dark">
                            <section class="card-body p-4">
                                <i class="bi bi-clipboard2-data-fill text-success display-1 mb-3"></i>
                                <h2 class="card-title h4 fw-bold mb-3">Benefice par periode</h2>
                                <p class="card-text text-muted">Par jour/Par mois/Par annee</p>
                            </section>
                        </a>
                    </article>
                </section>
            </article>
        </section>
    </main>
    <script src="<?= BASE_URL ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>