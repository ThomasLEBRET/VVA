<?php

  /**
   * get all animation
   * @var string
   */
  $getAll =
    "
      SELECT AN.*, Nb_place_rest(CODEANIM) as places_restantes, TA.NOMTYPEANIM
      FROM animation AN, type_anim TA
      WHERE AN.CODETYPEANIM = TA.CODETYPEANIM
    ";

  /**
   * get just valid animations
   * @var string
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
      GROUP BY AN.CODEANIM
    ";

 /**
  * get code type animation
  * @var string
  */
  $getCodesTypeAnim =
    "
      SELECT CODETYPEANIM
      FROM type_anim
    ";

  /**
   * insert an animation
   * @var string
   */
  $addAnimation =
    "
      INSERT INTO animation
      (CODEANIM, CODETYPEANIM, NOMANIM, DATECREATIONANIM, DATEVALIDITEANIM, DUREEANIM, LIMITEAGE, TARIFANIM, NBREPLACEANIM, DESCRIPTANIM, COMMENTANIM, DIFFICULTEANIM)
      VALUES (?,?,?,DATE(NOW()),?,?,?,?,?,?,?,?)
    ";

  /**
   * get animation with code anim
   * @var string
   */
  $getCommonAnimations =
    "
      SELECT CODEANIM
      FROM animation
      WHERE CODEANIM = ?
    ";

  /**
   * get an animation 
   * @var string
   */
  $getAnimation =
  "
    SELECT *, Nb_place_rest(CODEANIM) as places_restantes, TA.NOMTYPEANIM
    FROM animation AN, type_anim TA
    WHERE AN.CODETYPEANIM = TA.CODETYPEANIM
    AND CODEANIM = ?
  ";
?>
