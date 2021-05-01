<?php

/**
 * User : object class to create user and apply actions in a user
 */
class User {

  private string $user;
  private string $mdp;
  private string $nomcompte;
  private string $prenomcompte;
  private DateTime $dateinscrip;
  private $dateferme;
  private string $typeprofil;
  private DateTime $datedebsejour;
  private DateTime $datefinsejour;
  private DateTime $datenaiscompte;
  private string $adrmailcompte;
  private int $notelcompte;

  /**
   * Default constructor
   */
  public function __construct() {
    $this->user = "null";
    $this->mdp = "null";
    $this->nomcompte = "null";
    $this->prenomcompte = "null";
    $this->dateinscrip = new DateTime();
    $this->dateferme = null;
    $this->typeprofil = "null";
    $this->datedebsejour = new DateTime();
    $this->datefinsejour = new DateTime();
    $this->datenaiscompte = new DateTime;
    $this->adrmailcompte = "null";
    $this->notelcompte = 0;
  }

  /**
   * return a user login (PK)
   * @return string
   */
  public function getUser(){
    return $this->user;
  }

  /**
   * set a user login
   * @param string $user
   */
  public function setUser(string $user){
    $this->user = $user;
  }

  /**
   * get a user password
   * @return string
   */
  public function getMdp(){
    return $this->mdp;
  }

  /**
   * set a user password
   * @param string $mdp
   */
  public function setMdp(string $mdp){
    $this->mdp = $mdp;
  }

  /**
   * get an account name
   * @return string
   */
  public function getNomcompte(){
    return $this->nomcompte;
  }

  /**
   * set an account name
   * @param string $nomcompte
   */
  public function setNomcompte(string $nomcompte){
    $this->nomcompte = $nomcompte;
  }

  /**
   * get a surname account
   * @return string
   */
  public function getPrenomcompte(){
    return $this->prenomcompte;
  }

  /**
   * set a surname account
   * @param string $prenomcompte
   */
  public function setPrenomcompte(string $prenomcompte){
    $this->prenomcompte = $prenomcompte;
  }

  /**
   * get an inscription date
   * @return DateTime
   */
  public function getDateinscrip(){
    return $this->dateinscrip->format('d/m/Y');
  }

  /**
   * set a inscription date
   * @param mixed $dateinscrip
   */
  public function setDateinscrip($dateinscrip){
    $this->dateinscrip = new DateTime($dateinscrip);
    $this->dateinscrip->format('d/m/Y');
  }

  /**
   * get a close date for a user account
   * @return DateTime
   */
  public function getDateferme(){
    if($this->dateferme != NULL) {
      return $this->dateferme->format('d/m/Y');
    }
    return $this->dateferme;
  }

  /**
   * set a close date for a user account
   * @param mixed $dateferme
   */
  public function setDateferme($dateferme){
    if($dateferme != NULL) {
      $this->dateferme = new DateTime($dateferme);
      $this->dateferme->format('d/m/Y');
    } else {
      $this->dateferme = $dateferme;
    }
  }

  /**
   * get type of user profil
   * @return string
   */
  public function getTypeprofil(){
    return $this->typeprofil;
  }

  /**
   * set a type of user profil
   * @param string $typeprofil
   */
  public function setTypeprofil(string $typeprofil){
    $this->typeprofil = $typeprofil;
  }

  /**
   * get a start date stay
   * @return DateTime
   */
  public function getDatedebsejour(){
    return $this->datedebsejour->format('d/m/Y');
  }

  /**
   * set a start date stay
   * @param date $datedebsejour
   */
  public function setDatedebsejour($datedebsejour){
    $this->datedebsejour = new DateTime($datedebsejour);
    $this->datedebsejour->format('d/m/Y');
  }

  /**
   * get a end date stay
   * @return DateTime $datefinsejour
   */
  public function getDatefinsejour(){
    return $this->datefinsejour->format('d/m/Y');
  }

  /**
   * set a end date stay
   * @param DateTime $datefinsejour
   */
  public function setDatefinsejour($datefinsejour){
    $this->datefinsejour = new DateTime($datefinsejour);
    $this->datefinsejour->format('d/m/Y');
  }

  /**
   * get birth date
   * @return DateTime
   */
  public function getDatenaiscompte(){
    return $this->datenaiscompte->format('d/m/Y');
  }

  /**
   * set birth date
   * @param DateTime $datenaiscompte
   */
  public function setDatenaiscompte($datenaiscompte){
    $this->datenaiscompte = new DateTime($datenaiscompte);
    $this->datenaiscompte->format('d/m/Y');
  }

  /**
   * get an e-mail adress
   * @return string
   */
  public function getAdrmailcompte(){
    return $this->adrmailcompte;
  }

  /**
   * set an e-mail adress
   * @param string $adrmailcompte
   */
  public function setAdrmailcompte($adrmailcompte){
    $this->adrmailcompte = $adrmailcompte;
  }

  /**
   * get an tel num
   * @return int
   */
  public function getNotelcompte(){
    return intval($this->notelcompte);
  }

  /**
   * set an tel num
   * @param int $notelcompte
   */
  public function setNotelcompte(int $notelcompte){
    $this->notelcompte = intval($notelcompte);
  }

}

?>
