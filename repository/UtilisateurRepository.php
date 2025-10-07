<?php

class UtilisateurRepository {

    // Des méthodes (getAllUsers(), getUserById($id), ...)
    public static function getAllUsers()
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM users';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $users = [];

        foreach($result as $r) {
            $user = new Utilisateur();
            $user->setId($result['id']);
            $user->setNom($result['nom']);
            $user->setEmail($result['email']);
            $users[] = $user;
        }

        return $users;
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

        $user = new User();
        $user->setId($result['id']);
        $user->setNom($result['nom']);
        $user->setEmail($result['email']);

        return $user;
    }

    public function createUser($nom, $email)
    {

        // $db = new Database();
        // $pdo = $db->connect();

        $pdo = Database::connect();

        $sql = 'INSERT INTO users (nom, email) VALUES (:nom, :email)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nom' => $nom,
            'email' => $email
        ]);
    }

    public function updateUser($id, $nom)
    {
        // $db = new Database();
        // $pdo = $db->connect();

        $pdo = Database::connect();

        $sql = 'UPDATE users SET nom = :nom WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nom' => $nom,
            'id' => $id
        ]);
    }

    public function deleteUser($id)
    {
        // $db = new Database();
        // $pdo = $db->connect();

        $pdo = Database::connect();

        $sql = 'DELETE FROM users WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
    }
}