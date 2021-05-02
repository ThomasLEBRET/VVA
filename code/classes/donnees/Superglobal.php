<?php

require_once("InfoSuperglobal.php");

/**
 * Class to get superglobal variables ($_GET and $_POST actually)
 */
class Superglobal {

    private $get;
    private $post;

    /**
     * default constructor
     */
    public function __construct() {
      // Add two Parameters (GET and POST)
        $this->get = new InfoSuperglobal($_GET);
        $this->post = new InfoSuperglobal($_POST);
    }

    /**
     * Retourne le contenu de la variable super globale $_GET encapsulé dans l'objet Parameters
     * @return array le tableau associatif $_GET dans l'objet Parameters
     */
    public function getGet() {
        return $this->get;
   }

   /**
    * Retourne le contenu de la variable super globale $_POST encapsulé dans l'objet Parameters
    * @return array le tableau associatif $_POST dans l'objet Parameters
    */
    public function getPost() {
       return $this->post;
   }
}
