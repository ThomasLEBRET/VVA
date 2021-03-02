<?php $title = "VVA - Espace encadrant" ?>

<?php ob_start(); ?>

<div class="jumbotron jumbotron-fluid justify">
  <div class="container">
    <h1 class="display-4">Vous êtes connecté en tant qu'encadrant.</h1>
  </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require("view/template.php"); ?>
