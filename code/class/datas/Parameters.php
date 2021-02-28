<?php

class Parameters {

    private $parameter;

    public function __construct($parameter) {
        $this->parameter = $parameter;
    }

    /**
     * Retourne l'array associé à la variable super globale
     * @return array le tableau associatif des données de la variable super globale traitée par l'objet Parameters
     */
    public function getArray() {
      $tab = array();
      foreach ($this->parameter as $key => $value) {
        $tab[$key] = $value;
      }
      return $tab;
    }

    /**
     * Récupère la valeur d'une partie d'un paramètre en fonction de sa clé (tableau associatif)
     * @param  string $name la clé associée à une valeur du tableau associatif du paramètre
     * @return sometype       la valeur associé à la clé du tableau associatif du paramètre
     */
    public function get($name) {
        if(isset($this->parameter[$name]))
            return $this->parameter[$name];
    }

    /**
     * Remplace la procédure unset pour l'objet Parameter
     * @param  string $name la clé associée à une valeur du tableau associatif du paramètre
     * @return void
     */
    public function destroy($name) {
      if(isset($this->parameter[$name])) {
        unset($this->parameter[$name]);
      }
    }

    /**
     * Change la valeur d'une partie du paramètre en fonction de sa clé associée
     * @param string $name  une clé associée à la valeur du paramètre
     * @param sometype $value une valeur qui va remplacer la valeur initiale qui est associé à la clé du tableau associatif
     */
    public function set($name, $value) {
        $this->parameter[$name] = $value;
    }
}
