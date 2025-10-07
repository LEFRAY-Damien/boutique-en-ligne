<?php

declare(strict_types=1);

class Produit
{
    private int $id;
    private String $nom;
    private int $stock;


    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of nom
     */
    public function getNom(): String
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom(String $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of stock
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     */
    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }
}
