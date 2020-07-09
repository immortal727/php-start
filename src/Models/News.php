<?
namespace Web\Models;
use PDO;
class News{
    public static function getNewsItemById($id){
        $id=intval($id);
        if ($id){
            $host="localhost";
            $db_name="start_php";
            $username="root";
            $pwd="";
            $options=[
                // отображать ошибки
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
            ];
            // создадим объект pdo()
            // php date object
            $db = new PDO("mysql:host=$host;dbname=$db_name", $username, $pwd, $options);
            
            $sql='SELECT *
            FROM news 
            WHERE id=:id_News;';
            $params=['id_News'=>$id];
            $statement=$db->prepare($sql);
            $statement->execute($params);
            $newsItem=$statement->fetch(PDO::FETCH_ASSOC);
            return $newsItem;
        }
    }
    public static function getNewsList(){
        $host="localhost";
        $db_name="start_php";
        $username="root";
        $pwd="";
        $options=[
            // отображать ошибки
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        ];
        // создадим объект pdo()
        // php date object
        $db = new PDO("mysql:host=$host;dbname=$db_name", $username, $pwd, $options);
        
        $sql='SELECT id, title, date, short_content
        FROM news 
        ORDER BY date DESC
        LIMIT 10';
        $result=$db->query($sql);
        
        $newsList=array();

        $i=0;
        while($row=$result->fetch()){
            $newsList[$i]['id']=$row['id'];
            $newsList[$i]['title']=$row['title'];
            $newsList[$i]['date']=$row['date'];
            $newsList[$i]['short_content']=$row['short_content'];
            $i++;
        }
        
        return $newsList;
    }
}