<?php

session_start();

require_once(__DIR__ . '/config/database.php');
require_once(__DIR__ . '/config/router.php');

require_once(__DIR__ . '/model/Produit.php');
require_once(__DIR__ . '/model/Utilisateur.php');

require_once(__DIR__ . '/repository/ProduitRepository.php');
require_once(__DIR__ . '/repository/UtilisateurRepository.php');


require_once(__DIR__ . '/controller/AccueilController.php');
require_once(__DIR__ . '/controller/AdminController.php');
require_once(__DIR__ . '/controller/UtilisateurController.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="public/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <?php include('view/layout/header.php')?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
<?php Router::redirect(); ?>

</html>