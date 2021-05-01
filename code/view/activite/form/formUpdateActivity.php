<?php ob_start(); ?>

<form class="justify" action="index.php?page=updateActivite" method="POST">
  <h1>Mettez à jour l'activite</h1>
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="codeetatact">Code d'état de l'activité</label>
      <select name="codeetatact">
        <?php foreach($codesEtatAct as $code): ?>
          <option><?= $code ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="col-md-3 mb-3">
      <label for="prixact">Prix de l'activité</label>
      <input value="<?= $activite->getPrixact() ?>" name="prixact" type="number" min="0" max=<?= $animation->getTarifanim(); ?> class="form-control" id="prixact" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="dateact">Date de l'activité</label>
      <input value="<?= date('Y-m-d', strtotime($activite->getDateact())) ?>" name="dateact" type="date" min="<?= date('Y-m-d') ?>" max=<?= date('Y-m-d', strtotime($animation->getDatevaliditeanim())) ?> class="form-control" id="dateact" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="hrrdvact">Heure rdv activité</label>
      <input value="<?= $activite->getHrrdvact() ?>" name="hrrdvact" type="time" class="form-control" id="hrrdvact" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="hrdebutact">Heure début activité</label>
      <input value="<?= $activite->getHrdebutact() ?>" name="hrdebutact" type="time" class="form-control" id="hrdebutact" required>
    </div>
  </div>
  <input type="hidden" name="noact" value="<?= $activite->getNoact() ?>">
  <input class="btn btn-primary" type="submit" value="Envoyer">
</form>

<?php $content = ob_get_clean(); ?>
<?php require("view/template.php"); ?>