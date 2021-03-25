<?php $title = "VVA - Activitées de l'animation " ?>

<?php ob_start(); ?>

<?php if(isset($formAddActivite)) { echo $formAddActivite; } ?>
<?php if(isset($alertSuccess)) { echo $alertSuccess; } ?>


<?php foreach ($activites as $activite) : ?>
  <?php $prix = str_replace(".", "€", strval($activite->getPrixact())) ?>

  <div class="card justify">
    <div class="card-body">
      <h5 class="card-title">Session encadrée par <?= $activite->getPrenomresp()." ".$activite->getNomresp() ?></h5>
      <p class="card-text">Prix : <?= $prix ?></p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Date : <?= $activite->getDateact() ?></li>
      <li class="list-group-item">Heure de début : <?= $activite->getHrdebutact() ?></li>
      <li class="list-group-item">Heure de fin : <?= $activite->getHrfinact() ?></li>
    </ul>
    <br>
    <form action="index.php?page=unscribeRegister&noact=<?= $activite->getNoact() ?>"  method="post">

      <?php
      if($this->activite->isAlreadyRegistered($activite->getNoact())) {
        if(isset($btnUnregister)) { echo $btnUnregister; }
      }
      ?>
    </form>

    <form action="index.php?page=tryRegister&noact=<?= $activite->getNoact() ?>" method="post">

    <?php
    if(!$this->activite->isAlreadyRegistered($activite->getNoact())) {
      if(isset($btnRegister)) { echo $btnRegister; }
    }
    ?>

    </form>

  </div>

<?php endforeach ?>

<?php $content = ob_get_clean(); ?>
<?php require("view/template.php"); ?>
