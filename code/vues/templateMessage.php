<?php ob_start(); ?>

<div class="jumbotron jumbotron-fluid justify">
    <div class="container">
        <h1 class="display-4"><?= $subTitle ?></h1>
        <p class="lead"><?= $description ?></p>
        <a href="index.php?page=accueil">Retournez à l'accueil ici</a>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require("vues/template.php"); ?>