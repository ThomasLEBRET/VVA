<?php

require_once("Animation.php");
require_once("ORMAnimation.php");

/**
 * Class to control Animation datas
 */
class AnimationController extends Animation {

  /**
   * default constructor
   */
  public function __construct() {

  }

  /**
   * return all animations for Encadrant
   * @return void
   */
  public function allAnimations() {
    $animations = ORMAnimation::getAll();
    if(Session::get('typeprofil') == 'EN' || Session::get('typeprofil') == 'AM') {
      $codesTypeAnimation = ORMAnimation::getCodesTypeAnimations();
    }
    if($animations == NULL)
      $animations = [];
    require_once("view/animation/allAnimations.php");
  }

  /**
   * route to add an animation after posting data in a form
   * @param Parameters $post a $_POST Parameters
   */
  public function addAnimation($post) {
    if(Session::get('typeprofil') == 'EN') {
      $allIsset = true;
      foreach ($post->getArray() as $key => $value) {
        if(empty($value)) {
          $allIsset = false;
        }
      }
      if($allIsset && ORMAnimation::isValid($post->get('codeanim'))) {
        if(ORMAnimation::add($post)) {
          $addSuccess = "L'animation a bien été ajoutée";
          $animations = ORMAnimation::getAll();
          require_once("view/animation/allAnimations.php");
        } else {
          require_once("view/animation/error/errorAdd.php");
        }
      } else {
        require_once("view/animation/error/errorAdd.php");
      }
    } else {
      require_once("view/animation/error/errorUser.php");
    }
  }

}

?>
