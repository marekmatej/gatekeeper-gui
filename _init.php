<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

require 'vendor/autoload.php';
require '_config.php';
require '_db.php';
require '_functions.php';

session_start();

$smarty = new Smarty();

$smarty->setTemplateDir(__DIR__ .'/templates/');
$smarty->setCompileDir(__DIR__ .'/templates_c/');

$connection = dbConnect();
