<?php

/**
 * Classe static permettant de traiter les interactions entre le site et la base de données
 */
class Database
{
  // L'objet static de connection défini à null par défaut
  private static $connection = null;
  /**
   * Fonction privée permettant d'opérer une connection à la base de données
   * @return PDO a PDO object
   */
  private function getConnection() {
    if(self::$connection === null) {
      $connection = new PDO('mysql:host=db;dbname=gatci;charset=utf8', 'root', 'root');
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      self::$connection = $connection;
    }
    return self::$connection;
  }

  /**
   * Fonction privée permettant de prépare une requête, l'exécute et retourne le résultat 
   * @param  string une requête SQL
   * @param  array un tableau de valeurs défini pour la requête SQL 
   * @return PDOStatement l'objet PDOStatement une fois le traitement de la requête effectué
   */
  private function prepare($stmt, $attr) {
    $req = self::getConnection()->prepare($stmt);
    $req->execute($attr);
    return $req;
  }

  /**
   * Fonction privée permettant la construction d'objet par rapport à un nom de classe et un tableau de valeurs
   * @param  array un tableau de valeurs
   * @param  __CLASS_NAME__ un nom de classe Object
   * @return object une instance hydratée d'un objet 
   */
  private function hydrate(array $datas, $object) {
    $instance = new $object();
    foreach($datas as $key =>$val) {
        $method ='set'.ucfirst(strtolower($key));
        if(method_exists($instance, $method)) {
            $instance->$method($val);
            if($object == 'Utilisateur' && count($_SESSION) < count($datas)) {
              Session::set(strtolower($key), $val);
            }
        }
    }
    return $instance;
  }

  /**
   * Fonction permettant de traiter les requêtes SELECT en retournant un ou plusieurs objets
   * @param  string une requête SQL
   * @param  array un tableau de valeurs pour la requête SQL
   * @param  __CLASS_NAME__  un nom de classe pour construire le(s) objet(s)
   * @param  bool un booléen définissant si le SELECT renvoi 1 ou plusieurs valeurs 
   * @return object un/des objet(s) hydraté(s) sous forme d'objet instancié par rapport au nom de la classe ou sous forme de tableau d'objets de la classe passée en paramètre
   */
  public static function select($stmt, $attr, $class_name, $one = false) {
    $req = self::prepare($stmt, $attr);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    if($one) {
      $array = (array)$req->fetch();
      $objects = self::hydrate($array, $class_name);
    } else {
      $objs = $req->fetchAll();
      foreach ($objs as $o) {
        $objects[] = self::hydrate($o, $class_name);
      }
    }
    return $objects;
  }

  /**
   * Fonction permettant de récupérer la première colonne d'une requête SQL (plus pratique pour les requêtes avec uniquement un Count(*) dans le SELECT)
   * @param string une requête SQL
   * @param array un tableau d'attributs pour la requête SQL
   * @return int la valeur du COUNT de la requête SQL transmi dans l'objet PDOStatement
   */
  public static function count($stmt, $attr) {
    $req = self::prepare($stmt, $attr);
    return $req->fetchColumn();
  }

  /**
   * Fonction traitant les requêtes SQL INSERT 
   * @param string une requête SQL
   * @param array un tableau d'attributs pour la requête SQL
   * @return int 1 (true) si la requête a mit à jour 1 résultat, 0 (false) sinon
   */
  public static function insert($stmt, $attr) {
    $req = self::prepare($stmt, $attr);
    return $req->rowCount();
  }

  /**
   * Fonction traitant les requêtes SQL UPDATE 
   * @param string une requête SQL
   * @param array un tableau d'attributs pour la requête SQL
   * @return int 1 (true) si la requête a mit à jour 1 résultat, 0 (false) sinon
   */
  public static function update($stmt, $attr) {
    $req = self::prepare($stmt, $attr);
    return $req->rowCount();
  }
}
?>
