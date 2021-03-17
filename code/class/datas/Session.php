<?php

/**
 * static class to manage $_SESSION
 */
class Session
{
  private $session;

  /**
   * default constructor
   * @param array $session the $_SESSION value
   */
  public function __construct($session) {
    $this->session = $session;
  }

  /**
   * start a session if not started the first time
   * @return void
   */
  public static function start() {
    if(!isset($_SESSION)) {
      session_start();
    }
  }

  /**
   * set a new value on a Session
   * @param string $name  the key name
   * @param string $value the value associate to the key
   */
  public static function set($name, $value) {
    $_SESSION[$name] = $value;
  }

  /**
   * get a value by a key name
   * @param  string $name a key name
   * @return value  the value associate to the key
   */
  public static function get($name) {
    if(isset($_SESSION[$name])) {
      return $_SESSION[$name];
    }
  }

  /**
   * unset a case of Session array
   * @param  string $name a key name
   * @return voir   destroy value associated on the key name
   */
  public static function remove($name) {
    unset($_SESSION[$name]);
  }

  /**
   * destroy session
   * @return void
   */
  public function stop() {
    session_destroy();
  }

}
?>
