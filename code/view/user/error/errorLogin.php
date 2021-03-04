<?php $title = "VVA - Erreur connexion" ?>

<?php ob_start(); ?>

<div class="jumbotron jumbotron-fluid justify">
  <div class="container">
    <h1 class="display-4">Erreur de connexion, veuillez vérifier vos identifiants.</h1>
    <a href="index.php?page=accueil">Retournez à l'accueil ici</a>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require("view/template.php"); ?>
