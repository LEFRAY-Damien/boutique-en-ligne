<h1>Liste des produits</h1>

<?php foreach ($produits as $produit) {
?>
    <div>
        <h2><?=$produit->getNom()?></h2>
        <p><?=$produit->getStock()?></p>
    </div>
    <div class="boutonsModifs">
        <a class="boutonModifier" href="index.php?page=modifierproduit&id=<?=$produit->getId()?>">✏️</a>
        <a class="boutonSupprimer" href="index.php?page=supprimerproduit&id=<?=$produit->getId()?>">🗑️</a>
    </div>

<?php
}

?>