<? 
namespace Web\Controllers;
use Web\Models\News;
class NewsController{
    public function ActionIndex(){
        $newsList=array();
        $newsList=News::getNewsList();
        var_dump($newsList);
        return true;
        
    }
    public function ActionView($category, $id){
        if($id){
            $newsItem=News::getNewsItemById($id);
            var_dump($newsItem);
        }
        return true;
    }
    
}