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
        // Проверка наличие такого запроса в роуторе
        foreach ($this->routes as $uriPattern => $path) {
            // Сравниваем $uriPattern и $path
            // ~ - это для того, если в строке запроса будут /
            if(preg_match("~$uriPattern~",$uri))
            {
                // "Запрос, который набрал пользователь $uri<br>";
                // "Что ищем (совпадение из правила) $uriPattern<br>";
                // "Кто обрабатывает $path<br>";

                // Получаем внутренний путь из внешнего согласно правилу
                // Нужно сформировать путь
                $internalRoute=preg_replace("~$uriPattern~",$path,$uri);

                // Определяем контроллер, action, параметры
                $segments=explode('/',$internalRoute);
                
                // Извлекаем первый элемент массива 
                // и добавляем фразу Controllers
                $controllerName='Web\Controllers\\'.ucfirst(array_shift($segments))."Controller";
                
                // Аналогично получаем имя метода
                $actionName="Action".ucfirst(array_shift($segments));

               /*  echo "Контроллер $controllerName<br>";
                echo "Событие $actionName<br>"; */
                $parametrs=$segments;
               /*  echo "Параметры<br>";
                var_dump($parametrs); */

                // Создаем объект класса контроллера
                // и вызываем его метод
                $controllerObject = new $controllerName;
                // Функция call_user_func_array передает Action 
                // в объект с параметрами
                $result=call_user_func_array(array($controllerObject,$actionName), $parametrs); 
                if ($result !=null){
                    break;
                }  
            }
        }
    }
}