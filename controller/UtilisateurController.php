<?php

class UtilisateurController
{
    public function creerUtilisateur()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $utilisateurRepo = new UtilisateurRepository;
            try {
                $utilisateurRepo->createUser($_POST['login'], $_POST['mdp'], "client");
            } catch (Exception $ex) {
                echo $ex;
            }

            header("Location: index.php?page=afficherproduits");
        }

        require('view/creerCompte.php');
    }

    public function connexionUtilisateur()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $utilisateurRepo = new UtilisateurRepository;
            try {
                $utilisateur = $utilisateurRepo->getUserByLogin($_POST["login"]);

                if ($utilisateur && password_verify($_POST["mdp"], $utilisateur->getMdp())) {

                    $_SESSION["user_id"] = $utilisateur->getId();
                    $_SESSION["role"] = $utilisateur->getRole();

                    header("Location: index.php?page=afficherproduits");
                } else {
                    echo "identifiants incorrects.";
                }
            } catch (Exception $ex) {
                echo $ex;
            }
        }
        require('view/login.php');
    }

    public function deconnecterUtilisateur()
    {
        session_destroy();
        header("Location: index.php");
    }
}
