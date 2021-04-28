<?php

/**
 * Class to manage Error and send view in a controller
 */
class ErrorController {
  private $debug;

  public function __construct() {
    $this->debug = true;
  }

  /**
   * Return error not found view
   * @return void
   */
  public function errorNotFound() {
    require_once 'view/errors/404.php';
  }

  /**
   * Return error server view (when SQL request fail for example)
   * @return void
   */
  public function errorServer($e) {
    if(!$this->debug)
      $e = "";
    require_once 'view/errors/500.php';
  }
}
