<?
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ .'/../config/init.php';
Web\Components\Router::run();