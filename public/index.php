<?
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ .'/../config/init.php';
use Web\Components\Router;
$router=new Router;
$router->run();