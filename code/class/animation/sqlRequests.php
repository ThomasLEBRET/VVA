<?php
  $getAll =
    "
      SELECT AN.*, Nb_place_rest(CODEANIM) as places_restantes, TA.NOMTYPEANIM
      FROM animation AN, type_anim TA
      WHERE AN.CODETYPEANIM = TA.CODETYPEANIM
    ";

  $getAllValides =
    "
      SELECT AN.*, TA.NOMTYPEANIM, Nb_place_rest(AN.CODEANIM) as places_restantes
      FROM animation AN, activite A, type_anim TA
      WHERE AN.CODEANIM = A.CODEANIM
      AND AN.CODETYPEANIM = TA.CODETYPEANIM
      AND AN.LIMITEAGE <= ?
      AND Nb_place_rest(AN.CODEANIM) > 0
      AND A.DATEANNULEACT IS NULL
      GROUP BY AN.CODEANIM
    ";

  $getCodesTypeAnim =
    "
      SELECT CODETYPEANIM
      FROM type_anim
    ";

  $addAnimation =
    "
      INSERT INTO animation
      (CODEANIM, CODETYPEANIM, NOMANIM, DATECREATIONANIM, DATEVALIDITEANIM, DUREEANIM, LIMITEAGE, TARIFANIM, NBREPLACEANIM, DESCRIPTANIM, COMMENTANIM, DIFFICULTEANIM)
      VALUES (?,?,?,DATE(NOW()),?,?,?,?,?,?,?,?)
    ";

  $getCommonAnimations =
    "
      SELECT CODEANIM
      FROM animation
      WHERE CODEANIM = ?
    ";
?>
