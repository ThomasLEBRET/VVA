<?php $title = "VVA - Espace administrateur" ?>

<?php ob_start(); ?>

<div class="jumbotron jumbotron-fluid justify">
  <div class="container">
    <h1 class="display-4">Vous êtes connecté en tant qu'administrateur.</h1>
  </div>
</div>


<button class="btn btn-primary" onclick="seePasswords()">Voir les mots de passes</button>
        <script>
        var mdpFields = document.getElementsByTagName("input");

          function seePasswords() {
            for(let field of mdpFields) {
              if(field.type == "text") {
                field.type = "password";
              } else {
                field.type = "text";
              }
            }
          }
        </script>

<div class="row">

<?php foreach($listAccounts as $account): ?>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">
        <?= $account->getPrenomcompte()." ".$account->getNomcompte()." (".$account->getTypeprofil().")" ?>
        </h5>
        
        <p class="card-text">Inscrit depuis le <?= $account->getDateinscrip(); ?></p>
        <p class"card-text>
        Statut du compte : 
        <?php echo $account->getDateferme() != "null" ? "Actif" : "Fermé";  ?>
        </p>

        <?php switch($account->getTypeprofil()) {
          case 'VA': ?>
          <p class="card-text">Séjour du <?= $account->getDatedebsejour()." au ". $account->getDatefinsejour() ?></p>
          <p class="card-text">
          <?php 
            $now = date('d/m/Y');
            if($account->getDatefinsejour() < $now)
              echo "Séjour terminé";
            else if($account->getDatedebsejour() < $now)
                echo "Séjour à venir";
            else 
              echo "Séjour en cours";
          ?>
          </p>
        <?php 
            break;
        case 'EN': ?>
          <p class="card-text">Nombre d'activités en charge :  <?= $account->getNbActivitesEnCharge(); ?></p>
        <?php 
           break;
        }
        ?>
        <input type="password" disabled="disabled" value="<?= $account->getMdp() ?>" />
      </div>
    </div>
  </div>

<?php endforeach ?>

</div>
<?php $content = ob_get_clean(); ?>
<?php require("view/template.php"); ?>
