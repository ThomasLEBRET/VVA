<?php $title = "Erreur 404" ?>

<?php ob_start(); ?>

<div class="jumbotron jumbotron-fluid justify">
  <div class="container">
    <h1 class="display-4">Bienvenu sur le site de VVA.</h1>
    <form>
      <div class="form-group">
        <label for="exampleInputEmail1">Identifiant</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Entrer votre identifiant">
        <small id="idHelp" class="form-text text-muted">Ce dernier est unique et sert à vous identifier</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require("view/template.php"); ?>
