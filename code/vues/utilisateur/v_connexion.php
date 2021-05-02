<?php $title = "VVA - Espace connexion" ?>

<?php ob_start(); ?>

<div class="jumbotron jumbotron-fluid justify">
  <div class="container">
    <h1 class="display-4">Bienvenu sur le site de VVA.</h1>
    <form action="index.php?page=accueil" method="POST">
      <div class="form-group">
        <label for="identifiant">Identifiant</label>
        <input name="login" type="text" class="form-control" id="identifiant" aria-describedby="identifiant" placeholder="Entrer votre identifiant">
        <small id="idHelp" class="form-text text-muted">Ce dernier est unique et sert à vous identifier</small>
      </div>
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Mot de passe">
      </div>
      <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
  </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require("vues/template.php"); ?>
