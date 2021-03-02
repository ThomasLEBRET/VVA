<?php
class Database
{
  private $host = "localhost";
  private $dbname = "gatci";
  private $user = "root";
  private $password = "";

  public function __construct($host, $dbname, $user, $password) {
    $this->host = $host;
    $this->dbname = $dbname;
    $this->user = $user;
    $this->password = $password;
  }

  public function getConnection() {
    if($this->pdo === null) {
      $connection = new PDO('mysql:host=localhost;dbname=gatci;charset=utf8', 'root', 'root');
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
      $datas = $req->fetch(PDO::FETCH_CLASS, $class_name);
    } else {
      $datas = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
    }
    return $datas;
  }
}
?>
