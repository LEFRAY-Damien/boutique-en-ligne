<?php

class CommandeController
{

    public function ajouterAuPanier()
    {
        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['role'] == 'client') {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    try {
                        $produitEtQuantite = [$_POST['idproduit'], $_POST['nomproduit'], $_POST['quantite']];

                        $_SESSION['panier'][] = $produitEtQuantite;
                    } catch (Exception $ex) {
                        echo $ex;
                    }

                    header("Location: index.php?page=afficherproduits");
                }
            } else {
                header("Location: index.php");
            }
        } else {
            header("Location: index.php");
        }
    }

    public function validerCommande()
    {
        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['role'] == 'client') {
                $commandeRepo = new CommandeRepository;
                $commandeRepo->passerCommande($_SESSION['user_id'], $_SESSION['panier']);
                unset($_SESSION['panier']);

                header("Location: index.php?page=afficherproduits");
            } else {
                header("Location: index.php");
            }
        } else {
            header("Location: index.php");
        }
    }

    public function afficherHistorique()
    {
        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['role'] == 'client') {
                $commandeRepo = new CommandeRepository;
                $commandes = $commandeRepo->getCommandesByUserId($_SESSION['user_id']);
                $produitRepo = new ProduitRepository;

                require('view/historiqueCommandes.php');
            } else {
                header("Location: index.php");
            }
        } else {
            header("Location: index.php");
        }
    }
}
