<?php

require_once("User.php");
require_once("class/animation/Animation.php");

class UserController extends User {

  private $user;

  public function __construct() {
    $this->user = new User();
    $this->animation = new Animation();
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
      if($this->user->connexion($post)) {
        header('Location: index.php?page=accueil');
      } else {
        require_once("view/user/error/errorlogin.php");
      }
    }
  }

  private function chooseView() {
    switch (Session::get('typeprofil')) {
      case 'VA':
        $activites = $this->user->getActivitesValidesVacancier();
        require_once("view/user/accueilVacancier.php");
        break;
      case 'EN':
        $activites = $this->user->getActivitesSousEncadrant();
        require_once("view/user/accueilEncadrant.php");
        break;
      case 'AM':
        $listAccounts = $this->user->getAllAccounts();
        require_once("view/user/accueilAdministrateur.php");
        break;
      }
  }


}
?>
