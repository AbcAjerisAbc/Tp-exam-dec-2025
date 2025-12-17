<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion - Gestion de livraison</title>
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
            <h1 class="text-center fw-bold text-dark mb-5 display-4">Gestion des livraisons</h1>
            
            <article class="row g-4">
                <section class="col-12 col-md-12 col-lg-12">
                    <article class="card h-100 shadow-sm border-0 text-center">
                        <section class="card-body p-4">
                            <i class="bi bi-card-text text-primary display-1 mb-3"></i>
                            <form action="<?= BASE_URL ?>/gestion/livraison/inserer" method="post">
                                <?php if(!empty($resultats)){
                                    foreach($resultats as $resultat){
                                        if(isset($resultat['colis'])){
                                            $allcolis=$resultat['colis'];
                                        }
                                        
                                        if(isset($resultat['vehicule'])){
                                            $allvehicule=$resultat['vehicule'];
                                        }

                                        if(isset($resultat['livreur'])){
                                            $alllivreur=$resultat['livreur'];
                                        }
                                        
                                        if(isset($resultat['statut'])){
                                            $allstatut=$resultat['statut'];
                                        }
                                    }
                                ?>
                                    <div class="form-group mt-4 text-start">
                                        <h4>Colis:</h4>
                                        <div class="col-3">
                                            <select class="form-select" aria-label="Default select example" name="colis"> 
                                                <option value="0" select>Colis</option>
                                                <?php foreach($allcolis as $colis) {?>
                                                    <option value="<?= $colis['id_colis'] ?>"><?= $colis['nom_colis'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    
                                    <div class="form-group mt-5 text-start">
                                        <div class="row g-2 align-items-center mt-3">
                                            <h4>Assignements:</h4>
                                            <div class="col-4">
                                                <select class="form-select" aria-label="Default select example" name="voiture"> 
                                                    <option value="0" select>Voiture</option>
                                                    <?php foreach($allvehicule as $vehicule) {?>
                                                        <option value="<?= $vehicule['id_vehicule'] ?>"><?= $vehicule['nom_vehicule'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <select class="form-select" aria-label="Default select example" name="chauffeur"> 
                                                    <option value="0" select>Chauffeur</option>
                                                    <?php foreach($alllivreur as $livreur) {?>
                                                        <option value="<?= $livreur['id_livreur'] ?>"><?= $livreur['nom_livreur'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <input type="number" class="form-control" name="salaire" value="100000" placeholder="Salaire du chauffeur">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mt-5 text-start">
                                        <div class="row g-2 align-items-center mt-3">
                                            <h4>Information de la livraison:</h4>
                                            <div class="col-4">
                                                <input type="text" class="form-control" name="adressedepart" placeholder="Adresse de depart">
                                            </div>

                                            <div class="col-4">
                                                <input type="text" class="form-control" name="adressedestination" placeholder="Adresse de destination">
                                            </div>

                                            <div class="col-4">
                                                <select class="form-select" aria-label="Default select example" name="statut"> 
                                                    <option value="0" select>Statuts</option>
                                                    <?php foreach($allstatut as $statut) {?>
                                                        <option value="<?= $statut['id_statut'] ?>"><?= $statut['nom_statut'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mt-5 text-start">
                                        <h4>Montant du colis par kg:</h4>
                                        <div class="col-3 mt-3">
                                            <input type="number" class="form-control" name="montantcoliskg" placeholder="Montant par kg">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success  mt-5 col-12 col-lg-12 col-md-12 fs-5">
                                        Enregistrer
                                    </button>
                                    <a href="/" class="btn btn-danger  mt-4 col-12 col-lg-12 col-md-12 fs-5 mb-4">
                                        Annuler
                                    </a>
                                <?php
                                    }
                                ?>
                            </form>
                        </section>
                    </article>
                </section>
            </article>
        </section>
    </main>
    <script src="<?= BASE_URL ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>