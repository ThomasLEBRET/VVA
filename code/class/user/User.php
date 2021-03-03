<?php

require_once("class/datas/Database.php");

class User extends Database {

  public function __get($key) {
    $method = 'get'.ucfirst($key);
    $this->$key = $this->$method();
    return $this->$key;
  }

  public function connexion($params) {
    $login = $params->get("login");
    $password = $params->get("password");
    $sql =
    "
    SELECT *
    FROM COMPTE
    WHERE USER = ?
      AND MDP = ?
    ";
    $user = $this->prepare($sql, [$login, $password], 'User', 1);
    if(empty($user)) {
      return false;
    } else {
      foreach ($user as $key => $value) {
        Session::set($key, $value);
      }
      return true;
    }
  }

}

?>
