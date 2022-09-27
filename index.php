<?php
error_reporting(E_ALL);
ini_set('ignore_repeated_errors', TRUE);
ini_set('display_errors', TRUE); //TODO: Usar Falso solo en produccion
ini_set("error_log", "./php-error.log");

require_once "libs/app.php";
$app = new App();


