<div class="p-5">
</div>
<div class="container pt-5 col-md-2 d-flex align-items-center my-auto">
    <div class="card bg-body-secondary">
        <h4 class="card-header">Modifier un produit</h4>
        <div class="card-body">
            <form action="index.php?page=modifierproduit" method="POST">
                <div class="mb-3">
                    <label for="" class="form-label">Nom de produit :</label>
                    <input type="text" class="form-control" name="nomProduit" value="<?=$produitModifie->getNom()?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Stock :</label>
                    <input type="number" class="form-control" name="stockProduit" value="<?=$produitModifie->getStock()?>">
                </div>
                <input type="hidden" name="id" value="<?=$produitModifie->getId()?>">
                <button type="submit" class="btn btn-primary">Modifier le produit</button>
            </form>
        </div>
    </div>
</div>