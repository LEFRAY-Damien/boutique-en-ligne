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
                case 'afficherproduits':
                    $controller = new AdminController;
                    $controller->afficherProduits();
                    break;


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
        }
    }
}
