<?php

require_once("User.php");
require_once("ORMUser.php");

require_once("class/animation/Animation.php");
require_once("class/animation/ORMAnimation.php");

class UserController extends User {

  public function __construct() {

  }

  /**
   * Redirect to the home page after a login user or whene a user start to navigate into the website
   * @param  array $post a $_POST array issue from Parameters class
   * @return void just required associate view
   */
  public function home($post) {
    if(empty($post->getArray())) {
      if(Session::get("user") != null) {
        $this->chooseView();
      } else {
        require_once("view/user/accueil.php");
      }
    } else {
      if(ORMUser::connexion($post)) {
        header('Location: index.php?page=accueil');
      } else {
        require_once("view/user/error/errorlogin.php");
      }
    }
  }

  private function chooseView() {
    switch (Session::get('typeprofil')) {
      case 'VA':
        $activites = ORMUser::getActivitesValidesVacancier();
        require_once("view/user/accueilVacancier.php");
        break;
      case 'EN':
        $activites = ORMUser::getActivitesSousEncadrant();
        require_once("view/user/accueilEncadrant.php");
        break;
      case 'AM':
        $listAccounts = ORMUser::getAllAccounts();
        require_once("view/user/accueilAdministrateur.php");
        break;
      }
  }


}
?>
