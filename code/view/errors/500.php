<?php $title = "Erreur 500" ?>

<?php ob_start(); ?>
<?php echo $e ?>
<div class="jumbotron jumbotron-fluid justify">
    <div class="container">
        <h1 class="display-4">Erreur 500</h1>
        <p class="lead">Une erreur serveur est survenue</p>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require("view/template.php"); ?>
