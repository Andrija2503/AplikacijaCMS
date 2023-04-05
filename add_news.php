<?php 

require_once 'bootstrap.php';

if(isset($_POST['addnewsBtn'])){
    $news->add_news();
}

require_once 'views/add_news.view.php';
?>