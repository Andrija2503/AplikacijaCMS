
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
    <p>
        <a href="index.php?akcija=Kultura" class="btn btn-secondary">Kultura</a>
        <a href="index.php?akcija=Sport" class="btn btn-secondary">Sport</a>
        <a href="index.php?akcija=Zabava" class="btn btn-secondary">Zabava</a>
    </p>
  </div>
</div>
<div class="container-fluid">
    <div class="row d-flex flex-wrap justify-content-around px-3">
     <?php foreach($allnews as $news): ?>
      <div class="card col-sm-10 col-md-5 col-lg-3 p-1 m-2">
        <div class="card-header">
          <h4><?php echo $news->title; ?></h1>
        </div>
        <div class="card-body">
          <p><?php echo $news->text; ?></p>
        </div>
        <div class="card-footer">
          <p class="d-flex justify-content-between"><small class="d-blok"><?php echo $news->category; ?></small class="d-blok"><small><a href="news.php?id=<?php echo $news->id; ?>">Opsirnije...</a></small></p>
        </div>
      </div>
     <?php endforeach;?>
    </div>
     
</div>
<?php require_once 'partials/bottom.php'?>