<?php
require_once 'trait/connect.php';

class Comments {
   
    use connectdb;

    

    public function select_comments($news_id){
        $sql = "select comments.*, users.f_name from ((select * from comments where comments.news_id = '$news_id' ) 
        comments inner join users on comments.user_id = users.id)";
        $query = $this->db()->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add_comment(){

        $comment = $_POST['comment'];
        $user_id = $_SESSION['loggedUser']->id;
        $news_id = $_POST['news_id'];


        $sql = "INSERT INTO comments values (NULL, ?, ?, ?)";
        $query = $this->db()->prepare($sql);
        $query->execute([$comment,$user_id,$news_id]);

    }

    public function remove_comment($id){

        $sql = "DELETE from comments where id = '$id' ";
        $query = $this->db()->prepare($sql);
        $query->execute();
    }


}

?>