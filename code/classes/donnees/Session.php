<?php

/**
 * Classe static pour gérer la variable superglobale $_SESSION
 */
class Session
{
  private $session;

  /**
   * constructeur par défaut
   * @param array La valeur de $_SESSION
   */
  public function __construct($session) {
    $this->session = $session;
  }

  /**
   * Démarre une session si elle n'est pas démarrée
   * @return void
   */
  public static function demarrer() {
    if(!isset($_SESSION)) {
      session_start();
    }
  }

  /**
   * Change une valeur dans $_SESSION 
   * @param string la clé du tableau de $_SESSION
   * @param string La valeur associée à la clé 
   * @return void
   */
  public static function set($name, $value) {
    $_SESSION[$name] = $value;
  }

  /**
   * Obtenir une valeur de $_SESSION
   * @param  string la clé du tableau associatif $_SESSION
   * @return mixed la valeur associée
   */
  public static function get($name) {
    if(isset($_SESSION[$name])) {
      return $_SESSION[$name];
    }
  }

  /**
   * Détruit une case du tableau à partir de sa clé associative
   * @param  string La clé associée à la valeur à détruire
   * @return void détruit la valeur dans la session
   */
  public static function remove($name) {
    unset($_SESSION[$name]);
  }

  /**
   * Détruit la session et l'arrête 
   * @return void
   */
  public function stop() {
    session_destroy();
  }

}
?>
