<?php require_once 'partials/top.php'?>
<nav class="navbar navbar-expand navbar-light bg-light d-flex justify-content-between p-2">
    <a href="index.php" class="navbar-brand">Vijesti</a>
    <ul class="navbar-nav">
        <?php if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']->level == 1):?>
        <li class="nav-item"><a href="add_news.php" class="btn btn-outline-secondary">Dodaj Vijesti</a></li>
        <li class="nav-item"><a href="" class="nav-link"><?php echo $_SESSION['loggedUser']->f_name;?></a></li>
        <a href="logout.php" class="nav-link">Logout</a>
        <?php elseif(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']->level == 2):?>
        <li class="nav-item"><a href="" class="nav-link"><?php echo $_SESSION['loggedUser']->f_name;?></a></li>
        <a href="logout.php" class="nav-link">Logout</a>
        <?php else:?>
            <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>    
        <?php endif;?>
        
    </ul>
</nav>
<div class="container-fluid">
    <div class="mt-2 pb-1 pt-3 px-3 bg-primary text-white text-center rounded">
        <h1>Vijesti</h1> 
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 my-3 p-0">
            
            <div class="card p-1 m-2">
                <div class="card-header">
                    <h1><?php echo $idnews[0]->title;?></h1>
                </div>
                <div class="card-body">
                    <p><?php echo $idnews[0]->text;?></p>
                </div>
                <div class="card-footer">
                    <div class="container">
                        <?php foreach($comment as $row):?>
                            <div class="row">
                                <p class="lead"><u><?php echo $row['f_name']?> je postavio komentar:</u></p>
                                <div class="d-flex justify-content-between">
                                    <small class="d-inline-block px-2"><?php echo $row['comment']?></small>
                                    <?php if(isset($_SESSION['loggedUser'])):?>
                                    <?php if(($_SESSION['loggedUser']->level == 1) || ($_SESSION['loggedUser']->id == $row['user_id'])): ?>
                                        <small class="d-inline-block btn btn-outline-secondary btn-sm align-self-end"><a href="remove_comment?id=<?php echo $row['id']. "&news_id=" . $row['news_id'];?>" class="text-decoration-none">Obrisi</a></small>
                                    <?php endif;?>
                                    <?php endif;?>
                                </div>
                            </div><hr>
                        <?php endforeach;?>
                    </div>
                    
                </div>
                <?php if(isset($_SESSION['loggedUser'])):?>
                <form action="add_comment.php" method="POST">
                    <div class="form-group pt-3">
                        <label for="addcomment"><small>Postavite komentar</small> </label>
                        <textarea class="form-control" id="addcomment" rows="3" name="comment"></textarea>
                        <input type="hidden" name="news_id" value=<?php echo $_GET['id'];?>>
                        <button class="form-control mt-3 btn btn-warning" name="addcommentBtn">Add</button>
                    </div>
                </form>
                <?php endif;?>
            </div>
            
        </div>
    </div>
</div>
<?php require_once 'partials/bottom.php'?>
</nav>