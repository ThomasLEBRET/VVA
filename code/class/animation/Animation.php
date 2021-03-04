<?php

require_once("class/datas/Database.php");
include("sqlRequests.php");

class Animation extends Database {

  public function getAll() {

    global $getAll;
    global $getAllValides;

    if(Session::get('TYPEPROFIL') == 'EN') {
      $animations = $this->query($getAll, 'Animation');
    } else {
      $dtFinSej = Session::get('DATEFINSEJOUR');
      $dtDebSej = Session::get('DATEDEBSEJOUR');

      $dateNaiss = new DateTime(Session::get('DATENAISCOMPTE'));
      $dateNow = new DateTime(date("Y-m-d"));

      $ageUser = $dateNow->diff($dateNaiss);
      $animations = $this->prepare($getAllValides, [$ageUser->y], 'Animation', 0);
    }
    return $animations;

  }

  public function getCodesTypeAnimations() {
    global $getCodesTypeAnim;
    $pre_datas = $this->query($getCodesTypeAnim, 'Animation');
    $datas = [];
    foreach ($pre_datas as $data) {
      $datas[] = $data->CODETYPEANIM;
    }
    return $datas;
  }

  public function add($post) {
    global $addAnimation;

    $datas = $post->getArray();
    foreach ($datas as $key => $value) {
      $data[] = $value;
    }

    try {
      $this->prepare($addAnimation, $data, 'Animation');
      return true;
    } catch (\Exception $e) {
      return false;
    }




  }

}

?>
