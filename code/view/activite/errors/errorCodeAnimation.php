<?php $title = "VVA - Erreur code animation "; ?>

<?php ob_start(); ?>

<div class="jumbotron jumbotron-fluid justify">
    <div class="container">
        <h1 class="display-4">Erreur : Code d'animation invalide ou dénué d'activité</h1>
        <p class="lead">Le code saisie n'est pas valide ou ne contient aucune activité pour le code d'animation renseigné, veuillez nous en excuser.</p>
    </div>
</div>

<?php if(isset($formAddActivite)) { echo $formAddActivite; } ?>

<?php $content = ob_get_clean(); ?>
<?php require("view/template.php"); ?>
