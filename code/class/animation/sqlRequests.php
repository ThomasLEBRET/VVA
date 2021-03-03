<?php
  $getAll =
    "
      SELECT *
      FROM ANIMATION
    ";

  $getAllValides =
    "
      SELECT AN.*
      FROM ANIMATION AN, ACTIVITE A
      WHERE AN.CODEANIM = A.CODEANIM
      AND ? >= DATE(NOW())
      AND AN.LIMITEAGE <= ?
      AND Nb_place_rest(AN.CODEANIM) > 0
      AND A.DATEANNULEACT IS NULL
      GROUP BY AN.CODEANIM
    ";
?>
