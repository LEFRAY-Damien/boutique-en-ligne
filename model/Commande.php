<?php

declare(strict_types=1);

class Commande
{

    // Des propriétés (id, nom, email)
    private int $id;
    private string $date;
    private string $status;

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

    /**
     * Get the value of email
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setLogin($date)
    {
        $this->date = $date;

        return $this;
    }

        /**
     * Get the value of email
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

}

?>