<?php

class Router
{

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
                    break;

                case 'validercommande':
                    $controller = new CommandeController;
                    $controller->validerCommande();
                    break;

                case 'historiquecommandes':
                    $controller = new CommandeController;
                    $controller->afficherHistorique();
                    break;

                default:
                    echo 'Page non trouvé';
                    break;
            }
        } else {
            $controller = new AccueilController;
            $controller->afficherPageAccueil();
        }
    }
}
