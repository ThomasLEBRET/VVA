<?php

  /**
   * Sélectionne un utilisateur en fonction de sa clé primaire et de son mot de passe
   */
  $selectUser =
    "
    SELECT *
    FROM compte
    WHERE USER = ?
    AND MDP = ?
    ";
  /**
   * Sélectionne la tamble compte
   */
  $selectAllUsers = "SELECT * FROM compte";

  $countActivitesEncadrant = 
  "
  SELECT COUNT(*)
  FROM activite
  WHERE NOMRESP = ?
  AND PRENOMRESP = ?
  ";
  
  /**
   * Sélectionne les activités à la charge de l'encadrant avec une date d'activité supérieur ou égale à celle d'aujourd'hui (pour ne pas qu'il se trompe avec les activités passées)
   */
  $activitesSousEncadrant = 
  "
  SELECT *
  FROM activite 
  WHERE NOMRESP = ?
  AND PRENOMRESP = ?
  AND DATEACT >= NOW()
  ";

  /**
   * Sélectionne les activités où le vacancier s'est inscrit
   */
  $activitesValidesVacancier =
  "
  SELECT A.*
  FROM activite A, inscription I
  WHERE A.NOACT = I.NOACT
  AND I.USER = ?
  AND I.DATEANNULE IS NULL
  "

?>
