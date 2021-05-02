<?php

require_once("classes/donnees/Database.php");

include("requetesSQL.php");

/**
* Classe objet Animation
*/
class Animation {

  private string $codeanim;
  private string $codetypeanim;
  private string $nomanim;
  private DateTime $datecreationanim;
  private DateTime $datevaliditeanim;
  private int $dureeanim;
  private int $limiteage;
  private float $tarifanim;
  private int $nbreplaceanim;
  private string $descriptanim;
  private string $commentanim;

  private string $nomtypeanim;
  private int $places_restantes;

  /**
  * Constructeur par défaut
  */
  public function __construct() {
    $this->codeanim = "null";
    $this->codetypeanim = "null";
    $this->nomanim = "null";
    $this->datecreationanim = new DateTime();
    $this->datevaliditeanim = new DateTime();
    $this->dureeanim = 0;
    $this->limiteage = 100;
    $this->tarifanim = 0;
    $this->nbreplaceanim = 0;
    $this->descriptanim = "null";
    $this->commentanim = "null";

    $this->nomtypeanim = "null";
    $this->places_restantes = 0;
  }


  /**
  * Accesseur codeAnim
  *
  * @return string
  */
  public function getCodeanim()
  {
    return $this->codeanim;
  }

  /**
  * Mutateur codeAnim
  *
  * @param string $codeanim
  *
  */
  public function setCodeanim(string $codeanim)
  {
    $this->codeanim = $codeanim;
  }

  /**
  * Accesseur codeTypeAnim
  *
  * @return string
  */
  public function getCodetypeanim()
  {
    return $this->codetypeanim;
  }

  /**
  * Mutateur codeTypeAnim
  *
  * @param string $codetypeanim
  *
  */
  public function setCodetypeanim(string $codetypeanim)
  {
    $this->codetypeanim = $codetypeanim;
  }

  /**
  * Accesseur nomAnim
  *
  * @return string
  */
  public function getNomanim()
  {
    return $this->nomanim;
  }

  /**
  * Mutateur nomAnim
  *
  * @param string $nomanim
  *
  */
  public function setNomanim($nomanim)
  {
    $this->nomanim = $nomanim;
  }

  /**
  * Accesseur dateCreationAnim
  *
  * @return DateTime
  */
  public function getDatecreationanim()
  {
    return $this->datecreationanim->format('d/m/Y');
  }

  /**
  * Mutateur dateCreationAnim
  *
  * @param mixed $datecreationanim
  *
  */
  public function setDatecreationanim($datecreationanim)
  {
    $this->datecreationanim = new DateTime($datecreationanim);
    $this->datecreationanim->format('d/m/Y');
  }

  /**
  * Accesseur dateValiditeAnim
  *
  * @return DateTime
  */
  public function getDatevaliditeanim()
  {
    $this->datevaliditeanim->format('d/m/Y');
    return $this->datevaliditeanim;
  }

  /**
  * Mutateur dateValiditeAnim
  *
  * @param mixed $datevaliditeanim
  *
  */
  public function setDatevaliditeanim($datevaliditeanim)
  {
    $this->datevaliditeanim = new DateTime($datevaliditeanim);
    $this->datevaliditeanim->format('d/m/Y');
  }

  /**
  * Accesseur dureeAnim
  *
  * @return int
  */
  public function getDureeanim()
  {
    return intval($this->dureeanim);
  }

  /**
  * Mutateur dureeAnim
  *
  * @param int $dureeanim
  *
  */
  public function setDureeanim(int $dureeanim)
  {
    $this->dureeanim = intval($dureeanim);
  }

  /**
  * Accesseur limiteAge
  *
  * @return int
  */
  public function getLimiteage()
  {
    return intval($this->limiteage);
  }

  /**
  * Mutateur limiteAge
  *
  * @param int $limiteage
  *
  */
  public function setLimiteage(int $limiteage)
  {
    $this->limiteage = intval($limiteage);
  }

  /**
  * Accesseur tarifAnim
  *
  * @return float
  */
  public function getTarifanim()
  {
    return (float)$this->tarifanim;
  }

  /**
  * Mutateur tarifAnim
  *
  * @param float $tarifanim
  *
  */
  public function setTarifanim(float $tarifanim)
  {
    $this->tarifanim = (float)$tarifanim;
  }

  /**
  * Accesseur NbrePlaceAnim
  *
  * @return int
  */
  public function getNbreplaceanim()
  {
    return intval($this->nbreplaceanim);
  }

  /**
  * Mutateur NbrePlaceAnim
  *
  * @param int $nbreplaceanim
  *
  */
  public function setNbreplaceanim(int $nbreplaceanim)
  {
    $this->nbreplaceanim = intval($nbreplaceanim);
  }

  /**
  * Accesseur descriptAnim
  *
  * @return string
  */
  public function getDescriptanim()
  {
    return $this->descriptanim;
  }

  /**
  * Mutateur descriptAnim
  *
  * @param string $descriptanim
  *
  */
  public function setDescriptanim(string $descriptanim)
  {
    $this->descriptanim = $descriptanim;
  }

  /**
  * Accesseur commentAnim
  *
  * @return string
  */
  public function getCommentanim()
  {
    return $this->commentanim;
  }

  /**
  * Mutateur commentAnim
  *
  * @param string $commentanim
  *
  */
  public function setCommentanim(string $commentanim)
  {
    $this->commentanim = $commentanim;
  }

  /**
  * Accesseur nomTypeAnim
  *
  * @return string 
  */
  public function getNomtypeanim()
  {
    return $this->nomtypeanim;
  }

  /**
  * Mutateur nomTypeAnim
  *
  * @param string $nomtypeanim
  *
  */
  public function setNomtypeanim(string $nomtypeanim)
  {
    $this->nomtypeanim = $nomtypeanim;
  }

  /**
  * Accesseur places_restantes
  *
  * @return int
  */
  public function getPlaces_restantes()
  {
    return intval($this->places_restantes);
  }

  /**
  * Mutateur places_restantes
  *
  * @param int $places_restantes
  *
  */
  public function setPlaces_restantes(int $places_restantes)
  {
    $this->places_restantes = intval($places_restantes);
  }

}

?>
