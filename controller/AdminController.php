<?php
class AdminController
{
    public function creerProduit()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $produit = new ProduitRepository;
            $produit->createProduit($_POST['nomProduit'], $_POST['stockProduit']);

            header("Location:index.php?page=afficherproduits");
        }

        require('view/creerProduits.php');
    }

    public function afficherProduits()
    {
        $produitRepo = new ProduitRepository;
        $produits = $produitRepo->getAllProduits();
        require('view/afficherProduits.php');
    }
}
