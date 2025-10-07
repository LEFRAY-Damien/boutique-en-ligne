<?php

class UtilisateurController
{
    public function creerUtilisateur() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $utilisateurRepo = new UtilisateurRepository;
            $utilisateurRepo->createUser($_POST['login'], $_POST['mdp'], "client");

            header("Location:index.php?page=afficherproduits");
        }

        require('view/creerCompte.php');
    }

    public function connexionUtilisateur(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $utilisateurRepo = new UtilisateurRepository;
            $utilisateur= $utilisateurRepo->getUserByLogin($_POST["login"]);

            if ($utilisateur && password_verify($_POST["mdp"], $utilisateur->getMdp())){
                $_SESSION["user_id"]= $utilisateur->getId();
                $_SESSION["role"]= $utilisateur->getRole();

                header("Location:index.php?page=afficherproduits");

            }else{
                echo "identifiants incorrects.";
            }

        }

    }
}
