<?php

$utilisateurEstConnecte = isset($_SESSION['user_id']);
?>

<nav class="navbar navbar-expand-lg bg-body-secondary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Accueil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?page=afficherproduits">Voir les produits</a>
                </li>
                <?php
                if (!$utilisateurEstConnecte) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?page=creercompte">Créer un compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?page=seconnecter">Se connecter</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="index.php?page=afficherpanier" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Votre Panier
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach ($_SESSION['panier'] as $produitpanier) { ?>


                                <li><?= $produitpanier[1] ?> : <?= $produitpanier[2] ?></li>


                            <?php } ?>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="index.php?page=validercommande">Valider la commande</a></li>

                            <!--                             <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?page=sedeconnecter">Se déconnecter</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>