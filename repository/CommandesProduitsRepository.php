<?php

class CommandesProduitsRepository
{
    
    public static function getAllCommandesProduits()
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM commandes_produits';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $commandesProduits = [];

        foreach ($result as $r) {
            $commandesProduit = new CommandesProduits();
            $commandesProduit->setId($result['id']);
            $commandesProduit->setIdCommande($result['id_commande']);
            $commandesProduit->setIdProduit($result['id_produit']);
            $commandesProduit->setQuantite($result['quantite']);
            $commandesProduits[] = $commandesProduit;
        }

        return $commandesProduits;
        
    }

    public function getCommandesProduitsById($id)
    {

        $pdo = Database::connect();

        $sql = 'SELECT * FROM produits WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $produit = new Produit();
        $produit->setId($result['id']);
        $produit->setNom($result['nom']);
        $produit->setStock($result['stock']);

        return $produit;
    }

    public function createProduit($nom, $stock)
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO produits ( nom, stock) VALUES (:nom, :stock)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
          
            'nom' => $nom,
            'stock' => $stock
        ]);
    }
}