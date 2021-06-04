<?php

 /**
  * Requête SQL permettant d'obtenir la liste de toutes les activités pour un encadrant
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
  * Requête SQL permettant d'obtenir la listes des activités ouvertes pour un vacancier
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
    AND NOW() <=  ?
  ";

  /**
   * Requête SQL permettant d'obtenir le contenu de la table etat_act
   * @var string
   */
  $getAllCodeEtatAct =
  "
    SELECT *
    FROM etat_act
  ";

  /**
   * Requête SQL permettant ajouter une activité en simulant l'auto incrément 
   * @var string
   */
  $addActivite =
  "
  SELECT @noact := (SELECT MAX(NOACT) +1 FROM activite);
  SELECT IF(@noact IS NOT NULL, @noact := (SELECT MAX(NOACT) +1 FROM activite), @noact := (SELECT 1)); 
  INSERT INTO activite(NOACT, CODEANIM,	CODEETATACT,	DATEACT,	HRRDVACT,	PRIXACT,	HRDEBUTACT,	HRFINACT,	DATEANNULEACT,	NOMRESP,	PRENOMRESP)
    VALUES
    (
      @noact,?,?,?,?,?,?,?,NULL,?,?
    )
  ";

  /**
   * Requête SQL permettant de mettre à jour une activité
   * @var string
   */
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
   * Requête SQL permettant d'obtenir les activités issues d'une animation en fonction d'une date d'activité
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
   * Requête SQL permettant d'obtenir la liste des activités pour un utilisateur inscrit à celle ci
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
   * Requête SQL permettant d'obtenir une activité
   * @var string
   */
  $getActivite =
  "
    SELECT *
    FROM activite
    WHERE NOACT = ?
  ";

  /**
   * Requête SQL permettant d'ajouter une inscription à une activité
   * @var string
   */
  $addInscriptionInActivity =
  "
    INSERT INTO inscription(USER, NOACT, DATEINSCRIP, DATEANNULE)
      VALUES(?,?,DATE(NOW()),NULL)
  ";

  /**
   * Requête SQL permettant d'annuler une activité
   */
  $cancelActivity = 
  "
      UPDATE activite
      SET CODEETATACT = 'N', 
          DATEANNULEACT = NOW()
      WHERE NOACT = ?
  ";

  /**
   * Requête SQL permettant d'annuler la dernière activité insérée
   */
  $cancelActivityLastInserted = 
  "
  SELECT MAX(NOACT) as maxNum FROM activite;
  UPDATE activite 
        SET DATEANNULE = NOW()
        WHERE NOACT = maxNum
  ";

  $nbInscritsActivity =
  "
  SELECT COUNT(*) as nbInscrits
  FROM inscription
  WHERE NOACT = ?
  ";

  $noactParNumMois = 
  "
  SELECT a.NOACT, a.DATEACT
  FROM activite a, animation an
  WHERE a.CODEANIM = an.CODEANIM
  AND MONTH(a.DATEACT) = ?
  GROUP BY a.NOACT
  ";

?>
