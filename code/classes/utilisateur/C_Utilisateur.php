<?php

require_once("Utilisateur.php");
require_once("ORMUtilisateur.php");

require_once("classes/animation/Animation.php");
require_once("classes/animation/ORMAnimation.php");

/**
 * Classe contrôleur pour la classe objet Utilisateur
 */
class C_Utilisateur extends Utilisateur {

  public function __construct() {

  }

  /**
   * Redirige l'utilisateur en fonction de l'état de la session et des données postée une fois arrivée sur le site
   * @param  Superglobal $post la variable $_POST encapsulée dans l'objet Superglobal
   * @return void la vue associée en fonction de l'état de la session et du contenu de $post
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

  /**
   * Fonction privée servant à retourner la vue associée au type de compte une fois la connexion réussie pour un utilisateur
   * @param void
   * @return void la vue associée au type de compte utilisateur contenu dans Session
   */
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
