<?php
require_once 'trait/connect.php';

class News{
    use connectdb;

    public $addnews_result =NULL;

    public function all_news(){
        $sql = "SELECT * from news";
        $query = $this->db()->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function select_category($category){
        $sql = "SELECT * from news where category = '$category' ";
        $query = $this->db()->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function add_news()
    {
        $title = $_POST['title'];
        $text = $_POST['text'];
        $category = $_POST['category'];
        $user_id = $_SESSION['loggedUser']->id;

        $sql = "INSERT INTO news values (NULL, ?, ?, ?, ?)";
        $query = $this->db()->prepare($sql);
        $query->execute([$title,$text,$category,$user_id]);

        if($query){
            $this->addnews_result = true;
        }
    }
    public function select_news($news_id)
    {
        $sql = "SELECT * from news where id = '$news_id' ";
        $query = $this->db()->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}

?>