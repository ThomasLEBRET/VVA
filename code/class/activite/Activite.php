<?php
require_once("class/datas/Database.php");
include("sqlRequests.php");

class Activite extends Database {

  private $noact;
  private	$codeanim;
  private	$codeetatact;
  private $dateact;
  private $hrrdvact;
  private	$prixact;
  private $hrdebutact;
  private	$hrfinact;
  private $dateannuleact;
  private	$nomresp;
  private	$prenomresp;

  public function __construct() {
    $this->noact = "null";
    $this->codeanim = "null";
    $this->codeetatact = "null";
    $this->dateact = "null";
    $this->hrrdvact = "null";
    $this->prixact = "null";
    $this->hrdebutact = "null";
    $this->hrfinact = "null";
    $this->dateannuleact = "null";
    $this->nomresp = "null";
    $this->prenomresp = "null";
  }


  public function getNoact(){
    return $this->noact;
  }

  public function setNoact($noact){
    $this->noact = $noact;
  }

  public function getCodeanim(){
    return $this->codeanim;
  }

  public function setCodeanim($codeanim){
    $this->codeanim = $codeanim;
  }

  public function getCodeetatact(){
    return $this->codeetatact;
  }

  public function setCodeetatact($codeetatact){
    $this->codeetatact = $codeetatact;
  }

  public function getDateact(){
    return $this->dateact;
  }

  public function setDateact($dateact){
    $this->dateact = $dateact;
  }

  public function getHrrdvact(){
    return $this->hrrdvact;
  }

  public function setHrrdvact($hrrdvact){
    $this->hrrdvact = $hrrdvact;
  }

  public function getPrixact(){
    return $this->prixact;
  }

  public function setPrixact($prixact){
    $this->prixact = $prixact;
  }

  public function getHrdebutact(){
    return $this->hrdebutact;
  }

  public function setHrdebutact($hrdebutact){
    $this->hrdebutact = $hrdebutact;
  }

  public function getHrfinact(){
    return $this->hrfinact;
  }

  public function setHrfinact($hrfinact){
    $this->hrfinact = $hrfinact;
  }

  public function getDateannuleact(){
    return $this->dateannuleact;
  }

  public function setDateannuleact($dateannuleact){
    $this->dateannuleact = $dateannuleact;
  }

  public function getNomresp(){
    return $this->nomresp;
  }

  public function setNomresp($nomresp){
    $this->nomresp = $nomresp;
  }

  public function getPrenomresp(){
    return $this->prenomresp;
  }

  public function setPrenomresp($prenomresp){
    $this->prenomresp = $prenomresp;
  }

  public function getAll($codeAnimation) {

    global $getAllActivitesForVacancier;
    global $getAllActivitesForEncadrant;

    if(Session::get('typeprofil') == 'EN') {
      $activites = $this->select
      (
        $getAllActivitesForEncadrant,
        [
          $codeAnimation
        ],
        'Activite'
      );
    } else {
      $activites = $this->select
      (
        $getAllActivitesForVacancier,
        [
          $codeAnimation,
          Session::get('datedebsejour')
        ],
        'Activite'
      );
    }
    return $activites;

  }

}

?>
