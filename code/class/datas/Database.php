<?php
class Database
{

  public function __construct($host = "db", $dbname = "gatci", $user = "root", $password = "root") {
    $this->host = $host;
    $this->dbname = $dbname;
    $this->user = $user;
    $this->password = $password;
  }

  public function getConnection() {
    if($this->connection === null) {
      $connection = new PDO('mysql:host=db;dbname=gatci;charset=utf8', 'root', 'root');
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->connection = $connection;
    }
    return $this->connection;
  }

  private function prepare($stmt, $attr) {
    $req = $this->getConnection()->prepare($stmt);
    $req->execute($attr);
    return $req;
  }

  public function hydrate(array $datas, $object) {
    $instance = new $object();
    foreach($datas as $key =>$val) {
        $method ='set'.ucfirst(strtolower($key));
        if(method_exists($instance, $method)) {
            $instance->$method($val);
        }
    }
    return $instance;
  }

  public function select($stmt, $attr, $class_name, $one = false) {
    $req = $this->prepare($stmt, $attr);
    //$req->debugDumpParams();
    $req->setFetchMode(PDO::FETCH_ASSOC);
    if($one) {
      $array = $req->fetch();
      $objects = $this->hydrate($array, $class_name);
    } else {
      $objs = $req->fetchAll();
      foreach ($objs as $o) {
        $objects[] = $this->hydrate($o, $class_name);
      }
    }
    return $objects;
  }

  public function insert($stmt, $attr) {
    $req = $this->prepare($stmt, $attr);
    //$req->debugDumpParams();
  }
}
?>
