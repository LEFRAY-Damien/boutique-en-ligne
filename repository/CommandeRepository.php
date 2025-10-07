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

    public function createCommande($date, $status)
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO commandes (date, status) VALUES (:date, :status)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'date' => $date,
            'status' => $status
        ]);
    }
}
