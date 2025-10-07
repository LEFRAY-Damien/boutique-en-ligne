<?php

declare(strict_types=1);

class CommandesProduits
{
    private int $id;
    private int $idCommande;
    private int $idProduit;
    private int $quantite;



    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of idCommande
     */
    public function getIdCommande(): int
    {
        return $this->idCommande;
    }

    /**
     * Set the value of idCommande
     */
    public function setIdCommande(int $idCommande): self
    {
        $this->idCommande = $idCommande;

        return $this;
    }

    /**
     * Get the value of idProduit
     */
    public function getIdProduit(): int
    {
        return $this->idProduit;
    }

    /**
     * Set the value of idProduit
     */
    public function setIdProduit(int $idProduit): self
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    /**
     * Get the value of quantite
     */
    public function getQuantite(): int
    {
        return $this->quantite;
    }

    /**
     * Set the value of quantite
     */
    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }
}
