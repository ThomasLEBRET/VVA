<?php

 /**
  * get activites for encadrant
  * @var string
  */
  $getAllActivitesForEncadrant =
  "
    SELECT *
    FROM activite A, animation AN
    WHERE A.CODEANIM = AN.CODEANIM
    AND A.CODEANIM = ?
  ";

  /**
   * get all activities for a vacationer user
   * @var string
   */
  $getAllActivitesForVacancier =
  "
    SELECT *
    FROM activite A, animation AN
    WHERE A.CODEANIM = AN.CODEANIM
    AND A.CODEANIM = ?
    AND A.CODEETATACT = 'O'
    AND A.DATEACT >= ?
  ";

  /**
   * get all code activitie states
   * @var string
   */
  $getAllCodeEtatAct =
  "
    SELECT *
    FROM etat_act
  ";

  /**
   * request to add an activity
   * @var string
   */
  $addActivite =
  "
    SELECT @noact := (SELECT MAX(NOACT) +1 FROM activite);
    INSERT INTO activite(NOACT, CODEANIM,	CODEETATACT,	DATEACT,	HRRDVACT,	PRIXACT,	HRDEBUTACT,	HRFINACT,	DATEANNULEACT,	NOMRESP,	PRENOMRESP)
    VALUES
    (
      @noact,?,?,?,?,?,?,?,NULL,?,?
    )
  ";

  $updateActivite = 
  "
    UPDATE activite
    SET CODEETATACT = ?,
        PRIXACT = ?,
        DATEACT = ?,
        HRRDVACT = ?,
        HRDEBUTACT = ?,
        HRFINACT = ?, 
        DATEANNULEACT = NULL
    WHERE NOACT = ?

  ";

  /**
   * count an activity where date is the same day as an other in the same animation
   * @var string
   */
  $countActiviteInSameDayForAnimation =
  "
    SELECT A.*
    FROM animation AN, activite A
    WHERE A.CODEANIM = AN.CODEANIM
    AND AN.CODEANIM = ?
    AND A.DATEACT = ?
  ";

  /**
   * return activity if user is registered in this activity
   * @var string
   */
  $isRegisteredUser =
  "
    SELECT A.*
    FROM activite A, compte C, inscription I
    WHERE I.USER = C.USER
      AND I.NOACT = A.NOACT
      AND A.NOACT = ?
      AND C.USER = ?
      AND I.DATEANNULE IS NULL
  ";

  /**
   * SQL request to get an activity with his number
   * @var string
   */
  $getActivite =
  "
    SELECT *
    FROM activite
    WHERE NOACT = ?
  ";

  /**
   * add an inscription in an activity for a user if not registered
   * @var string
   */
  $addInscriptionInActivity =
  "
    INSERT INTO inscription(USER, NOACT, DATEINSCRIP, DATEANNULE)
      VALUES(?,?,DATE(NOW()),NULL)
  ";

  $cancelActivity = 
  "
      UPDATE activite
      SET CODEETATACT = 'N', 
          DATEANNULEACT = NOW()
      WHERE NOACT = ?
  ";

?>
