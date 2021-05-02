<?php

/**
 * Class to manage superglobal value on the Request class
 */
class InfoSuperglobal {

    private $superglobal;

    /**
     * default constructor
     * @param  $parameter
     */
    public function __construct($superglobal) {
        $this->superglobal = $superglobal;
    }

    /**
     * Return array associatedin the superglobal variable
     * @return array the associative array of the data of the super global variable processed by the superglobals object
     */
    public function getArray() {
      $tab = array();
      foreach ($this->superglobal as $key => $value) {
        $tab[$key] = $value;
      }
      return $tab;
    }

    /**
     * Retrieves the value of part of a parameter according to its key (associative array)
     * @param  string $name the key associated with a value of the associative array of the parameter
     * @return sometype the value associated with the key of the associative array of the parameter

     */
    public function get($name) {
        if(isset($this->superglobal[$name]))
            return $this->superglobal[$name];
    }

    /**
     * Replace the unset procedure for Parameter object
     * @param  string $name la clé associée à une valeur du tableau associatif du paramètre
     * @return void
     */
    public function destroy($name) {
      if(isset($this->superglobal[$name])) {
        unset($this->superglobal[$name]);
      }
    }

    /**
     * Changes the value of part of the parameter according to its associated key
     * @param string $name  a key associated with the value of the parameter
     * @param sometype $value a value which will replace the initial value which is associated with the key of the associative array
     */
    public function set($name, $value) {
        $this->superglobal[$name] = $value;
    }
}
