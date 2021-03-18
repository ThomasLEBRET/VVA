<?php $title = "VVA - Erreur d'inscription à l'activité "; ?>

<?php ob_start(); ?>

<div class="jumbotron jumbotron-fluid justify">
    <div class="container">
        <h1 class="display-4">Erreur : Vous êtes déjà inscrit à l'activité</h1>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require("view/template.php"); ?>
