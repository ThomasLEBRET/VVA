<?php
  $getAll =
    "
      SELECT *, Nb_place_rest(CODEANIM)
      FROM ANIMATION
    ";

  $getAllValides =
    "
      SELECT AN.*, TA.NOMTYPEANIM, Nb_place_rest(AN.CODEANIM) as places_restantes
      FROM ANIMATION AN, ACTIVITE A, TYPE_ANIM TA
      WHERE AN.CODEANIM = A.CODEANIM
      AND AN.CODETYPEANIM = TA.CODETYPEANIM
      AND AN.LIMITEAGE <= ?
      AND Nb_place_rest(AN.CODEANIM) > 0
      AND A.DATEANNULEACT IS NULL
      GROUP BY AN.CODEANIM
    ";
?>
