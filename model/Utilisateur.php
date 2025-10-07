<?php

declare(strict_types=1);

class Utilisateur
{

    // Des propriétés (id, nom, email)
    private int $id;
    private string $login;
    private string $mdp;
    private string $role;

  
       /**
     * Get the value of email
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }


           /**
     * Get the value of email
     */ 
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

           /**
     * Get the value of email
     */ 
    public function getrole()
    {
        return $this->role;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

           /**
     * Get the value of email
     */ 
    public function getId()
    {
        return $this->id;
    }

      /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

   

}

?>