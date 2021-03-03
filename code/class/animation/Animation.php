<?php

require_once("class/datas/Database.php");
include("sqlRequests.php");

class Animation extends Database {

  public function getAll() {

    global $getAll;
    global $getAllValides;

    if(Session::get('TYPEPROFIL') == 'EN') {
      $animations = $this->prepare($getAll, [], 'Animation', 0);
    } else {
      $dtFinSej = Session::get('DATEFINSEJOUR');
      $dtDebSej = Session::get('DATEDEBSEJOUR');

      $dateNaiss = new DateTime(Session::get('DATENAISCOMPTE'));
      $dateNow = new DateTime(date("Y-m-d"));

      $ageUser = $dateNow->diff($dateNaiss);
      $animations = $this->prepare($getAllValides, [$dtFinSej, $ageUser->y], 'Animation', 0);
    }
    return $animations;

  }

}

?>
