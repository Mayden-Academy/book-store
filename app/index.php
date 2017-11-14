<?php

require "../vendor/autoload.php";

$test = new \App\Store();
$dbconnection = new \App\DbConnector();

$test->getData($dbconnection->db);