<?php

/**
 * Class to manage Error and send view in a controller
 */
class C_Erreur {
  private $debug;

  public function __construct() {
    $this->debug = true;
  }

  /**
   * Return error not found view
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
   * Return error server view (when SQL request fail for example)
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
