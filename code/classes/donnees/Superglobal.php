<?php

require_once("InfoSuperglobal.php");

/**
 * Classe pour gérer les variables superglobal ($_GET et $_POST actuellement)
 */
class Superglobal {

    private $get;
    private $post;

    /**
     * constructeur par défaut
     */
    public function __construct() {
      // Ajoute 2 objet InfoSuperglobal $_GET et $_POST
        $this->get = new InfoSuperglobal($_GET);
        $this->post = new InfoSuperglobal($_POST);
    }

    /**
     * Retourne le contenu de la variable super globale $_GET encapsulé dans l'objet InfoSuperglobal
     * @return array le tableau associatif $_GET dans l'objet InfoSuperglobal
     */
    public function getGet() {
        return $this->get;
   }

   /**
    * Retourne le contenu de la variable super globale $_POST encapsulé dans l'objet InfoSuperglobal
    * @return array le tableau associatif $_POST dans l'objet InfoSuperglobal
    */
    public function getPost() {
       return $this->post;
   }
}
