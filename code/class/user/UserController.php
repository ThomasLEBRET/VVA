<?php

require_once("User.php");

class UserController extends User {

  private $user;

  public function __construct() {
    $this->user = new User();
  }

  /**
   * Redirige vers la page d'accueil après une connexion d'un utilisateur ou lors de l'arrivée sur le site pour la premère fois
   * @param  array $post un tableau associatif $_POST
   * @return void       la vue associée en fonction du succès ou de l'échec de l'inscription
   */
  public function home($post) {
    if(!empty(Session::get("USER"))) {
      switch (Session::get('TYPEPROFIL')) {
        case 'VA':
          require_once("view/user/accueilVacancier.php");
          break;
        case 'EN':
          require_once("view/user/accueilEncadrant.php");
          break;
        }
    } else {
      if(empty($post->getArray())) {
        include_once("view/user/accueil.php");
      } else {
        if($this->user->connexion($post)) {
          switch (Session::get('TYPEPROFIL')) {
            case 'VA':
              require_once("view/user/accueilVacancier.php");
              break;
            case 'EN':
              require_once("view/user/accueilEncadrant.php");
              break;
          }
        } else {
          require_once("view/user/error/errorLogin.php");
        }
      }
    }
  }

}
?>
