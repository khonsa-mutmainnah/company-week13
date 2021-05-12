<?php
  require "inc.koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">

    <!-- font -->
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;600;800&display=swap');
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg" >
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=login">Log In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=employeelist">employee</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=projectlist">project</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="isi">
    <?php
      $page_dir = 'page';
      if(!empty($_GET['p'])){
        $page = scandir($page_dir, 0);
        unset($page[0], $page[1]);
        $p = $_GET['p'];
        if(in_array($p.'.php', $page)){
          include($page_dir.'/'.$p.'.php');
        } 
        else {
          echo 'Halaman tidak ditemukan! :(';
        }
      } 
      else {
        include($page_dir.'/home.php');
      }
    ?>
    </div>
    <div class = "footer">
      <p>@kmosha2021</p>
    </div>
</body>
</html>