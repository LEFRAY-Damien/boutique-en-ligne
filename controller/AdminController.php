<?php
class AdminController
{
    public function creerProduit()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $produit = new ProduitRepository;
            $produit->createProduit($_POST['nomProduit'], $_POST['stockProduit']);

            header("Location: index.php?page=afficherproduits");
        }

        require('view/creerProduits.php');
    }

    public function modifierProduit(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $produit = new ProduitRepository;

            $produit->modifierProduit($_POST['id'], $_POST['nomProduit'], $_POST['stockProduit']);

            header("Location: index.php?page=afficherproduits");
        }
        $produitRepo = new ProduitRepository;
        $produitModifie = $produitRepo->getProduitById($_GET['id']);

        require('view/modifierProduit.php');
    }

    public function supprimerProduit(){
        if (isset($_GET['id'])) {

            $produit = new ProduitRepository;

            $produit->supprimerProduit($_GET['id']);

            header("Location: index.php?page=afficherproduits");
        }
    }

    public function afficherProduits()
    {
        if (!isset($_SESSION["user_id"])) {
            header("Location: index.php?page=seconnecter");
        } else {
            $produitRepo = new ProduitRepository;
            $produits = $produitRepo->getAllProduits();
            require('view/afficherProduits.php');
        }
    }
}
