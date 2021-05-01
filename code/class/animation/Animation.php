<?php

require_once("class/datas/Database.php");
include("sqlRequests.php");

/**
* Class to manage animations objects
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
  * default constructor
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
  * Get the value of Class to manage animations objects
  *
  * @return string
  */
  public function getCodeanim()
  {
    return $this->codeanim;
  }

  /**
  * Set the value of Class to manage animations objects
  *
  * @param string $codeanim
  *
  */
  public function setCodeanim(string $codeanim)
  {
    $this->codeanim = $codeanim;
  }

  /**
  * Get the value of Codetypeanim
  *
  * @return string
  */
  public function getCodetypeanim()
  {
    return $this->codetypeanim;
  }

  /**
  * Set the value of Codetypeanim
  *
  * @param string $codetypeanim
  *
  */
  public function setCodetypeanim(string $codetypeanim)
  {
    $this->codetypeanim = $codetypeanim;
  }

  /**
  * Get the value of Nomanim
  *
  * @return string
  */
  public function getNomanim()
  {
    return $this->nomanim;
  }

  /**
  * Set the value of Nomanim
  *
  * @param string $nomanim
  *
  */
  public function setNomanim($nomanim)
  {
    $this->nomanim = $nomanim;
  }

  /**
  * Get the value of Datecreationanim
  *
  * @return DateTime
  */
  public function getDatecreationanim()
  {
    return $this->datecreationanim->format('d/m/Y');
  }

  /**
  * Set the value of Datecreationanim
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
  * Get the value of Datevaliditeanim
  *
  * @return DateTime
  */
  public function getDatevaliditeanim()
  {
    return $this->datevaliditeanim->format('d/m/Y');
  }

  /**
  * Set the value of Datevaliditeanim
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
  * Get the value of Dureeanim
  *
  * @return int
  */
  public function getDureeanim()
  {
    return intval($this->dureeanim);
  }

  /**
  * Set the value of Dureeanim
  *
  * @param int $dureeanim
  *
  */
  public function setDureeanim(int $dureeanim)
  {
    $this->dureeanim = intval($dureeanim);
  }

  /**
  * Get the value of Limiteage
  *
  * @return int
  */
  public function getLimiteage()
  {
    return intval($this->limiteage);
  }

  /**
  * Set the value of Limiteage
  *
  * @param int $limiteage
  *
  */
  public function setLimiteage(int $limiteage)
  {
    $this->limiteage = intval($limiteage);
  }

  /**
  * Get the value of Tarifanim
  *
  * @return float
  */
  public function getTarifanim()
  {
    return (float)$this->tarifanim;
  }

  /**
  * Set the value of Tarifanim
  *
  * @param float $tarifanim
  *
  */
  public function setTarifanim(float $tarifanim)
  {
    $this->tarifanim = (float)$tarifanim;
  }

  /**
  * Get the value of Nbreplaceanim
  *
  * @return int
  */
  public function getNbreplaceanim()
  {
    return intval($this->nbreplaceanim);
  }

  /**
  * Set the value of Nbreplaceanim
  *
  * @param int $nbreplaceanim
  *
  */
  public function setNbreplaceanim(int $nbreplaceanim)
  {
    $this->nbreplaceanim = intval($nbreplaceanim);
  }

  /**
  * Get the value of Descriptanim
  *
  * @return string
  */
  public function getDescriptanim()
  {
    return $this->descriptanim;
  }

  /**
  * Set the value of Descriptanim
  *
  * @param string $descriptanim
  *
  */
  public function setDescriptanim(string $descriptanim)
  {
    $this->descriptanim = $descriptanim;
  }

  /**
  * Get the value of Commentanim
  *
  * @return string
  */
  public function getCommentanim()
  {
    return $this->commentanim;
  }

  /**
  * Set the value of Commentanim
  *
  * @param string $commentanim
  *
  */
  public function setCommentanim(string $commentanim)
  {
    $this->commentanim = $commentanim;
  }

  /**
  * Get the value of Nomtypeanim
  *
  * @return string 
  */
  public function getNomtypeanim()
  {
    return $this->nomtypeanim;
  }

  /**
  * Set the value of Nomtypeanim
  *
  * @param string $nomtypeanim
  *
  */
  public function setNomtypeanim(string $nomtypeanim)
  {
    $this->nomtypeanim = $nomtypeanim;
  }

  /**
  * Get the value of Places Restantes
  *
  * @return int
  */
  public function getPlaces_restantes()
  {
    return intval($this->places_restantes);
  }

  /**
  * Set the value of Places Restantes
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
