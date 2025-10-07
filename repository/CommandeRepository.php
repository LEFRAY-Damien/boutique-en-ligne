<?php

class CommandeRepository
{
    
    public static function getAllCommandes()
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM commandes';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $commandes = [];

        foreach ($result as $r) {
            $commande = new Commande();
            $commande->setId($result['id']);
            $commande->setDate($result['date']);
            $commande->setStatus($result['status']);
            $commandes[] = $commande;
        }

        return $commandes;
    }

    public function getUserById($id)
    {

        $pdo = Database::connect();

        $sql = 'SELECT * FROM commandes WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $commande = new Commande();
        $commande->setId($result['id']);
        $commande->setDate($result['date']);
        $commande->setStatus($result['status']);

        return $commande;
    }

    public function passerCommande(): int {
        $pdo = Database::connect();

        $sql = "INSERT INTO commandes (date, status) VALUES (NOW(), 'en_attente')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();


        $id_commande = $pdo->lastInsertId();
        return $id_commande;
    }

    public function ajouterLigneCommande($date, $status, CommandesProduits $lignePanier)
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO commandesProduits Values';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'date' => $date,
            'status' => $status
        ]);
    }
}
