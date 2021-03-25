<?php
  $getInscription =
  "
    SELECT *
    FROM inscription
    WHERE USER = ?
    AND NOACT = ?
  ";
?>
