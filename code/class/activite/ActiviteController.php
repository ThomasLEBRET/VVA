<?php

  require_once("Activite.php");

  class ActiviteController extends Activite {

    private $activite;

    public function __construct() {
      $this->activite = new Activite();
    }

    public function getAllByCodeAnim($codeActivite) {
      if(!isset($codeActivite)) {
        require_once("view/activite/errors/errorCodeAnimation.php");
      } else {
        $activites = $this->activite->getAll($codeActivite);
        require_once("view/activite/activitesByCodeAnimation.php");
      }

    }

  }

?>
