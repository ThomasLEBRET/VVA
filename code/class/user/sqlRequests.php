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
  FROM activite
  WHERE NOMRESP = ?
  AND PRENOMRESP = ?
  ";

  
  $activitesSousEncadrant = 
  "
  SELECT *
  FROM activite 
  WHERE NOMRESP = ?
  AND PRENOMRESP = ?
  AND DATEACT >= NOW()
  ";

  $activitesValidesVacancier =
  "
  SELECT A.*
  FROM activite A, inscription I
  WHERE A.NOACT = I.NOACT
  AND I.USER = ?
  AND I.DATEANNULE IS NULL
  "

?>
