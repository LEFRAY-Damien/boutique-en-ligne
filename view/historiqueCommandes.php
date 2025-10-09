<div>
    <?php foreach ($commandes as $key => $commande) {
        $fmt = new IntlDateFormatter(
            'fr_FR',
            IntlDateFormatter::FULL,
            IntlDateFormatter::MEDIUM,
            'Europe/Paris',
            IntlDateFormatter::GREGORIAN
        );
        $date = $fmt->format(strtotime($commande->getDate())); ?>

        <p>Commande du <?= $date ?></p>

        <?php if ($key != array_key_last($commandes)) { ?>
            <hr class="hr" />
        <?php } ?>
    <?php } ?>
</div>