<?php

$utilisateurEstConnecte = isset($_SESSION['user_id']);

if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    $utilisateurEstAdmin = true;
} else {
    $utilisateurEstAdmin = false;
}
?>

<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid text-white">
        <a class="navbar-brand logo" href="index.php">CPascher</a>
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
                    <?php if (!$utilisateurEstAdmin) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Votre Panier
                            </a>
                            <ul class="dropdown-menu">
                                <?php if (isset($_SESSION['panier'])) {
                                    foreach ($_SESSION['panier'] as $produitpanier) { ?>


                                        <li class="dropdown-item"><?= $produitpanier[1] ?> : <?= $produitpanier[2] ?></li>

                                    <?php } ?>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="index.php?page=validercommande">Valider la commande</a></li>
                                <?php } else { ?>
                                    <li class="dropdown-item">Votre panier est vide !</li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?page=historiquecommandes">Historique des commandes</a>
                        </li>
                    <?php } ?>
            </ul>
            <div class="d-flex">
                <a class="nav-link active" aria-current="page" href="index.php?page=sedeconnecter">Se déconnecter</a>
            </div>
        <?php } ?>
        </div>
    </div>
</nav>