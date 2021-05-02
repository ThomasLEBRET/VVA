<form class="justify" action="index.php?page=ajouterAnimation" method="POST">
  <h1>Créer une animation</h1>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="codeanim">Code d'animation</label>
      <input name="codeanim" type="text" class="form-control" id="codeanim" placeholder="AB" required>
    </div>
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
        <input name="nomanim" type="text" class="form-control" id="nomanim" placeholder="Activité" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="datevalidite">Date de validité de l'animation</label>
      <input name="datevaliditeanim" type="date" min="<?= date('Y-m-d'); ?>" class="form-control" id="datevalidite" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="dureeanim">Durée de l'animation</label>
      <input name="dureeanim" type="number" min="1" class="form-control" id="dureeanim" placeholder="2" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="limiteage">Limite d'âge</label>
      <input name="limiteage" min="1" type="number" class="form-control" id="limiteage" placeholder="6" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="tarif">Tarif</label>
      <input name="tarifanim" min="0" type="number" class="form-control" id="tarif" placeholder="10" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="nbrplaces">Nombre de place disponible</label>
      <input name="nbreplaceanim" min="1" type="number" class="form-control" id="nbrplaces" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="dureeanim">Description de l'animation</label>
      <textarea name="descriptanim" class="form-control" id="dureeanim" required ></textarea>
    </div>
    <div class="col-md-3 mb-3">
      <label for="commentaireanim">Commentaire de l'animation</label>
      <textarea name="commentanim" class="form-control" id="commentaireanim" required ></textarea>
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
  <input class="btn btn-primary" type="submit" value="Envoyer">
</form>
