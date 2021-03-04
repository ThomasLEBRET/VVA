<?php $title = "VVA - Activitées de l'animation " ?>

<?php ob_start(); ?>

<?php foreach ($activites as $activite) : ?>
  <?php $prix = str_replace(".", "€", strval($activite->PRIXACT)) ?>

  <div class="card justify">
    <div class="card-body">
      <h5 class="card-title">Session encadrée par <?= $activite->PRENOMRESP." ".$activite->NOMRESP ?></h5>
      <p class="card-text">Prix : <?= $prix ?></p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Date : <?= $activite->DATEACT ?></li>
      <li class="list-group-item">Heure de début : <?= $activite->HRDEBUTACT ?></li>
      <li class="list-group-item">Heure de fin : <?= $activite->HRFINACT ?></li>
    </ul>

  </div>

<?php endforeach ?>

<?php $content = ob_get_clean(); ?>
<?php require("view/template.php"); ?>
