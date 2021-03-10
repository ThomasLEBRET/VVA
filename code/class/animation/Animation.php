<?php

require_once("class/datas/Database.php");
include("sqlRequests.php");

class Animation extends Database {

  private $codeanim;
  private $codetypeanim;
  private $nomanim;
  private $datecreationanim;
  private $datevaliditeanim;
  private $dureeanim;
  private $limiteage;
  private $tarifanim;
  private $nbreplaceanim;
  private $descriptanim;
  private $commentanim;

  private $nomtypeanim;
  private $places_restantes;

  public function __construct() {
    $this->codeanim = "null";
    $this->codetypeanim = "null";
    $this->nomanim = "null";
    $this->datecreationanim = "null";
    $this->datevaliditeanim = "null";
    $this->limiteage = "null";
    $this->tarifanim = "null";
    $this->nbreplaceanim = "null";
    $this->descriptanim = "null";
    $this->commentanim = "null";

    $this->nomtypeanim = "null";
    $this->places_restantes = "null";
  }

  public function getNomtypeanim(){
    return $this->nomtypeanim;
  }

  public function setNomtypeanim($nomtypeanim){
    $this->nomtypeanim = $nomtypeanim;
  }

  public function getPlaces_restantes(){
    return $this->places_restantes;
  }

  public function setPlaces_restantes($places_restantes){
    $this->places_restantes = $places_restantes;
  }



  public function getCodeanim(){
    return $this->codeanim;
  }

  public function setCodeanim($codeanim){
    $this->codeanim = $codeanim;
  }

  public function getCodetypeanim(){
    return $this->codetypeanim;
  }

  public function setCodetypeanim($codetypeanim){
    $this->codetypeanim = $codetypeanim;
  }

  public function getNomanim(){
    return $this->nomanim;
  }

  public function setNomanim($nomanim){
    $this->nomanim = $nomanim;
  }

  public function getDatecreationanim(){
    return $this->datecreationanim;
  }

  public function setDatecreationanim($datecreationanim){
    $this->datecreationanim = $datecreationanim;
  }

  public function getDatevaliditeanim(){
    return $this->datevaliditeanim;
  }

  public function setDatevaliditeanim($datevaliditeanim){
    $this->datevaliditeanim = $datevaliditeanim;
  }

  public function getDureeanim(){
    return $this->dureeanim;
  }

  public function setDureeanim($dureeanim){
    $this->dureeanim = $dureeanim;
  }

  public function getLimiteage(){
    return $this->limiteage;
  }

  public function setLimiteage($limiteage){
    $this->limiteage = $limiteage;
  }

  public function getTarifanim(){
    return $this->tarifanim;
  }

  public function setTarifanim($tarifanim){
    $this->tarifanim = $tarifanim;
  }

  public function getNbreplaceanim(){
    return $this->nbreplaceanim;
  }

  public function setNbreplaceanim($nbreplaceanim){
    $this->nbreplaceanim = $nbreplaceanim;
  }

  public function getDescriptanim(){
    return $this->descriptanim;
  }

  public function setDescriptanim($descriptanim){
    $this->descriptanim = $descriptanim;
  }

  public function getCommentanim(){
    return $this->commentanim;
  }

  public function setCommentanim($commentanim){
    $this->commentanim = $commentanim;
  }

  public function getAll() {
    global $getAll;
    global $getAllValides;

    if(Session::get('typeprofil') == 'EN') {
      $animations = $this->select($getAll, [], 'Animation');
    } else {
      $dtFinSej = Session::get('datefinsejour');
      $dtDebSej = Session::get('datedebsejour');

      $dateNaiss = new DateTime(Session::get('datenaiscompte'));
      $dateNow = new DateTime(date("Y-m-d"));

      $ageUser = $dateNow->diff($dateNaiss);
      $animations = $this->select($getAllValides, [$ageUser->y], 'Animation');
    }
    return $animations;
  }

  public function getCodesTypeAnimations() {
    global $getCodesTypeAnim;
    $pre_datas = $this->select($getCodesTypeAnim, [], 'Animation');
    $datas = [];
    foreach ($pre_datas as $data) {
      $datas[] = $data->codetypeanim;
    }
    return $datas;
  }

  public function add($post) {
    global $addAnimation;

    $datas = $post->getArray();
    foreach ($datas as $val) {
      $data[] = $val;
    }

    try {
      $this->insert($addAnimation, $data);
      return true;
    } catch (\Exception $e) {
      return false;
    }

  }

  public function isValid($codeAnim) {
    global $getCommonAnimations;

    try {
      $this->select($getCommonAnimations, [$codeAnim], 'Animation');
      return true;
    } catch (\Exception $e) {
      return false;
    }
  }

}

?>
