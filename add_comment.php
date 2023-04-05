<?php require_once 'bootstrap.php';

    if(isset($_POST['addcommentBtn'])){
        
        $comments->add_comment();

        header("Location: news.php?id={$_POST['news_id']}");
        

    }

    

?>