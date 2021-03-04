<?php

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

?>
