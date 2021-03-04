<?php
require_once("class/datas/Database.php");
include("sqlRequests.php");

class Activite extends Database {

  public function getAll($codeAnimation) {

    global $getAllActivites;
    $activites = $this->prepare
    (
      $getAllActivites,
      [
        $codeAnimation,
        Session::get('DATEDEBSEJOUR')
      ],
      'Activite'
    );
    return $activites;

  }

}

?>
