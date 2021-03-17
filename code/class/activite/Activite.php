<?php
require_once("class/datas/Database.php");
include("sqlRequests.php");

require_once("class/animation/Animation.php");

/**
* Class to manage activity object
*/
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

  /**
  * default constructor
  */
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


  /**
   * get all activity for an animation
   * @param  string $codeAnimation an animation code
   * @return array  an array contain Activite objects
   */
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

  /**
   * get all code activity state
   * @return array activity code exists
   */
  public function getAllCodeEtatAct() {
    global $getAllCodeEtatAct;

    $pre_datas = $this->select($getAllCodeEtatAct, [], 'Activite');
    $datas = [];
    foreach ($pre_datas as $data) {
      $datas[] = $data->codeetatact;
    }
    return $datas;
  }

  /**
   * Add an activity
   * @param Animation $animation an animation object
   * @param Parameters $post      the array data post $_POST superglobal variables
   */
  public function add($animation, $post) {
    global $addActivite;

    $codeanim = $animation->getCodeanim();
    $codeetatact = $post->get('codeetatact');
    $dateact = $post->get('dateact');
    $hrrdvact = $post->get('hrrdvact');
    $prixact = $post->get('prixact');
    $hrdebutact = $post->get('hrdebutact');
    $hrfinact = date($post->get('hrrdvact'), strtotime('+'.$animation->getDureeanim().' day'));
    $nomresp = Session::get('nomcompte');
    $prenomresp = Session::get('prenomcompte');

    $this->insert($addActivite,
    [
      $codeanim,
      $codeetatact,
      $dateact,
      $hrrdvact,
      $prixact,
      $hrdebutact,
      $hrfinact,
      $nomresp,
      $prenomresp
    ]);
  }

  /**
   * Verify if activity we are insert already exist in the same day
   * @param  string $codeanim an animation code
   * @param  date $dateact  a date for insert activity
   * @return bool  true if not exist false also
   */
  public function noExistActiviteInSameDayForAnimation($codeanim, $dateact) {
    global $countActiviteInSameDayForAnimation;

    if($this->select($countActiviteInSameDayForAnimation, [$codeanim, $dateact], 'Activite') === NULL) {
      return true;
    } else {
      return false;
    }
  }


  /**
  * Get the value of Class to manage activity object
  *
  * @return mixed
  */
  public function getNoact()
  {
    return $this->noact;
  }

  /**
  * Set the value of Class to manage activity object
  *
  * @param mixed $noact
  *
  * @return self
  */
  public function setNoact($noact)
  {
    $this->noact = $noact;

    return $this;
  }

  /**
  * Get the value of Dateact
  *
  * @return mixed
  */
  public function getDateact()
  {
    return $this->dateact;
  }

  /**
  * Set the value of Dateact
  *
  * @param mixed $dateact
  *
  * @return self
  */
  public function setDateact($dateact)
  {
    $this->dateact = $dateact;

    return $this;
  }

  /**
  * Get the value of Hrrdvact
  *
  * @return mixed
  */
  public function getHrrdvact()
  {
    return $this->hrrdvact;
  }

  /**
  * Set the value of Hrrdvact
  *
  * @param mixed $hrrdvact
  *
  * @return self
  */
  public function setHrrdvact($hrrdvact)
  {
    $this->hrrdvact = $hrrdvact;

    return $this;
  }

  /**
  * Get the value of Hrdebutact
  *
  * @return mixed
  */
  public function getHrdebutact()
  {
    return $this->hrdebutact;
  }

  /**
  * Set the value of Hrdebutact
  *
  * @param mixed $hrdebutact
  *
  * @return self
  */
  public function setHrdebutact($hrdebutact)
  {
    $this->hrdebutact = $hrdebutact;

    return $this;
  }

  /**
  * Get the value of Dateannuleact
  *
  * @return mixed
  */
  public function getDateannuleact()
  {
    return $this->dateannuleact;
  }

  /**
  * Set the value of Dateannuleact
  *
  * @param mixed $dateannuleact
  *
  * @return self
  */
  public function setDateannuleact($dateannuleact)
  {
    $this->dateannuleact = $dateannuleact;

    return $this;
  }

}

?>
