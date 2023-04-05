<?php require_once 'bootstrap.php';



if(isset($_GET['akcija'])){

    $allnews = $news->select_category($_GET['akcija']);
   
}else{

    $allnews = $news->all_news();

} 

require_once 'views/index.view.php';

?>