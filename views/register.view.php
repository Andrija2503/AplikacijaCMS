
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
        <h1>User Registration</h1> 
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 my-3">
            <?php if($user->register_result): ?>
                <p class="alert alert-success">Uspesna regisracija.<a href="login.php" class="d-blok p-1">Logujte se..</a></p>
            <?php elseif(isset($_POST['registerBtn']) && !$user->register_result): ?>
                <p class="alert alert-danger">Nije uspjela regisracija.<a href="register.php" class="d-blok p-1">Pokusajte ponovo!</a></p>
            <?php else:?>    

                <form action="register.php" method="POST">
                    <input type="text" name="f_name" placeholder="First Name" class="form-control" required><br>
                    <input type="text" name="l_name" placeholder="Last Name" class="form-control" required><br>
                    <input type="password" name="password" placeholder="Password" class="form-control" required><br>
                    <input type="email" name="email" placeholder="Email" class="form-control" required><br>
                
                    <input type="radio" id="user" name="level" value="2">
                    <label for="user">User</label><br>
                    <input type="radio" id="admin" name="level" value="1">
                    <label for="admin">Administrator</label><br>

                    <button class="form-control mt-3 btn btn-warning" name="registerBtn">Register</button>
                </form>
            <?php endif;?>
        </div>
    </div>
</div>

<?php require_once 'partials/bottom.php' ?>