<?php

/**
 * Utilisateur : Classe modélisant un utilisateur
 */
class Utilisateur {

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
   * Constructeur par défaut
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
   * Accesseur user
   * @return string
   */
  public function getUser(){
    return $this->user;
  }

  /**
   * Mutateur user
   * @param string $user
   */
  public function setUser(string $user){
    $this->user = $user;
  }

  /**
   * Accesseur mdp
   * @return string
   */
  public function getMdp(){
    return $this->mdp;
  }

  /**
   * mutateur mdp
   * @param string $mdp
   */
  public function setMdp(string $mdp){
    $this->mdp = $mdp;
  }

  /**
   * Accesseur nomCompte
   * @return string
   */
  public function getNomcompte(){
    return $this->nomcompte;
  }

  /**
   * Mutateur nomCompte
   * @param string $nomcompte
   */
  public function setNomcompte(string $nomcompte){
    $this->nomcompte = $nomcompte;
  }

  /**
   * Accesseur prenomComptes
   * @return string
   */
  public function getPrenomcompte(){
    return $this->prenomcompte;
  }

  /**
   * Mutateur prenomCompte
   * @param string $prenomcompte
   */
  public function setPrenomcompte(string $prenomcompte){
    $this->prenomcompte = $prenomcompte;
  }

  /**
   * Accesseur dateInscription
   * @return DateTime
   */
  public function getDateinscrip(){
    return $this->dateinscrip->format('d/m/Y');
  }

  /**
   * Mutateur dateInscription
   * @param mixed $dateinscrip
   */
  public function setDateinscrip($dateinscrip){
    $this->dateinscrip = new DateTime($dateinscrip);
    $this->dateinscrip->format('d/m/Y');
  }

  /**
   * Accesseur dateferme
   * @return DateTime
   */
  public function getDateferme(){
    if($this->dateferme != NULL) {
      $this->dateferme->format('d/m/Y');
    }
    return $this->dateferme;
  }

  /**
   * Mutateur dateFerme
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
   * Accesseur typeProfil
   * @return string
   */
  public function getTypeprofil(){
    return $this->typeprofil;
  }

  /**
   * Mutateur typeProfil
   * @param string $typeprofil
   */
  public function setTypeprofil(string $typeprofil){
    $this->typeprofil = $typeprofil;
  }

  /**
   * Accesseur dateDebSejour
   * @return DateTime
   */
  public function getDatedebsejour(){
    return $this->datedebsejour->format('d/m/Y');
  }

  /**
   * Mutateur dateDebSejour
   * @param date $datedebsejour
   */
  public function setDatedebsejour($datedebsejour){
    $this->datedebsejour = new DateTime($datedebsejour);
    $this->datedebsejour->format('d/m/Y');
  }

  /**
   * Accesseur dateFinSejour
   * @return DateTime $datefinsejour
   */
  public function getDatefinsejour(){
    return $this->datefinsejour->format('d/m/Y');
  }

  /**
   * Mutateur dateFinSejour
   * @param DateTime $datefinsejour
   */
  public function setDatefinsejour($datefinsejour){
    $this->datefinsejour = new DateTime($datefinsejour);
    $this->datefinsejour->format('d/m/Y');
  }

  /**
   * Accesseur dateNaisCompte
   * @return DateTime
   */
  public function getDatenaiscompte(){
    return $this->datenaiscompte->format('d/m/Y');
  }

  /**
   * Mutateur dateNaisCompte
   * @param DateTime $datenaiscompte
   */
  public function setDatenaiscompte($datenaiscompte){
    $this->datenaiscompte = new DateTime($datenaiscompte);
    $this->datenaiscompte->format('d/m/Y');
  }

  /**
   * Accesseur adrMailCompte
   * @return string
   */
  public function getAdrmailcompte(){
    return $this->adrmailcompte;
  }

  /**
   * Mutateur adrMailCompte
   * @param string $adrmailcompte
   */
  public function setAdrmailcompte($adrmailcompte){
    $this->adrmailcompte = $adrmailcompte;
  }

  /**
   * Accesseur noTelCompte
   * @return int
   */
  public function getNotelcompte(){
    return intval($this->notelcompte);
  }

  /**
   * Mutateur noTelCompte
   * @param int $notelcompte
   */
  public function setNotelcompte(int $notelcompte){
    $this->notelcompte = intval($notelcompte);
  }

}

?>
