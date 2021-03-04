<?php $title = "VVA - Erreur code animation "; ?>

<?php ob_start(); ?>

<div class="jumbotron jumbotron-fluid justify">
    <div class="container">
        <h1 class="display-4">Erreur : Code d'animation non trouvé ou invalide</h1>
        <p class="lead">Le code saisie n'est pas valide, veuillez nous en excuser.</p>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require("view/template.php"); ?>
