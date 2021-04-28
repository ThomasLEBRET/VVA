<?php

require_once("class/datas/Database.php");
include("sqlRequests.php");

/**
* Class to manage animations objects
*/
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

  /**
  * default constructor
  */
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


  /**
  * Get the value of Class to manage animations objects
  *
  * @return mixed
  */
  public function getCodeanim()
  {
    return $this->codeanim;
  }

  /**
  * Set the value of Class to manage animations objects
  *
  * @param mixed $codeanim
  *
  * @return self
  */
  public function setCodeanim($codeanim)
  {
    $this->codeanim = $codeanim;

    return $this;
  }

  /**
  * Get the value of Codetypeanim
  *
  * @return mixed
  */
  public function getCodetypeanim()
  {
    return $this->codetypeanim;
  }

  /**
  * Set the value of Codetypeanim
  *
  * @param mixed $codetypeanim
  *
  * @return self
  */
  public function setCodetypeanim($codetypeanim)
  {
    $this->codetypeanim = $codetypeanim;

    return $this;
  }

  /**
  * Get the value of Nomanim
  *
  * @return mixed
  */
  public function getNomanim()
  {
    return $this->nomanim;
  }

  /**
  * Set the value of Nomanim
  *
  * @param mixed $nomanim
  *
  * @return self
  */
  public function setNomanim($nomanim)
  {
    $this->nomanim = $nomanim;

    return $this;
  }

  /**
  * Get the value of Datecreationanim
  *
  * @return mixed
  */
  public function getDatecreationanim()
  {
    return $this->datecreationanim;
  }

  /**
  * Set the value of Datecreationanim
  *
  * @param mixed $datecreationanim
  *
  * @return self
  */
  public function setDatecreationanim($datecreationanim)
  {
    $this->datecreationanim = date('d/m-Y', strtotime($datecreationanim));

    return $this;
  }

  /**
  * Get the value of Datevaliditeanim
  *
  * @return mixed
  */
  public function getDatevaliditeanim()
  {
    return $this->datevaliditeanim;
  }

  /**
  * Set the value of Datevaliditeanim
  *
  * @param mixed $datevaliditeanim
  *
  * @return self
  */
  public function setDatevaliditeanim($datevaliditeanim)
  {
    $this->datevaliditeanim = date('d/m-Y', strtotime($datevaliditeanim));;

    return $this;
  }

  /**
  * Get the value of Dureeanim
  *
  * @return mixed
  */
  public function getDureeanim()
  {
    return $this->dureeanim;
  }

  /**
  * Set the value of Dureeanim
  *
  * @param mixed $dureeanim
  *
  * @return self
  */
  public function setDureeanim($dureeanim)
  {
    $this->dureeanim = $dureeanim;

    return $this;
  }

  /**
  * Get the value of Limiteage
  *
  * @return mixed
  */
  public function getLimiteage()
  {
    return $this->limiteage;
  }

  /**
  * Set the value of Limiteage
  *
  * @param mixed $limiteage
  *
  * @return self
  */
  public function setLimiteage($limiteage)
  {
    $this->limiteage = $limiteage;

    return $this;
  }

  /**
  * Get the value of Tarifanim
  *
  * @return mixed
  */
  public function getTarifanim()
  {
    return $this->tarifanim;
  }

  /**
  * Set the value of Tarifanim
  *
  * @param mixed $tarifanim
  *
  * @return self
  */
  public function setTarifanim($tarifanim)
  {
    $this->tarifanim = $tarifanim;

    return $this;
  }

  /**
  * Get the value of Nbreplaceanim
  *
  * @return mixed
  */
  public function getNbreplaceanim()
  {
    return $this->nbreplaceanim;
  }

  /**
  * Set the value of Nbreplaceanim
  *
  * @param mixed $nbreplaceanim
  *
  * @return self
  */
  public function setNbreplaceanim($nbreplaceanim)
  {
    $this->nbreplaceanim = $nbreplaceanim;

    return $this;
  }

  /**
  * Get the value of Descriptanim
  *
  * @return mixed
  */
  public function getDescriptanim()
  {
    return $this->descriptanim;
  }

  /**
  * Set the value of Descriptanim
  *
  * @param mixed $descriptanim
  *
  * @return self
  */
  public function setDescriptanim($descriptanim)
  {
    $this->descriptanim = $descriptanim;

    return $this;
  }

  /**
  * Get the value of Commentanim
  *
  * @return mixed
  */
  public function getCommentanim()
  {
    return $this->commentanim;
  }

  /**
  * Set the value of Commentanim
  *
  * @param mixed $commentanim
  *
  * @return self
  */
  public function setCommentanim($commentanim)
  {
    $this->commentanim = $commentanim;

    return $this;
  }

  /**
  * Get the value of Nomtypeanim
  *
  * @return mixed
  */
  public function getNomtypeanim()
  {
    return $this->nomtypeanim;
  }

  /**
  * Set the value of Nomtypeanim
  *
  * @param mixed $nomtypeanim
  *
  * @return self
  */
  public function setNomtypeanim($nomtypeanim)
  {
    $this->nomtypeanim = $nomtypeanim;

    return $this;
  }

  /**
  * Get the value of Places Restantes
  *
  * @return mixed
  */
  public function getPlaces_restantes()
  {
    return $this->places_restantes;
  }

  /**
  * Set the value of Places Restantes
  *
  * @param mixed $places_restantes
  *
  * @return self
  */
  public function setPlaces_restantes($places_restantes)
  {
    $this->places_restantes = $places_restantes;

    return $this;
  }

  /**
  * get all animations
  * @return array[Animation] an array contain Animation
  */
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
      $animations = $this->select($getAllValides, [$ageUser->y, $dtDebSej, $dtFinSej], 'Animation');
    }
    return $animations;
  }

  /**
  * get an animation with his PK
  * @param  string $codeAnimation a animation code
  * @return Animation  an animation object
  */
  public function get($codeAnimation) {
    global $getAnimation;

    return $this->select($getAnimation, [$codeAnimation], 'Animation', 1);
  }

  /**
  * get all codes type animation
  * @return array an array contains all code type animations
  */
  public function getCodesTypeAnimations() {
    global $getCodesTypeAnim;
    $pre_datas = $this->select($getCodesTypeAnim, [], 'Animation');
    $datas = [];
    foreach ($pre_datas as $data) {
      $datas[] = $data->codetypeanim;
    }
    return $datas;
  }

  /**
  * add an animation
  * @param Parameters $post a $_POST Parameters
  */
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

  /**
  * Verify if an animation is valid (not exist in database yet)
  * @param  string  $codeAnim an animation code
  * @return bool true if can select animations, false also
  */
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
