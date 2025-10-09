<div class="d-flex align-items-center">
    <div>
        <h1>Liste des produits</h1>
    </div>
    <?php if ($utilisateurEstAdmin) { ?>
    <div class="ms-2">
        <a href="index.php?page=creerproduit">➕</a>
    </div>
    <?php } ?>
</div>
<?php foreach ($produits as $produit) {
?>
    <div>
        <h2><?= $produit->getNom() ?></h2>
        <p><?= $produit->getStock() ?></p>
    </div>
    <?php if ($utilisateurEstAdmin) { ?>
        <div class="boutonsModifs">
            <a class="boutonModifier" href="index.php?page=modifierproduit&id=<?= $produit->getId() ?>">✏️</a>
            <a class="boutonSupprimer" href="index.php?page=supprimerproduit&id=<?= $produit->getId() ?>">🗑️</a>
        </div>
    <?php } else { ?>
        <button class="boutonAjoutPanier" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#panierModal<?= $produit->getId() ?>">🛍️</button>
    <?php } ?>

    <div class="modal fade" id="panierModal<?= $produit->getId() ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Commander <?= $produit->getNom() ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="index.php?page=ajouterpanier" method="POST">
                    <div class="modal-body">
                        <label class="text-black">Quantité</label>
                        <input type="number" name="quantite" min="1" max="<?= $produit->getStock() ?>" value='1'>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <input type="hidden" name="idproduit" value="<?= $produit->getId() ?>">
                        <input type="hidden" name="nomproduit" value="<?= $produit->getNom() ?>">
                        <input type="submit" class="btn btn-primary" value="Ajouter au panier">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
}

?>