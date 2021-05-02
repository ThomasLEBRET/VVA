<?php 

require_once("classes/donnees/Database.php");

require_once("Activite.php");

include("requetesSQL.php");

class ORMActivite extends Database {
    

  /**
   * Obtient la liste des activités en fonction du profil connecté
   * @param  string un code d'animation
   * @return array un tableau d'Animation
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
          Session::get('datedebsejour'),
          Session::get('datefinsejour')
        ],
        'Activite'
      );
    }
    return $activites;

  }

  /**
   * Obtient une Activite
   * @param  int un numéro d'activité
   * @return Activite un objet Activite
   */
  public static function get(int $noact) {
    global $getActivite;

    return self::select($getActivite, [$noact], 'Activite', 1);
  }

  /**
   * Obtient tous les codes d'activités qui existent
   * @return array le tableau des codes d'activité
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
   * Ajoute une activité
   * @param Animation un objet Animation
   * @param Superglobal le tableau $_POST encapsulé dans l'objet Superglobal
   * @return bool true si l'insertion s'est bien déroulée, false sinon
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
   * Vérifie si une activité issue de la même animation existe déjà pour la date de l'activité
   * @param  string un code d'animation
   * @param  DateTime une date d'activité
   * @return bool  true si elle n'existe pas, false sinon
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
    return self::insert($addInscriptionInActivity,[$user, $noact]);
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

    if(self::update($updateActivite,
    [
      $codeetatact,
      $prixact,
      $dateact,
      $hrrdvact,
      $hrdebutact,
      $hrfinact, 
      $noact
    ])) {
      if($codeetatact == 'N') {
        return self::update($cancelActivity, [$noact]);
       } else {
        return true;
       }
    }
    return false;
  }

}