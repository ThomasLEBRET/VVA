<?php $title = "VVA : Erreur de type d'utilisateur" ?>

<?php ob_start(); ?>

<div class="jumbotron jumbotron-fluid justify">
  <div class="container">
    <h1 class="display-4">Erreur de type d'utilisateur.</h1>
    <p>Seul un encadrant est capable de créer une animation !</p>
    <a href="index.php?page=accueil">Retourner à l'accueil</a>
  </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require("view/template.php"); ?>
