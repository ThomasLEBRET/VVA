<?php 

require_once("Activite.php");
require_once("class/datas/Database.php");
include("sqlRequests.php");

class ORMActivite extends Database {
    

  /**
   * get all activity for an animation
   * @param  string $codeAnimation an animation code
   * @return array  an array contain Activite objects
   */
  public static function getAll(string $codeAnimation) {

    global $getAllActivitesForVacancier;
    global $getAllActivitesForEncadrant;

    if(Session::get('typeprofil') == 'EN' || Session::get('typeprofil') == 'AM') {
      $activites = self::select(
        $getAllActivitesForEncadrant,
        [
          $codeAnimation
        ],
        'Activite'
      );
    } else {
      $activites = self::select(
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
  public static function get(int $noact) {
    global $getActivite;

    return self::select($getActivite, [$noact], 'Activite', 1);
  }

  /**
   * get all code activity state
   * @return array activity code exists
   */
  public static function getAllCodeEtatAct() {
    global $getAllCodeEtatAct;

    $pre_datas = self::select($getAllCodeEtatAct, [], 'Activite');
    $datas = [];
    foreach ($pre_datas as $data) {
      $datas[] = $data->getCodeetatact();
    }
    return $datas;
  }

  /**
   * Add an activity
   * @param Animation $animation an animation object
   * @param Parameters $post      the array data post $_POST superglobal variables
   */
  public static function add($animation, $post) {
    global $addActivite;
    global $cancelActivityLastInserted;

    $codeanim = $animation->getCodeanim();
    $codeetatact = $post->get('codeetatact');
    $dateact = $post->get('dateact');
    $hrrdvact = $post->get('hrrdvact');
    $prixact = $post->get('prixact');
    $hrdebutact = $post->get('hrdebutact');
    $hrfinact = date($post->get('hrrdvact'), strtotime('+'.$animation->getDureeanim().' day'));
    $nomresp = Session::get('nomcompte');
    $prenomresp = Session::get('prenomcompte');

    if(self::insert($addActivite,
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
    ])) {
      if($codeetatact == 'N') {
        if(self::update($cancelActivityLastInserted, [])) {
          return true;
        } else {
          return false;
        }
      } else {
        return true;
      }
    }
    return false;
  }

  /**
   * Verify if activity we are insert already exist in the same day
   * @param  string $codeanim an animation code
   * @param  date $dateact  a date for insert activity
   * @return bool  true if not exist false also
   */
  public static function noExistActiviteInSameDayForAnimation($codeanim, $dateact) {
    global $countActiviteInSameDayForAnimation;

    if(self::select($countActiviteInSameDayForAnimation, [$codeanim, $dateact], 'Activite') === NULL) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * verify if a user is registered for an activity
   * @param int $noact a PK activity number
   */
  public static function isAlreadyRegistered($noact) {
    global $isRegisteredUser;

    $user = Session::get('user');
    $activite = self::select($isRegisteredUser, [$noact, $user], 'Activite');
    if(self::select($isRegisteredUser, [$noact, $user], 'Activite') == NULL) 
      return false;
      
    return true;
  }

  public static function inscription($noact) {
    global $addInscriptionInActivity;

    $user = Session::get('user');
    self::insert($addInscriptionInActivity,[$user, $noact]);
  }

  public function cancel($noact) {
    global $cancelActivity;

    if(self::update($cancelActivity, [$noact])) {
      return true;
    }
    return false;
  }

      /**
   * Update an activity
   * @param Animation $animation an animation object
   * @param Parameters $post      the array data post $_POST superglobal variables
   */
  public static function updateAct($animation, $post) {
    global $updateActivite;
    global $cancelActivity;

    
    $noact = $post->get('noact');

    $codeetatact = $post->get('codeetatact');
    $prixact = $post->get('prixact');
    $dateact = $post->get('dateact');
    $hrrdvact = $post->get('hrrdvact');
    $hrdebutact = $post->get('hrdebutact');
    $hrfinact = date($post->get('hrrdvact'), strtotime('+'.$animation->getDureeanim().' day'));

    self::update($updateActivite,
    [
      $codeetatact,
      $prixact,
      $dateact,
      $hrrdvact,
      $hrdebutact,
      $hrfinact, 
      $noact
    ]);

    if($codeetatact == 'N') {
     self::update($cancelActivity, [$noact]);
    }
  }

}