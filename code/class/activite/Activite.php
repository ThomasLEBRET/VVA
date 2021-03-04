<?php
require_once("class/datas/Database.php");
include("sqlRequests.php");

class Activite extends Database {

  public function getAll($codeAnimation) {

    global $getAllActivitesForVacancier;
    global $getAllActivitesForEncadrant;

    if(Session::get('TYPEPROFIL') == 'EN') {
      $activites = $this->prepare
      (
        $getAllActivitesForEncadrant,
        [
          $codeAnimation
        ],
        'Activite'
      );
    } else {
      $activites = $this->prepare
      (
        $getAllActivitesForVacancier,
        [
          $codeAnimation,
          Session::get('DATEDEBSEJOUR')
        ],
        'Activite'
      );
    }
    return $activites;

  }

}

?>
