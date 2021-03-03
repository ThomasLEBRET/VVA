<?php

require_once("class/datas/Database.php");
include("sqlRequests.php");

class Animation extends Database {

  public function getAnimationsValides() {

    global $getAnimationsValides;
    $animations = $this->prepare($getAnimationsValides, [], 'Animation', 0);
    return $animations;
    
  }

}

?>
