<?php
  /**
   * Sélectionne l'inscription pour un vacancier et un numéro d'activité donné
   */
  $getInscription =
  "
    SELECT *
    FROM inscription
    WHERE USER = ?
    AND NOACT = ?
  ";

  /**
   * Met à jour l'inscription d'un vacancier en mettant à jour sa date d'annulation et en fonction du numéro d'inscription qu'il possède
   */
  $unscribeUserForActivite =
  "
    UPDATE inscription
    SET DATEANNULE = DATE(NOW())
    WHERE NOINSCRIP = ?
  ";

  /**
   * Ré-enregistre le vacancier à l'activité en mettant à jour son ancienne inscription (annulation de sa date d'inscription) pour un numéro d'inscription donné
   */
  $registerAgainUser =
  "
    UPDATE inscription
    SET DATEANNULE = NULL
    WHERE NOINSCRIP = ?
  ";

  /**
   * Sélectionne les comptes pour un numéro d'activité donné avec la date d'annulation de l'inscription à NULL (pour un encadrant)
   */
  $getInscritsActivite = 
  "
    SELECT C.*
    FROM inscription I, compte C
    WHERE I.USER = C.USER
    AND I.NOACT = ?
    AND I.DATEANNULE IS NULL
  ";
?>
