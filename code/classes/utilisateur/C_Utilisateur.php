<?php

require_once("Utilisateur.php");
require_once("ORMUtilisateur.php");

require_once("classes/animation/Animation.php");
require_once("classes/animation/ORMAnimation.php");

class C_Utilisateur extends Utilisateur {

  public function __construct() {

  }

  /**
   * Redirect to the home page after a login user or whene a user start to navigate into the website
   * @param  array $post a $_POST array issue from Parameters class
   * @return void just required associate view
   */
  public function accueil($post) {
    if(empty($post->getArray())) {
      if(Session::get("user") != null) {
        $this->choixVue();
      } else {
        require_once("vues/utilisateur/v_connexion.php");
      }
    } else {
      if(ORMUtilisateur::connexion($post)) {
        header('Location: index.php?page=accueil');
      } else {
        $title = "Erreur de connexion";
        $subTitle = "La connexion a échouée";
        $description = "Vérifiez vos informations de connexion (login et mot de passe)";

        require_once("vues/erreurs/erreursGlobales.php");
      }
    }
  }

  private function choixVue() {
    switch (Session::get('typeprofil')) {
      case 'VA':
        $activites = ORMUtilisateur::getActivitesValidesVacancier();
        require_once("vues/utilisateur/v_Vacancier.php");
        break;
      case 'EN':
        $activites = ORMUtilisateur::getActivitesSousEncadrant();
        require_once("vues/utilisateur/v_Encadrant.php");
        break;
      case 'AM':
        $listAccounts = ORMUtilisateur::getAllAccounts();
        require_once("vues/utilisateur/v_Administrateur.php");
        break;
      }
  }


}
?>
