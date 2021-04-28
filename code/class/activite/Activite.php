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
   * function to get an activity with his activity code
   * @param  int $noact the number of activity
   * @return Activite  an activity object
   */
  public function get($noact) {
    global $getActivite;

    return $this->select($getActivite, [$noact], 'Activite', 1);
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
   * verify if a user is registered for an activity
   * @param int $noact a PK activity number
   */
  public function isAlreadyRegistered($noact) {
    global $isRegisteredUser;

    $user = Session::get('user');
    $activite = $this->select($isRegisteredUser, [$noact, $user], 'Activite');
    if($this->select($isRegisteredUser, [$noact, $user], 'Activite') == NULL)  {
      return false;
    } else {
      return true;
    }
  }

  public function inscription($noact) {
    global $addInscriptionInActivity;

    $user = Session::get('user');
    $this->insert($addInscriptionInActivity,[$user, $noact]);
  }

  public function cancel($noact) {
    global $cancelActivity;

    $this->update($cancelActivity, [$noact]);
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
   * Get the value of Class to manage activity object
   *
   * @return mixed
   */
  public function getCodeanim()
  {
      return $this->codeanim;
  }

  /**
   * Set the value of codeanim
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
   * Get the value of Codeetatact
   *
   * @return mixed
   */
  public function getCodeetatact()
  {
      return $this->codeetatact;
  }

  /**
   * Set the value of Codeetatact
   *
   * @param mixed $codeetatact
   *
   * @return self
   */
  public function setCodeetatact($codeetatact)
  {
      $this->codeetatact = $codeetatact;

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
        $this->dateact = date('d/m/Y', strtotime($dateact));

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
     * Get the value of Prixact
     *
     * @return mixed
     */
    public function getPrixact()
    {
        return $this->prixact;
    }

    /**
     * Set the value of Prixact
     *
     * @param mixed $getPrixact
     *
     * @return self
     */
    public function setPrixact($prixact)
    {
        $this->prixact = $prixact;

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
     * Get the value of Hrfinact
     *
     * @return mixed
     */
    public function getHrfinact()
    {
        return $this->hrfinact;
    }

    /**
     * Set the value of Hrfinact
     *
     * @param mixed $hrfinact
     *
     * @return self
     */
    public function setHrfinact($hrfinact)
    {
        $this->hrfinact = $hrfinact;

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
        $this->dateannuleact = date('d/m/Y', strtotime($dateannuleact));

        return $this;
    }

    /**
     * Get the value of Prenomresp
     *
     * @return mixed
     */
    public function getPrenomresp()
    {
        return $this->prenomresp;
    }

    /**
     * Set the value of Prenomresp
     *
     * @param mixed $prenomresp
     *
     * @return self
     */
    public function setPrenomresp($prenomresp)
    {
        $this->prenomresp = $prenomresp;

        return $this;
    }

    /**
     * Get the value of Prenomresp
     *
     * @return mixed
     */
    public function getNomresp()
    {
        return $this->nomresp;
    }

    /**
     * Set the value of Nomresp
     *
     * @param mixed $nomresp
     *
     * @return self
     */
    public function setNomresp($nomresp)
    {
        $this->nomresp = $nomresp;

        return $this;
    }

}

?>
