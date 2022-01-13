<?php

use CRUD\Controller\PersonController;
use CRUD\Helper\DBConnector;

include ("loader.php");
include ("index.html");

$controller = new PersonController();
$controller->switcher($_SERVER['REQUEST_URI'],$_REQUEST);

$connection = new DBConnector();
$connection->setFirstTime(true);
$connection->connect();
