<?
namespace Web\Components;
class DBConnection{
    private $server='localhost';
    private $username='root';
    private $pwd='';
    private $db_name='start_php';
    private $options=[
        // отображать ошибки
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
    ];
    private $connection;
    private static $dbConnection;
    private function __construct(){

    }
    public static function getBDConnection(){
        if(self::$dbConnection==null){
            self::$dbConnection=new DBConnection();
        }
        return self::$dbConnection
    } 
    public function getConnection(){
        return $this->connection = new PDO("mysql:host=$server;dbname=$db_name", $username, $pwd, $options );;
    }
   
}