<?php

define('ROOT', dirname(__FILE__));
require (ROOT."/components/Autoload.php");

$loader = new ClassLoader(array('models','components'));

$router = new Router();
$router->run();