<div class="align-items-center text-center">
    <div class="container my-5">
        <h1>Liste des produits</h1>
        <?php if ($utilisateurEstAdmin) { ?>

            <a class="btn btn-secondary" href="index.php?page=creerproduit">Ajouter un produit</a>
    </div>
<?php } ?>
</div>
<div class="d-flex align-content-start flex-wrap">
    <?php foreach ($produits as $produit) {
    ?>
        <div class="card m-2" style="width: 18rem;">
            <div class="card-body border border-3 border-secondary rounded bg-body-secondary">
                <h5 class="card-title"><?= $produit->getNom() ?></h5>
                <h6 class="card-subtitle mb-2 text-body-primary"><?= $produit->getStock() ?> en stock</h6>
                <p class="card-text">

                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis suscipit neque. Mauris sodales urna non purus interdum, vitae interdum nisi lobortis. Donec volutpat turpis in nibh ornare lacinia.</p>
                <?php if ($utilisateurEstAdmin) { ?>
                    <div class="boutonsModifs">
                        <a class="boutonModifier card-link" href="index.php?page=modifierproduit&id=<?= $produit->getId() ?>">✏️</a>
                        <a class="boutonSupprimer card-link" href="index.php?page=supprimerproduit&id=<?= $produit->getId() ?>">🗑️</a>
                    </div>
                <?php } else { ?>
                    <button class="boutonAjoutPanier card-link" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#panierModal<?= $produit->getId() ?>">🛍️</button>
                <?php } ?>
            </div>
        </div>
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

    <?php } ?>

</div>