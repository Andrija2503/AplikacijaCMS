<?php 

require_once 'bootstrap.php';


if(isset($_GET)){

    $comments->remove_comment($_GET['id']);

    header("Location: news.php?id={$_GET['news_id']}");



}

?>