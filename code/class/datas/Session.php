<?php
class Session
{
  private $session;

  public function __construct($session) {
    $this->session = $session;
  }

  public static function start() {
    if(!isset($_SESSION)) {
      session_start();
    }
  }

  public static function set($name, $value) {
    $_SESSION[$name] = $value;
  }

  public static function get($name) {
    if(isset($_SESSION[$name])) {
      return $_SESSION[$name];
    }
  }

  public static function show($name) {
    if(isset($_SESSION[$name]))
    {
      $key = $this->get($name);
      $this->remove($name);
      return $key;
    }
  }

  public static function remove($name) {
    unset($_SESSION[$name]);
  }

  public function stop() {
    session_destroy();
  }

}
?>
