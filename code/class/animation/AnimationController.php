<?php

require_once("Animation.php");

class AnimationController extends Animation {

  private $animation;

  public function __construct() {
    $this->animation = new Animation();
  }

  public function allAnimations() {
    $animations = $this->animation->getAll();
    if(Session::get('TYPEPROFIL') == 'EN') {
      $codesTypeAnimation = $this->animation->getCodesTypeAnimations();
    }
    require_once("view/animation/allAnimations.php");
  }

  public function addAnimation($post) {
    if(Session::get('TYPEPROFIL') == 'EN') {
      $allIsset = true;
      foreach ($post->getArray() as $key => $value) {
        if(empty($value)) {
          $allIsset = false;
        }
      }
      if($allIsset) {
        if($this->animation->add($post)) {
          $addSuccess = "L'animation a bien été ajoutée";
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
