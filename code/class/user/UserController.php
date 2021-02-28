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

  }

}
?>
