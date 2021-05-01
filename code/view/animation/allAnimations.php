<?php $title = "VVA - Animations" ?>

<?php ob_start(); ?>

<?php if(isset($allIsset)): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Succès !</strong> L'animation a bien été ajoutée.
  </div>
<?php endif ?>

<?php if(Session::get('typeprofil') == 'EN') {
  require_once("form/formAnimation.php");
}
?>

<?php
  if(count($animations) == 0) {
?>
  <h2 style="text-align:center;">Aucune activité n'est disponible pour votre séjour</h2>
<?php } ?>

<?php if(!empty($msgCancelAct)) echo $msgCancelAct; ?>

<div class="card">
<?php foreach ($animations as $animation) : ?>

<?php $prix = str_replace(".", "€", strval($animation->getTarifanim())) ?>
<?php $dureeAnim = sprintf('%02d:%02d', (int) $animation->getDureeanim(), fmod($animation->getDureeanim(), 1) * 60); ?>

<div class="card justify">
  <div class="card-body">
    <h5 class="card-title"><?= $animation->getNomanim() ?> (<?= $animation->getNomtypeanim() ?>)</h5>
    <p class="card-text"><?= $animation->getDescriptanim() ?></p>
    <p class="card-text text-muted"><?= $animation->getCommentanim() ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Durée : <?= $dureeAnim ?></li>
    <li class="list-group-item">Limite d'âge : <?= $animation->getLimiteage() ?> ans</li>
    <li class="list-group-item">Nombre de places restantes : <?= $animation->getPlaces_restantes() ?></li>
    <li class="list-group-item">Prix : <?= $prix ?></li>
  </ul>
  <div class="card-body">
  <?php if(Session::get('typeprofil') == 'EN') { ?>
    <a href="index.php?page=seeUpdateAnimation&codeAnimation=<?= $animation->getCodeanim() ?>" class="btn btn-primary btn-lg" tabindex="-1" role="button" aria-disabled="true">Modifier l'animation</a>
  <?php } ?>
    <a href="index.php?page=activite&codeAnimation=<?=$animation->getCodeanim()?>" class="card-link">Voir les activités pour l'animation <?= $animation->NOMANIM ?></a>
  </div>
</div>
<?php endforeach ?>

</div>

<?php $content = ob_get_clean(); ?>
<?php require("view/template.php"); ?>
