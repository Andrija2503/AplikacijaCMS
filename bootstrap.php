<?php
session_start();

require 'class/Comment.php';
require 'class/News.php';
require 'class/User.php';

$news = new News();
$user = new User();
$comments = new Comments();


?>