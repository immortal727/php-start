<?
// 1 - режим разработки (показываются все ошибки)
// 0 - скрыть ошибки
define("DEBUG",1);
// ROOT указываем на корень нашего сайта
define("ROOT", dirname(__DIR__));
// корень нашего приложения
define("WWW", ROOT . '/public');
// пака, которая ведет на котролеры, виды, модели...
define("APP", ROOT . '/app');
// ядро приложения
define("CORE", ROOT . '/vendor/ishop/core');
// библиотеки
define("LIBS", ROOT . '/vendor/ishop/core/libs');
// кэш
define("CACHE", ROOT . '/tmp/cache');
// папка на конфигурационные файлы
define("CONF", ROOT . '/config');
// шаблон нашего сайта
define("LAYOUT", 'default');

// подключаем автозагрузчик composer
require_once ROOT .'/vendor/autoload.php';