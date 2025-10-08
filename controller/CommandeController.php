<?php

class CommandeController{

    public function ajouterAuPanier(){
        if(!isset($_SESSION['id_commande'])){
            $_SESSION['id_commande'] = 1;

            $_SESSION['produits'][] = $_POST;
        }
    }

}

?>