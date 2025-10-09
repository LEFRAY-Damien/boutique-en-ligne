<?php

class CommandeController
{

    public function ajouterAuPanier()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_SESSION['id_commande'])) {
                $_SESSION['id_commande'] = 1;

                $produitEtQuantite = [$_POST['idproduit'], $_POST['nomproduit'], $_POST['quantite']];

                $_SESSION['panier'][] = $produitEtQuantite;

                header("Location: index.php?page=afficherproduits");
            }
            else {

                $produitEtQuantite = [$_POST['idproduit'], $_POST['nomproduit'], $_POST['quantite']];

                $_SESSION['panier'][] = $produitEtQuantite;

                header("Location: index.php?page=afficherproduits");
            }
        }
    }

    public function afficherPanier(){
        $produitspanier = $_SESSION['panier'];
        require('view/layout/panier.php');
    }

    public function validerCommande(){
        $commandeRepo = new CommandeRepository;
        $commandeRepo->passerCommande($_SESSION['user_id'],$_SESSION['panier']);
    }
}
