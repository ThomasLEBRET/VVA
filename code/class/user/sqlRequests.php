<?php

  $selectUser =
    "
    SELECT *
    FROM compte
    WHERE USER = ?
    AND MDP = ?
    ";

?>
