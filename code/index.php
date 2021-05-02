<?php
require_once("classes/Routeur.php");
require_once("classes/donnees/Session.php");
require_once("classes/donnees/Debug.php");

Session::demarrer();
$routeur = new Routeur();
$routeur->demarrer();
?>
