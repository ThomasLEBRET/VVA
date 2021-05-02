<?php $title = "VVA - Espace vacancier" ?>

<?php ob_start(); ?>

<div class="jumbotron jumbotron-fluid justify">
  <div class="container">
    <h1 class="display-4">Vous êtes connecté en tant que vacancier.</h1>
  </div>
</div>
<?php if($activites != NULL) { ?>
<?php foreach($activites as $activite):  ?>
  <?php $animation = ORMAnimation::get($activite->getCodeanim()) ?>

  <div class="card" style="width: 18rem; margin: 0 auto; margin-bottom: .3em;">
  <div class="card-body">
    <h5 class="card-title"><?= $animation->getNomanim() ?></h5>
    <h6 class="card-subtitle mb-2">Activité prévu le <?= $activite->getDateact()->format('d/m/Y') ?></h6>
    <form action="index.php?page=annulerInscription&noact=<?= $activite->getNoact() ?>" method="post">
      <input type="submit" class="btn btn-secondary" name="unregistered" value="Désinscription">
    </form>
  </div>
</div>
<?php endforeach ?>
<?php } ?>

<?php $content = ob_get_clean(); ?>
<?php require("vues/template.php"); ?>
