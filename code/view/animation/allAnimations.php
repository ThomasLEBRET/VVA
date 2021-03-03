<?php $title = "VVA - Animations" ?>

<?php ob_start(); ?>

<div class="card">

<?php foreach ($animations as $animation) : ?>

<?php $prix = str_replace(".", "€", strval($animation->TARIFANIM)) ?>
<?php $dureeAnim = sprintf('%02d:%02d', (int) $animation->DUREEANIM, fmod($animation->DUREEANIM, 1) * 60); ?>

<div class="card justify">
  <div class="card-body">
    <h5 class="card-title"><?= $animation->NOMANIM ?> (<?= $animation->NOMTYPEANIM ?>)</h5>
    <p class="card-text"><?= $animation->DESCRIPTANIM ?></p>
    <p class="card-text text-muted"><?= $animation->COMMENTANIM ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Durée : <?= $dureeAnim ?></li>
    <li class="list-group-item">Limite d'âge : <?= $animation->LIMITEAGE ?> ans</li>
    <li class="list-group-item">Nombre de places restantes : <?= $animation->places_restantes ?></li>
    <li class="list-group-item">Prix : <?= $prix ?></li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Voir les activités pour l'animation <?= $animation->NOMANIM ?></a>
  </div>
</div>
<?php endforeach ?>

</div>

<?php $content = ob_get_clean(); ?>
<?php require("view/template.php"); ?>
