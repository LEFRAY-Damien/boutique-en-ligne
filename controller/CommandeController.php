<?php

class CommandeController
{

    public function ajouterAuPanier()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $produitEtQuantite = [$_POST['idproduit'], $_POST['nomproduit'], $_POST['quantite']];

            $_SESSION['panier'][] = $produitEtQuantite;

            header("Location: index.php?page=afficherproduits");
        }
    }

    public function afficherPanier()
    {
        $produitspanier = $_SESSION['panier'];
        require('view/layout/panier.php');
    }

    public function validerCommande()
    {
        $commandeRepo = new CommandeRepository;
        $commandeRepo->passerCommande($_SESSION['user_id'], $_SESSION['panier']);
        unset($_SESSION['panier']);

        header("Location: index.php?page=afficherproduits");
    }

    public function afficherHistorique()
    {
        if (isset($_SESSION['user_id'])) {
            $commandeRepo = new CommandeRepository;
            $commandes = $commandeRepo->getCommandesByUserId($_SESSION['user_id']);
            $produitRepo = new ProduitRepository;

            require('view/historiqueCommandes.php');
        } else {
            echo "Erreur : Vous n'êtes pas connecté";
        }
    }
}
