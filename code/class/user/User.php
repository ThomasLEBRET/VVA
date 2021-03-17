<?php

require_once("class/datas/Database.php");
include("sqlRequests.php");

/**
 * User : object class to create user and apply actions in a user
 */
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

  /**
   * Default constructor
   */
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
  public function setUser($user){
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
  public function setMdp($mdp){
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
  public function setNomcompte($nomcompte){
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
  public function setPrenomcompte($prenomcompte){
    $this->prenomcompte = $prenomcompte;
  }

  /**
   * get an inscription date
   * @return date
   */
  public function getDateinscrip(){
    return $this->dateinscrip;
  }

  /**
   * set a inscription date
   * @param date $dateinscrip
   */
  public function setDateinscrip($dateinscrip){
    $this->dateinscrip = $dateinscrip;
  }

  /**
   * get a close date for a user account
   * @return date
   */
  public function getDateferme(){
    return $this->dateferme;
  }

  /**
   * set a close date for a user account
   * @param date $dateferme
   */
  public function setDateferme($dateferme){
    $this->dateferme = $dateferme;
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
  public function setTypeprofil($typeprofil){
    $this->typeprofil = $typeprofil;
  }

  /**
   * get a start date stay
   * @return date
   */
  public function getDatedebsejour(){
    return $this->datedebsejour;
  }

  /**
   * set a start date stay
   * @param date $datedebsejour
   */
  public function setDatedebsejour($datedebsejour){
    $this->datedebsejour = $datedebsejour;
  }

  /**
   * get a end date stay
   * @return date $datefinsejour
   */
  public function getDatefinsejour(){
    return $this->datefinsejour;
  }

  /**
   * set a end date stay
   * @param date $datefinsejour
   */
  public function setDatefinsejour($datefinsejour){
    $this->datefinsejour = $datefinsejour;
  }

  /**
   * get birth date
   * @return date
   */
  public function getDatenaiscompte(){
    return $this->datenaiscompte;
  }

  /**
   * set birth date
   * @param date $datenaiscompte
   */
  public function setDatenaiscompte($datenaiscompte){
    $this->datenaiscompte = $datenaiscompte;
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
    return $this->notelcompte;
  }

  /**
   * set an tel num
   * @param int $notelcompte
   */
  public function setNotelcompte($notelcompte){
    $this->notelcompte = $notelcompte;
  }

  /**
   * function to login user where he valid login form
   * @param  Parameters $params a $_POST array issue from the Parameters class
   * @return bool       true if success login, false otherwise
   */
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
