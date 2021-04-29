<?php

/**
 * Class to manage connexion and requests with the database
 */
class Database
{
  /**
   * get connexion into the database class
   * @return PDO a PDO object
   */
  private function getConnection() {
    if($this->connection === null) {
      $connection = new PDO('mysql:host=db;dbname=gatci;charset=utf8', 'root', 'root');
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->connection = $connection;
    }
    return $this->connection;
  }

  /**
   * function to prepare request
   * @param  string $stmt an sql request
   * @param  array $attr an array with parameters for sql request
   * @return PDOStatement  a PDOStatement object with query SQL string
   */
  private function prepare($stmt, $attr) {
    $req = $this->getConnection()->prepare($stmt);
    $req->execute($attr);
    return $req;
  }

  /**
   * function permitted to hydate object with setter function associated in object model
   * @param  array  $datas  an array returned by sql request
   * @param  __CLASS_NAME__ $object a class name object
   * @return object instance of $object
   */
  private function hydrate(array $datas, $object) {
    $instance = new $object();
    foreach($datas as $key =>$val) {
        $method ='set'.ucfirst(strtolower($key));
        if(method_exists($instance, $method)) {
            $instance->$method($val);
        }
    }
    return $instance;
  }

  /**
   * function to select data with sql request
   * @param  string  $stmt       an SQL request
   * @param  array  $attr       an array $_POST(Parameters)
   * @param  __CLASS_NAME__  $class_name the name of object class
   * @param  bool $one       number ofdata returned (false by default to return with fetchAll). If true, he return just one data wth a fetch request
   * @return object          the hydrated object $class_name
   */
  public function select($stmt, $attr, $class_name, $one = false) {
    $req = $this->prepare($stmt, $attr);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    if($one) {
      $array = (array)$req->fetch();
      $objects = $this->hydrate($array, $class_name);
    } else {
      $objs = $req->fetchAll();
      foreach ($objs as $o) {
        $objects[] = $this->hydrate($o, $class_name);
      }
    }
    return $objects;
  }

  public function count($stmt, $attr) {
    $req = $this->prepare($stmt, $attr);
    return $req->fetchColumn();
  }

  /**
   * request to insert data into gatci database
   * @param  string $stmt an sql request
   * @param  array $attr a list of attributes for SQL request
   * @return void
   */
  public function insert($stmt, $attr) {
    $req = $this->prepare($stmt, $attr);
  }

  /**
   * request to update data into gatci database
   * @param  string $stmt an sql request
   * @param  array $attr a list of attributes for SQL request
   * @return void
   */
  public function update($stmt, $attr) {
    $req = $this->prepare($stmt, $attr);
  }
}
?>
