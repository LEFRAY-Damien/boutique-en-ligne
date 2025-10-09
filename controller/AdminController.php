<?php
class AdminController
{
    public function creerProduit()
    {
        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['role'] == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $produit = new ProduitRepository;
                    try {
                        $produit->createProduit($_POST['nomProduit'], $_POST['stockProduit']);
                    } catch (Exception $ex) {
                        echo $ex;
                    }

                    header("Location: index.php?page=afficherproduits");
                }

                require('view/creerProduits.php');
            } else {
                header("Location: index.php");
            }
        } else {
            header("Location: index.php");
        }
    }

    public function modifierProduit()
    {
        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['role'] == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $produit = new ProduitRepository;

                    try {
                        $produit->modifierProduit($_POST['id'], $_POST['nomProduit'], $_POST['stockProduit']);
                    } catch (Exception $ex) {
                        echo $ex;
                    }

                    header("Location: index.php?page=afficherproduits");
                }
                $produitRepo = new ProduitRepository;
                $produitModifie = $produitRepo->getProduitById($_GET['id']);

                require('view/modifierProduit.php');
            } else {
                header("Location: index.php");
            }
        } else {
            header("Location: index.php");
        }
    }

    public function supprimerProduit()
    {
        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['role'] == 'admin') {
                if (isset($_GET['id'])) {

                    $produit = new ProduitRepository;
                    try {
                        $produit->supprimerProduit($_GET['id']);
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

    public function afficherProduits()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            $utilisateurEstAdmin = true;
        } else {
            $utilisateurEstAdmin = false;
        }
        if (!isset($_SESSION["user_id"])) {
            header("Location: index.php?page=seconnecter");
        } else {
            $produitRepo = new ProduitRepository;
            $produits = $produitRepo->getAllProduits();

            require('view/afficherProduits.php');
        }
    }
}
