<?
namespace Web\Components;
class Router{
    private $routes;
    public function __construct(){
        $routerPatch=ROOT.'/config/routes.php';
        
        // текущему свойству $routes присваиваем массив,
        // который хранится в config/routes.php
        $this->routes=include $routerPatch;
    }
    public static function run(){
        var_dump($this->routes);
        echo "класс Router";
    }
}