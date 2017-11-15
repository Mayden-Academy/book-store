<?php
/**
 * Created by PhpStorm.
 * User: alexandrk
 * Date: 15/11/2017
 * Time: 11:10
 */

session_start();
session_destroy();
header("Location: buttonpage.php");
die();