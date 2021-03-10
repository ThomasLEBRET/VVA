<?php

require_once("class/datas/Database.php");
include("sqlRequests.php");

class User extends Database {

  private $user;
  private $mdp;
  private $nomcompte;
  private $prenomcompte;
  private $dateinscrip;
  private $dateferme;
  private $typeprofil;
  private $datedebsejour;
  private $datefinsejour;
  private $datenaiscompte;
  private $adrmailcompte;
  private $notelcompte;

  public function __construct() {
    $this->user = "null";
    $this->mdp = "null";
    $this->nomcompte = "null";
    $this->prenomcompte = "null";
    $this->dateinscrip = "null";
    $this->dateferme = "null";
    $this->typeprofil = "null";
    $this->datedebsejour = "null";
    $this->datefinsejour = "null";
    $this->datenaiscompte = "null";
    $this->adrmailcompte = "null";
    $this->notelcompte = "null";
  }

  public function getUser(){
    return $this->user;
  }

  public function setUser($user){
    $this->user = $user;
  }

  public function getMdp(){
    return $this->mdp;
  }

  public function setMdp($mdp){
    $this->mdp = $mdp;
  }

  public function getNomcompte(){
    return $this->nomcompte;
  }

  public function setNomcompte($nomcompte){
    $this->nomcompte = $nomcompte;
  }

  public function getPrenomcompte(){
    return $this->prenomcompte;
  }

  public function setPrenomcompte($prenomcompte){
    $this->prenomcompte = $prenomcompte;
  }

  public function getDateinscrip(){
    return $this->dateinscrip;
  }

  public function setDateinscrip($dateinscrip){
    $this->dateinscrip = $dateinscrip;
  }

  public function getDateferme(){
    return $this->dateferme;
  }

  public function setDateferme($dateferme){
    $this->dateferme = $dateferme;
  }

  public function getTypeprofil(){
    return $this->typeprofil;
  }

  public function setTypeprofil($typeprofil){
    $this->typeprofil = $typeprofil;
  }

  public function getDatedebsejour(){
    return $this->datedebsejour;
  }

  public function setDatedebsejour($datedebsejour){
    $this->datedebsejour = $datedebsejour;
  }

  public function getDatefinsejour(){
    return $this->datefinsejour;
  }

  public function setDatefinsejour($datefinsejour){
    $this->datefinsejour = $datefinsejour;
  }

  public function getDatenaiscompte(){
    return $this->datenaiscompte;
  }

  public function setDatenaiscompte($datenaiscompte){
    $this->datenaiscompte = $datenaiscompte;
  }

  public function getAdrmailcompte(){
    return $this->adrmailcompte;
  }

  public function setAdrmailcompte($adrmailcompte){
    $this->adrmailcompte = $adrmailcompte;
  }

  public function getNotelcompte(){
    return $this->notelcompte;
  }

  public function setNotelcompte($notelcompte){
    $this->notelcompte = $notelcompte;
  }

  public function connexion($params) {
    global $selectUser;

    $login = $params->get("login");
    $password = $params->get("password");
    $user = $this->select($selectUser, [$login, $password], 'User', true);
    if(empty($user)) {
      return false;
    } else {
      foreach ($user as $key => $value) {
        Session::set($key, $value);
      }
      return true;
    }
  }

}

?>
