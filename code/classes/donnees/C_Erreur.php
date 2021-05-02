<?php

/**
 * Classe contrôleur objet pour gérer les erreurs HTTP 
 */
class C_Erreur {
  private bool $debug;

  /**
   * Constructeur par défaut
   */
  public function __construct() {
    $this->debug = true;
  }

  /**
   * Renvoi une vue préfabriquée d'erreur 404
   * @return void
   */
  public function nonTrouvee() {
    $title = "Erreur 404";
    $subTitle = "Erreur Not Found : la page demandée est inaccessible ou introuvable";
    if($this->debug == false) {
      $content = "La page peut être en travaux ou inaccessible temporairement, veuillez réessayer plus tard";
    } else {
      $content = "<pre>".$e."</pre>";
    }
    require_once("vues/templateMessage.php");
  }

  /**
   * Renvoi une vue préfabriquée d'erreur 500
   * @return void
   */
  public function serveur($e) {
    $title = "Erreur 500";
    $subTitle = "Erreur serveur : la requête a échouée";
    if($this->debug == false) {
      $content = "Veuillez patienter le temps que nous corrigerons le problème";
    } else {
      $content = "<pre>".$e."</pre>";
    }
    require_once("vues/templateMessage.php");
  }
}
