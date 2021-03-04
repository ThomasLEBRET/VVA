<?php

  $getAllActivites =
  "
    SELECT *
    FROM ACTIVITE A, ANIMATION AN
    WHERE A.CODEANIM = AN.CODEANIM
    AND A.CODEANIM = ?
    AND A.CODEETATACT = 'O'
    AND A.DATEACT >= ?
  ";

?>
