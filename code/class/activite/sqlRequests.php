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

  $getAllActivitesForVacancier =
  "
    SELECT *
    FROM activite A, animation AN
    WHERE A.CODEANIM = AN.CODEANIM
    AND A.CODEANIM = ?
    AND A.CODEETATACT = 'O'
    AND A.DATEACT >= ?
  ";

  $getAllCodeEtatAct =
  "
    SELECT *
    FROM etat_act
  ";

  $addActivite =
  "
    SELECT @noact := (SELECT MAX(NOACT) +1 FROM activite);
    INSERT INTO activite(NOACT, CODEANIM,	CODEETATACT,	DATEACT,	HRRDVACT,	PRIXACT,	HRDEBUTACT,	HRFINACT,	DATEANNULEACT,	NOMRESP,	PRENOMRESP)
    VALUES
    (
      @noact,?,?,?,?,?,?,?,NULL,?,?
    )
  ";

  $countActiviteInSameDayForAnimation =
  "
    SELECT A.*
    FROM animation AN, activite A
    WHERE A.CODEANIM = AN.CODEANIM
    AND AN.CODEANIM = ?
    AND A.DATEACT = ?
  ";

?>
