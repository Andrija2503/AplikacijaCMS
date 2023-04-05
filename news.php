<?php require_once 'bootstrap.php';

if(isset($_GET['id'])){

    $idnews = $news->select_news($_GET['id']);
    $comment = $comments->select_comments($_GET['id']);
 
}



require_once 'views/news.view.php';
?>