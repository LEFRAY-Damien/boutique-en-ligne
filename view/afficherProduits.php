<h1>Liste des produits</h1>

<?php foreach ($produits as $produit) {
?>
    <div>
        <h2><?=$produit->getNom()?></h2>
        <p><?=$produit->getStock()?></p>
    </div>

<?php
}

?>