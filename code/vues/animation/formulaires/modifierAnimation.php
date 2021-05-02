<?php ob_start(); ?>

<form class="justify" action="index.php?page=modifierAnimation" method="POST">
  <h1>Mettre à jour une animation</h1>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="codetypeanim">Code de type d'animation</label>
      <select name="codetypeanim">
        <?php foreach($codesTypeAnimation as $cdTypeAnim): ?>
          <option><?= $cdTypeAnim ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="col-md-4 mb-3">
      <label for="nomanim">Nom de l'animation</label>
        <input value="<?=$animation->getNomanim()?>" name="nomanim" type="text" class="form-control" id="nomanim" placeholder="Activité" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="datevalidite">Date de validité de l'animation</label>
      <input value="<?=$animation->getDatevaliditeanim()->format('Y-m-d');?>" name="datevaliditeanim" type="date" min="<?= date('Y-m-d'); ?>" class="form-control" id="datevalidite" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="dureeanim">Durée de l'animation</label>
      <input value="<?=$animation->getDureeanim()?>" name="dureeanim" type="number" min="1" class="form-control" id="dureeanim" placeholder="2" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="limiteage">Limite d'âge</label>
      <input value="<?=$animation->getLimiteage()?>" name="limiteage" min="1" type="number" class="form-control" id="limiteage" placeholder="6" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="tarif">Tarif</label>
      <input value="<?=$animation->getTarifanim()?>" name="tarifanim" min="0" type="number" class="form-control" id="tarif" placeholder="10" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="nbreplaceanim">Nombre de place disponible</label>
      <input value="<?=$animation->getNbreplaceanim()?>" name="nbreplaceanim" min="1" type="number" class="form-control" id="nbrplaces" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="descriptanim">Description de l'animation</label>
      <textarea name="descriptanim" class="form-control" id="descriptanim" required ><?=$animation->getDescriptanim()?></textarea>
    </div>
    <div class="col-md-3 mb-3">
      <label for="commentaireanim">Commentaire de l'animation</label>
      <textarea name="commentanim" class="form-control" id="commentaireanim" required ><?=$animation->getCommentanim()?></textarea>
    </div>
    <div class="col-md-3 mb-3">
      <label for="difficulte">Difficulté</label>
      <select name="difficulteanim">
        <option value="Facile">Facile</option>
        <option value="Moyen">Moyenne</option>
        <option value="Difficile">Difficile</option>
      </select>
    </div>
  </div>
  <input type="hidden" name="codeanim" value="<?=$animation->getCodeanim()?>">
  <input class="btn btn-primary" type="submit" value="Envoyer">
</form>


<?php $content = ob_get_clean(); ?>
<?php require("vues/template.php"); ?>