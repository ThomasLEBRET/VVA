<?php
class Database
{
  private $host;
  private $dbname;
  private $user;
  private $password = "";
  private $connection;

  public function __construct($host = "localhost", $dbname = "gatci", $user = "root", $password = "") {
    $this->host = $host;
    $this->dbname = $dbname;
    $this->user = $user;
    $this->password = $password;
  }

  public function getConnection() {
    if($this->connection === null) {
      $connection = new PDO('mysql:host=localhost;dbname=gatci;charset=utf8', 'root', '');
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->connection = $connection;
    }
    return $this->connection;
  }

  public function query($stmt, $class_name) {
    $req = $this->getConnection()->query($stmt);
    $datas = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
    return $datas;
  }

  public function prepare($stmt, $attr, $class_name, $one = false) {
    $req = $this->getConnection()->prepare($stmt);
    $req->execute($attr);
    $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
    if($one) {
      $datas = $req->fetch();
    } else {
      $datas = $req->fetchAll();
    }
    return $datas;
  }
}
?>
