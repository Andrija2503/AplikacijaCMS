<?php require_once 'bootstrap.php';

if(isset($_SESSION['loggedUser'])){
    
    header("Location: index.php");
}

if(isset($_POST['registerBtn'])){
    $user->registerUser();
}

require_once 'views/register.view.php'?>