<?php $title = "VVA - Erreur ajout de l'activité "; ?>

<?php ob_start(); ?>

<div class="jumbotron jumbotron-fluid justify">
    <div class="container">
        <h1 class="display-4">Erreur : L'ajout à l'activité à échoué</h1>
        <p class="lead">L'activité renseignée n'est peut être pas valide ou une session existe déjà pour la journée renseignée.</p>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require("view/template.php"); ?>
