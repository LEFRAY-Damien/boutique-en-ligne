<?php

class ProduitRepository
{
    
    public static function getAllProduits()
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM produits';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $produits = [];

        foreach ($result as $r) {
            $produit = new Produit();
            $produit->setId($r['id']);
            $produit->setNom($r['nom']);
            $produit->setStock($r['stock']);
            $produits[] = $produit;
        }

        return $produits;
    }

    public function getProduitsById($id)
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

    public function modifierProduit($nom, $stock)
    {
        $pdo = Database::connect();

        $sql = 'UPDATE produits SET (nom, stock) VALUES (:nom, :stock)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
          
            'nom' => $nom,
            'stock' => $stock
        ]);
    }
}