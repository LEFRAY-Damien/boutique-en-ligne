<?php

class UtilisateurRepository
{

    public static function getAllUsers()
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM users';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $users = [];

        foreach ($result as $r) {
            $user = new Utilisateur();
            $user->setId($result['id']);
            $user->setLogin($result['login']);
            $user->setRole($result['role']);
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
