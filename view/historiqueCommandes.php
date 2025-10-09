<div>


    <div class="accordion" id="accordionExample">
        <?php foreach ($commandes as $commande) {
            $fmt = new IntlDateFormatter(
                'fr_FR',
                IntlDateFormatter::FULL,
                IntlDateFormatter::MEDIUM,
                'Europe/Paris',
                IntlDateFormatter::GREGORIAN
            );
            $date = $fmt->format(strtotime($commande->getDate()));
            $produits = $produitRepo->getProduitsByCommande($commande->getId());
            ?>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?=$commande->getId()?>" aria-expanded="false" aria-controls="collapseOne">
                        Commande du <?= $date ?>
                    </button>
                </h2>
                <div id="collapseOne<?=$commande->getId()?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php foreach($produits as $produit) {
                        echo $produit["nomProduit"] . " : " . $produit["quantite"] . "<br>";
                        } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>