<?php
  $getInscription =
  "
    SELECT *
    FROM inscription
    WHERE USER = ?
    AND NOACT = ?
  ";

  $unscribeUserForActivite =
  "
    UPDATE inscription
    SET DATEANNULE = DATE(NOW())
    WHERE NOINSCRIP = ?
  ";

  $registerAgainUser =
  "
    UPDATE inscription
    SET DATEANNULE = NULL
    WHERE NOINSCRIP = ?
  ";

  $getInscritsActivite = 
  "
    SELECT C.*
    FROM inscription I, compte C
    WHERE I.USER = C.USER
    AND I.NOACT = ?
    AND I.DATEANNULE IS NULL
  ";
?>
