<?php $title = "VVA : Erreur d'ajout de l'animation'" ?>

<?php ob_start(); ?>

<div class="jumbotron jumbotron-fluid justify">
  <div class="container">
    <h1 class="display-4">L'ajout de l'animation a échoué.</h1>
    <a href="index.php?page=accueil">Retourner à l'accueil</a>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require("view/template.php"); ?>
