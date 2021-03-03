<?php
  $getAll =
    "
<<<<<<< HEAD
      SELECT AN.*, Nb_place_rest(CODEANIM) as places_restantes, TA.NOMTYPEANIM
      FROM ANIMATION AN, TYPE_ANIM TA
      WHERE AN.CODETYPEANIM = TA.CODETYPEANIM
=======
      SELECT *, Nb_place_rest(CODEANIM)
      FROM ANIMATION
>>>>>>> 0c8b94c08d023415acd2a0941f54b4e28eb9067b
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
