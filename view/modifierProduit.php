<h1>Modifier un produit</h1>

<form method="POST" action="index.php?page=modifierproduit">
    <fieldset>
        <label>Nom du produit</label>
        <input type="text" name="nomProduit" value="<?=$produitModifie->getNom()?>">
        <label>Stock</label>
        <input type="text" name="stockProduit" value="<?=$produitModifie->getStock()?>">
        <input type="hidden" name="id" value="<?=$produitModifie->getId()?>">

        <input type="submit" value="Modifier le produit">
    </fieldset>
</form>