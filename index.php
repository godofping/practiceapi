<?php

define('DEBUG', true);

error_reporting(E_ALL);
ini_set('display_errors', DEBUG ? 'On' : 'Off');


session_start();

date_default_timezone_set('Asia/Manila');

require "Controllers/Controller.php";

spl_autoload_register(function ($class) {
    @require_once('Models/' . $class . '.php');   
});



$config = require "Resources/config/config.php";

$dsn = "mysql:host=".$config['db_host'].";dbname=".$config['db_name'].";charset=".$config['db_charset'];
// $dsn = "mysql:host=".$config['db_host'].";port=25060;dbname=".$config['db_name'].";charset=".$config['db_charset'];
$pdo = new PDO($dsn, $config['db_user'], $config['db_password'], $config['db_options']);



$controller = new Controller($pdo);
$controller->index();

