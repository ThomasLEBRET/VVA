<?php ob_start(); ?>

<form class="justify" action="index.php?page=ajouterActivite" method="POST">
  <h1>Créer une activite</h1>
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
      <input name="prixact" type="number" min="0" max=<?= $animation->getTarifanim(); ?> class="form-control" id="prixact" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="dateact">Date de l'activité</label>
      <input name="dateact" type="date" min="<?= date('Y-m-d') ?>" max=<?=$animation->getDatevaliditeanim()->format('Y-m-d')?> class="form-control" id="dateact" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="hrrdvact">Heure rdv activité</label>
      <input name="hrrdvact" type="time" class="form-control" id="hrrdvact" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="hrdebutact">Heure début activité</label>
      <input name="hrdebutact" type="time" class="form-control" id="hrdebutact" required>
    </div>
  </div>
  <input type="hidden" name="codeanim" value="<?= $animation->getCodeanim() ?>">
  <input class="btn btn-primary" type="submit" value="Envoyer">
</form>

<?php $formAddActivite = ob_get_clean(); ?>
