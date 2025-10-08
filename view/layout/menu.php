<?php

$utilisateurEstConnecte = isset($_SESSION['user_id']);
?>

<ul id="navbar">
    <li><a href='index.php'>Accueil</a></li>
    <?php
    if (!$utilisateurEstConnecte) { ?>
        <li style="float:right"><a href='index.php?page=creercompte'>Créer un compte</a></li>
        <li style="float:right"><a href='index.php?page=seconnecter'>Se connecter</a></li>
    <?php } else { ?>
        <li style="float:right"><a href='index.php?page=sedeconnecter'>Se déconnecter</a></li>
    <?php } ?>
</ul>