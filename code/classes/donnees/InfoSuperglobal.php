<?php

/**
 * Classe static basée sur l'objet Superglobal permettant d'obtenir des informations sur ces variables là 
 */
class InfoSuperglobal {

    private $superglobal;

    /**
     * Constructeur par défaut
     * @param Superglobal un objet Superglobal
     */
    public function __construct($superglobal) {
        $this->superglobal = $superglobal;
    }

    /**
     * Retourne la variable superglobal sous forme de tableau associatif
     * @param void
     * @return array le tableau de Superglobal
     */
    public function getArray() {
      $tab = array();
      foreach ($this->superglobal as $key => $value) {
        $tab[$key] = $value;
      }
      return $tab;
    }

    /**
     * Obtient le contenu d'une case du tableau associatif en fonction d'une clé
     * @param  string la clé permettant d'accéder à la valeur du tableau
     * @return mixed la valeur 

     */
    public function get(string $name) {
        if(isset($this->superglobal[$name]))
            return $this->superglobal[$name];
    }

    /**
     * Détruit le contenu d'une variable à partir d'une clé 
     * @param  string la clé associée à une valeur du tableau associatif du paramètre
     * @return void
     */
    public function destroy($name) {
      if(isset($this->superglobal[$name])) {
        unset($this->superglobal[$name]);
      }
    }

    /**
     * Change la valeur d'une case du tableau à partir de la clé permettant d'accéder à la valeur du tableau associatif
     * @param string la clé
     * @param mixed la nouvelle valeur
     * @return void
     */
    public function set($name, $value) {
        $this->superglobal[$name] = $value;
    }
}
