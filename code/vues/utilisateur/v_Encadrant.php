<?php $title = "VVA - Espace encadrant" ?>

<?php ob_start(); ?>

<div class="jumbotron jumbotron-fluid justify">
  <div class="container">
    <h1 class="display-4">Vous êtes connecté en tant qu'encadrant.</h1>
  </div>
</div>

<?php if($activite != null): ?>
<?php foreach($activites as $activite):  ?>
  <?php $animation = ORMAnimation::get($activite->getCodeanim()) ?>

  <?php 
  if($activite->getCodeetatact() == 'O') {
    $etat = "Disponible";
  } else 
      if($activite->getCodeetatact() == ' N') {
        $etat = "Indisponible";
      }
  ?>
  
  <div class="card" style="width: 18rem; margin: 0 auto; margin-bottom: .3em;">
  <div class="card-body">
    <h5 class="card-title"><?= $animation->getNomanim() ?></h5>
    <h6 class="card-subtitle mb-2">Activité à animer prévue pour le <?= $activite->getDateact()->format('d/m/Y') ?></h6>
    <h6 class="card-subtitle mb-2 text-muted"><?= $etat ?></h6>
  </div>
</div>
<?php endforeach ?>
<?php endif ?>


<?php $content = ob_get_clean(); ?>
<?php require("vues/template.php"); ?>
