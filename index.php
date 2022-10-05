<?php
error_reporting(E_ALL);
ini_set('ignore_repeated_errors', TRUE);
ini_set('display_errors', TRUE); //TODO: Usar Falso solo en produccion
ini_set("error_log", "./php-error.log");

require_once "config/config.php";

require_once "classes/errorMessages.php";
require_once "classes/successMessages.php";

require_once "libs/app.php";
require_once "libs/controller.php";
require_once "libs/database.php";
require_once "libs/model.php";
require_once "libs/view.php";
;

$app = new App();
