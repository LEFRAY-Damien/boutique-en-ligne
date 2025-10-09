<?php

class CommandeRepository
{

    public function getAllCommandes()
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM commandes';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $commandes = [];

        foreach ($results as $r) {
            $commande = new Commande();
            $commande->setId($r['id']);
            $commande->setDate($r['date']);
            $commandes[] = $commande;
        }

        return $commandes;
    }

    public function getCommandesByUserId($userID)
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM commandes WHERE id_user = :user_id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['user_id' => $userID]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $commandes = [];

        foreach ($results as $r) {
            $commande = new Commande();
            $commande->setId($r['id']);
            $commande->setDate($r['date']);
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

    public function passerCommande($userID, array $panier): int
    {
        $pdo = Database::connect();

        $sql = "INSERT INTO commandes (date, id_user) VALUES (NOW(), :id_user)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id_user' => $userID]);


        $id_commande = $pdo->lastInsertId();

        foreach ($panier as $produit) {
            $sql = "INSERT INTO commandes_produits (id_commande, id_produit, quantite)
                VALUES (:id_commande, :id_produit, :quantite)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'id_commande' => $id_commande,
                'id_produit' => $produit[0],
                'quantite' => $produit[2]
            ]);

            $sql = "UPDATE produits SET stock = stock - :difference
                WHERE id = :id_produit";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'difference' => $produit[2],
                'id_produit' => $produit[0]
            ]);
        }


        return $id_commande;
    }
}
