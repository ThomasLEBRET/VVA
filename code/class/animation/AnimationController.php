<?php

require_once("Animation.php");

class AnimationController extends Animation {

  private $animation;

  public function __construct() {
    $this->animation = new Animation();
  }

  public function __get($key) {
    $method = 'get'.ucfirst($key);
    $this->$key = $this->$method();
    return $this->$key;
  }

  public function allAnimations() {
    $animations = $this->animation->getAnimationsValides();
    require_once("view/animation/allAnimations.php");
  }
}

?>
