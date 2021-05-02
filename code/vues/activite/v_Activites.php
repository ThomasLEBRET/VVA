<?php $title = "VVA - Activitées de l'animation " ?>

<?php ob_start(); ?>

<?php if(isset($formAddActivite)) { echo $formAddActivite; } ?>


<?php foreach ($activites as $activite) : ?>
  <?php $prix = str_replace(".", "€", strval($activite->getPrixact())) ?>

  <div class="card justify">
    <div class="card-body">
      <h5 class="card-title">Session encadrée par <?= $activite->getPrenomresp()." ".$activite->getNomresp() ?></h5>
      <p class="card-text">Prix : <?= $prix ?></p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Date : <?= $activite->getDateact()->format('d/m/Y') ?></li>
      <li class="list-group-item">Heure de début : <?= $activite->getHrdebutact() ?></li>
      <li class="list-group-item">Heure de fin : <?= $activite->getHrfinact() ?></li>
    </ul>
    <br>

    <?php 
    $listUsersInscrits = ORMInscription::getInscritsActivite($activite->getNoact());
    if(isset($listUsersInscrits) && Session::get('typeprofil') == 'EN') { 
    ?>
      <?php foreach(ORMInscription::getInscritsActivite($activite->getNoact()) as $user): ?>
        <li><?= $user->getPrenomcompte()." ".$user->getNomcompte()?></li>
      <?php endforeach ?>
      </ul>
    <?php } ?>
    <br>

      <?php
      if(Session::get('typeprofil') == 'VA' && ORMActivite::isAlreadyRegistered($activite->getNoact())) { ?>
        <form action="index.php?page=annulerInscription&noact=<?= $activite->getNoact() ?>"  method="post">
          <input type="submit" class="btn btn-secondary" name="cancelActivity" value="Se désinscrire">
        </form>
     <?php } ?>


    <?php
    if(Session::get('typeprofil') == 'VA' && ORMActivite::isAlreadyRegistered($activite->getNoact()) == false) { ?>
    <form action="index.php?page=ajouterInscription&noact=<?= $activite->getNoact() ?>" method="post">
      <input type="submit" class="btn btn-primary" name="register" value="S'inscrire">
    </form>
   <?php } ?>


    <?php
        if(Session::get('typeprofil') == 'EN') {
          if($activite->getCodeetatact() != 'N') { ?>
          <form action="index.php?page=annulerActivite&noAct=<?= $activite->getNoact() ?>" method="post">
            <input type="submit" class="btn btn-danger" name="cancelActivity" value="Annuler l'activité">
          </form>
        <?php } else {
          if(Session::get('typeprofil') == 'EN' && $activite->getCodeetatact() == 'N') {
            echo "L'activité a été annulée";
          }
        }
      }
    ?>
        <br>
    <?php 
      if(Session::get('typeprofil') == 'EN') { ?>
        <a href="index.php?page=vueModifierActivite&noAct=<?= $activite->getNoact() ?>" class="btn btn-primary" role="button" data-bs-toggle="button">Modifier l'activité</a>
      <?php 
      }
    ?>

  </div>

<?php endforeach ?>

<?php $content = ob_get_clean(); ?>
<?php require("vues/template.php"); ?>
