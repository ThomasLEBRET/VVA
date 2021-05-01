<?php
require_once 'class/Router.php';
require_once 'class/datas/Session.php';
require_once 'class/datas/Debug.php';

Session::start();
$router = new Router();
$router->run();
?>
