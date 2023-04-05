<?php require_once 'partials/top.php'?>
<nav class="navbar navbar-expand navbar-light bg-light d-flex justify-content-between p-2">
    <a href="index.php" class="navbar-brand">Vijesti</a>
    <ul class="navbar-nav">
    <?php if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']->level == 1):?>
        <li class="nav-item"><a href="add_news.php" class="btn btn-outline-secondary">Dodaj Vijest</a></li>
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
        <h1>Dodaj Vijest</h1> 
    </div>
</div>

<div class="contaner">
    <div class="row justify-content-center">
        <div class="col-6 mt-3">
            <?php if($news->addnews_result): ?>
                <p class="alert alert-success text-center">Uspesno ste dodali vesti.</p>
            <?php else: ?>
                <form action="add_news.php" method="POST">
                <input type="text" name="title" placeholder="Enter title" class="form-control p-2 mb-3" required>
                <textarea name="text" cols="30" rows="10" class="form-control p-2 mb-3" placeholder="Enter description..." required></textarea>
                <label for="kategorija">Izaberite kategoriju:</label>
                <select name="category" class="form-select p-2 mb-3" id="kategorija" required>
                    
                    <option value="Sport">Sport</option>
                    <option value="Kultura">Kultura</option>
                    <option value="Zabava">Zabava</option>
                </select>
                <button class="form-control mt-3 btn btn-warning" name="addnewsBtn">Add</button>
            </form>    
            <?php endif; ?>    
            
        </div>

    </div>
</div>


<?php require_once 'partials/bottom.php'?>