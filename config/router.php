<?php

class Router{

    public static function redirect()
    {
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {

                case 'creerproduit':
                    $controller = new AdminController;
                    $controller->creerProduit();
                    break;

                case 'modifierproduit':
                    $controller = new AdminController;
                    $controller->modifierProduit();
                    break;

                case 'supprimerproduit':
                    $controller = new AdminController;
                    $controller->supprimerProduit();
                    break;

                case 'afficherproduits':
                    $controller = new AdminController;
                    $controller->afficherProduits();
                    break;

                case 'creercompte':
                    $controller = new UtilisateurController;
                    $controller->creerUtilisateur();
                    break;

                case 'seconnecter':
                    $controller = new UtilisateurController;
                    $controller->connexionUtilisateur();
                    break;

                case 'sedeconnecter':
                    $controller = new UtilisateurController;
                    $controller->deconnecterUtilisateur();
                    break;

                case 'ajouterpanier':
                    $controller = new CommandeController;
                    $controller->ajouterAuPanier();

                /* case 'login':
                    $controller = new UserController();
                    $controller->login();
                    break;
                case 'liste-user':
                    $controller = new UserController();
                    $controller->liste();
                    break; */
                default:
                    echo 'Page not found';
                    break;
            }
        } else {
            $controller = new AccueilController;
            $controller->afficherPageAccueil();
        }
    }
}
