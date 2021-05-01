<?php
require_once("class/datas/Database.php");
require_once("Animation.php");
require_once("sqlRequests.php");

class ORMAnimation extends Database {
    
  /**
  * get all animations
  * @return array[Animation] an array contain Animation
  */
  public function getAll() {
    global $getAll;
    global $getAllValides;

    if(Session::get('typeprofil') == 'EN' || Session::get('typeprofil') == 'AM') {
      $animations = self::select($getAll, [], 'Animation');
    } else {
      $dtFinSej = Session::get('datefinsejour');
      $dtDebSej = Session::get('datedebsejour');

      $dateNaiss = new DateTime(Session::get('datenaiscompte'));
      $dateNow = new DateTime(date("Y-m-d"));

      $ageUser = $dateNow->diff($dateNaiss);
      $animations = self::select($getAllValides, [$ageUser->y], 'Animation');
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

    return self::select($getAnimation, [$codeAnimation], 'Animation', 1);
  }

  /**
  * get all codes type animation
  * @return array an array contains all code type animations
  */
  public function getCodesTypeAnimations() {
    global $getCodesTypeAnim;

    $pre_datas = self::select($getCodesTypeAnim, [], 'Animation');
    $datas = [];
    foreach ($pre_datas as $data) {
      $datas[] = $data->getCodetypeanim();
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

    if(self::insert($addAnimation, $data) == 1)
      return true;

    return false;
  }

  /**
  * Verify if an animation is valid (not exist in database yet)
  * @param  string  $codeAnim an animation code
  * @return bool true if can select animations, false also
  */
  public function isValid($codeAnim) {
    global $getCommonAnimations;

    $data = self::select($getCommonAnimations, [$codeAnim], 'Animation');

    if(!isset($data))
      return true;

    return false;
  }
}

?>