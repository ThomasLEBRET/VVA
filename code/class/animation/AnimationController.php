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
    var_dump($post);
    if(Session::get('typeprofil') == 'EN') {
      $allIsset = true;
      foreach ($post->getArray() as $key => $value) {
        if(empty($value)) {
          $allIsset = false;
        }
      }
      if($allIsset && !ORMAnimation::isValid($post->get('codeanim'))) {
        if($post->get('dureeanim') > 0 && $post->get('limiteage') >= 0 && $post->get('nbreplaceanim') > 0) {
          if(ORMAnimation::add($post)) {
            $addSuccess = "L'animation a bien été ajoutée";
            $animations = ORMAnimation::getAll();
            header('Location: index.php?page=animation');
          } else {
            require_once("view/animation/error/errorAdd.php");
          }
        } else {
          echo "Vérifiez vos informations svp";
        }
      } else {
        require_once("view/animation/error/errorAdd.php");
      }
    } else {
      require_once("view/animation/error/errorUser.php");
    }
  }

  public function trySeeUpdateAnimation($get) {
    if(Session::get('typeprofil') == 'EN') {
      $codesTypeAnimation = ORMAnimation::getCodesTypeAnimations();

      $animation = ORMAnimation::get($get->get('codeAnimation'));
      if($animation->getCodeanim() != "null") {
        require_once("view/animation/form/formUpdateAnimation.php");
      } else {
        echo "L'activité n'existe pas !";
      }
    } else {
      echo "Not authorized user !";
    }
  }

  public function updateAnimation($post) {
    if(Session::get('typeprofil') == 'EN') {
      $allIsset = true;
      foreach ($post->getArray() as $key => $value) {
        if(empty($value)) {
          $allIsset = false;
        }
      }
      if($allIsset && ORMAnimation::isValid($post->get('codeanim'))) {
        if($post->get('dureeanim') > 0 && $post->get('limiteage') >= 0 && $post->get('nbreplaceanim') > 0) {
          if(ORMAnimation::updateAnim($post)) {
            echo "L'animation a été mise à jour";
          } else {
            echo "L'animation n'a pas pu être mise à jour";
          }
        } else {
          echo "Informations non valides !";
        }
      } else {
        echo "Veuillez remplir toutes les données svp";
      }
    } else {
      echo "Not authorized user !";
    }
  }

}

?>
