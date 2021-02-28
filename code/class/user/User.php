<?php

class User {

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
    $user = "unknow";
    $mdp = "unknow";
    $nomcompte = "unknow";
    $prenomcompte = "unknow";
    $dateinscrip = "unknow";
    $dateferme = "unknow";
    $typeprofil = "unknow";
    $datedebsejour = "unknow";
    $datefinsejour = "unknow";
    $datenaiscompte = "unknow";
    $adrmailcompte = "unknow";
    $notelcompte = "unknow";
  }

  /**
  * Construit un objet en fonction d'un tableau de paramètres
  * @param  array  $params un tableau associatif de paramètres composant l'objet User
  * @return User         un objet de type User
  */
  private function buildObject(array $params) {
    foreach ($params as $key => $value) {
      $method = 'set'.ucfirst(strtolower($key));
      if(method_exists($this, $method)) {
        $this->$method($value);
        $_SESSION[$key] = $value;
      }
    }
    return $this;
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


}

?>
