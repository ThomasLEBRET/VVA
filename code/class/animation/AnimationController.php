<?php

require_once("Animation.php");

class AnimationController extends Animation {

  private $animation;

  public function __construct() {
    $this->animation = new Animation();
  }

  public function allAnimations() {
    $animations = $this->animation->getAll();
    require_once("view/animation/allAnimations.php");
  }
}

?>
