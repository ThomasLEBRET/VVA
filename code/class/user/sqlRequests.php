<?php

  /**
   * sql request to select a user depending on his login USER and MDP 
   * @var string
   */
  $selectUser =
    "
    SELECT *
    FROM compte
    WHERE USER = ?
    AND MDP = ?
    ";
  
  $selectAllUsers = "SELECT * FROM compte";

  $countActivitesEncadrant = 
  "
  SELECT COUNT(*)
  FROM activite A 
  WHERE A.NOMRESP = ?
  AND A.PRENOMRESP = ?
  ";

?>
