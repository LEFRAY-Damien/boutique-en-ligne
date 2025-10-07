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
            $produit->setId($result['id']);
            $produit->setNom($result['nom']);
            $produit->setStock($result['stock']);
            $produits[] = $produit;
        }

        return $produits;
    }

    public function getUserById($id)
    {

        $pdo = Database::connect();

        $sql = 'SELECT * FROM users WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $user = new Utilisateur();
        $user->setId($result['id']);
        $user->setLogin($result['login']);
        $user->setRole($result['role']);

        return $user;
    }

    public function createUser($login, $mdp, $role)
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO users (login, mdp, role) VALUES (:login, :mdp, :role)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'login' => $login,
            'mdp' => $mdp,
            'role' => $role
        ]);
    }
}