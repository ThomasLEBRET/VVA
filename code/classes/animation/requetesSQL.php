<?php

  /**
   * Requête SQL permettant d'obtenir la liste des animations ainsi que le nombre de places restantes et le nom du type de l'animation
   * @var string une requête SELECT
   */
  $getAll =
    "
      SELECT AN.*, Nb_place_rest(CODEANIM) as places_restantes, TA.NOMTYPEANIM
      FROM animation AN, type_anim TA
      WHERE AN.CODETYPEANIM = TA.CODETYPEANIM
    ";

  /**
   * Requête SQL permettant d'obtenir la liste des animations valides pour un vacancier avec la quantité de places restantes
   * @var string une requête SELECT
   */
  $getAllValides =
    "
      SELECT AN.*, TA.NOMTYPEANIM, Nb_place_rest(AN.CODEANIM) as places_restantes
      FROM animation AN, activite A, type_anim TA
      WHERE AN.CODEANIM = A.CODEANIM
      AND AN.CODETYPEANIM = TA.CODETYPEANIM
      AND AN.LIMITEAGE <= ?
      AND Nb_place_rest(AN.CODEANIM) > 0
      AND A.DATEANNULEACT IS NULL
      AND A.CODEETATACT = 'O'
      AND A.DATEACT >= NOW()
      AND NOW() <= ?
      GROUP BY AN.CODEANIM
    ";

 /**
  * Requête SQL permettant d'obtenir le code de type d'animation depuis la table type_anim
  * @var string une requête SELECT
  */
  $getCodesTypeAnim =
    "
      SELECT CODETYPEANIM
      FROM type_anim
    ";

  /**
   * Requête SQL permettant d'insérer une nouvelle animation
   * @var string une requête INSERT
   */
  $addAnimation =
    "
      INSERT INTO animation
      (CODEANIM, CODETYPEANIM, NOMANIM, DATECREATIONANIM, DATEVALIDITEANIM, DUREEANIM, LIMITEAGE, TARIFANIM, NBREPLACEANIM, DESCRIPTANIM, COMMENTANIM, DIFFICULTEANIM)
      VALUES (?,?,?,DATE(NOW()),?,?,?,?,?,?,?,?)
    ";

  /**
   * Requête SQL permettant d'obtenir le code d'animation d'une animation précise
   * @var string une requête SELECT
   */
  $getCommonAnimations =
    "
      SELECT CODEANIM
      FROM animation
      WHERE CODEANIM = ?
    ";

  /**
   * Requête SQL permettant d'obtenir une animation précise
   * @var string une requête SELECT
   */
  $getAnimation =
  "
    SELECT *, Nb_place_rest(CODEANIM) as places_restantes, TA.NOMTYPEANIM
    FROM animation AN, type_anim TA
    WHERE AN.CODETYPEANIM = TA.CODETYPEANIM
    AND CODEANIM = ?
  ";

  /**
   * Requête SQL permettant de mettre à jour une animation
   * @var string une requête UPDATE
   */
  $updateAnimation = 
  "
    UPDATE animation
    SET CODETYPEANIM = ?,
        NOMANIM = ?,
        DATEVALIDITEANIM = ?,
        DUREEANIM = ?,
        LIMITEAGE = ?,
        TARIFANIM = ?,
        NBREPLACEANIM = ?,
        DESCRIPTANIM = ?,
        COMMENTANIM = ?,
        DIFFICULTEANIM = ?
    WHERE CODEANIM = ?
  ";
?>
