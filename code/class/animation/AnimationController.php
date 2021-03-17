<?php

require_once("Animation.php");

/**
 * Class to control Animation datas
 */
class AnimationController extends Animation {

  private $animation;

  /**
   * default constructor
   */
  public function __construct() {
    $this->animation = new Animation();
  }

  /**
   * return all animations for Encadrant
   * @return void
   */
  public function allAnimations() {
    $animations = $this->animation->getAll();
    if(Session::get('typeprofil') == 'EN') {
      $codesTypeAnimation = $this->animation->getCodesTypeAnimations();
    }
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
      if($allIsset && $this->animation->isValid($post->get('codeanim'))) {
        if($this->animation->add($post)) {
          $addSuccess = "L'animation a bien été ajoutée";
          $animations = $this->animation->getAll();
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
