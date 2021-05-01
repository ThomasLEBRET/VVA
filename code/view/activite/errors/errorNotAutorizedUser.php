<?php $title = "VVA - Erreur : Compte non autorisé "; ?>

<?php ob_start(); ?>

<div class="jumbotron jumbotron-fluid justify">
    <div class="container">
        <h1 class="display-4">Erreur : Vous n'avez pas le droit d'accdéder à cet onglet</h1>
        <a href="index.php">Retounez à l'accueil</a>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require("view/template.php"); ?>
