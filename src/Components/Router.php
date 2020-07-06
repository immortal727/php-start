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
    // Метод возвращает строку запроса
    private function GetUri(){
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    public function run(){
        // Получаем строку запроса из метода GetUri()
        $uri=$this->GetUri();
        // Проверка наличие накого запроса в роуторе
        foreach ($this->routes as $uriPattern => $path) {
            // Сравниваем $uriPattern и $path
            // ~ - это для того, если в строке запроса будут /
            if(preg_match("~$uriPattern~",$uri))
            {
                // Определить какой контролллер и Action 
                // обрабатывают запрос
                $segments=explode('/',$path);

                // Извлекаем первый элемент массива 
                // и добавляем фразу Controllers
                $controllerName='Web\Controllers\\'.array_shift($segments)."Controller";
                $controllerName=ucfirst($controllerName);
                
                // Аналогично получаем имя метода
                $actionName="Action".ucfirst(array_shift($segments));

                // Создаем объект класса контроллера
                // и вызываем его метод
                $controllerObject = new $controllerName;
                $controllerObject->$actionName();
            }
        }
    }
}