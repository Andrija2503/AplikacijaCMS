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
        <h1>User Login</h1> 
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 my-3">
            
            <?php if($user->loggedUser): ?>
                    <p class="alert alert-success">Uspesno logovanje.<a href="index.php" class="d-blok p-1">Idi na početnu</a></p>
            <?php elseif(isset($_POST['loginBtn'])): ?>
                    <p class="alert alert-danger">Nije uspjelo logovanje!</p>
            <?php else:?>
                <form action="login.php" method="POST">
                <input type="email" name="login_email" placeholder="Enter E-mail" class="form-control" required><br>
                <input type="password" name="login_password" placeholder="Enter Password" class="form-control" required><br>
                
                <button class="form-control mt-3 btn btn-warning" name="loginBtn">Login</button>
                       
            </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require_once 'partials/bottom.php' ?>