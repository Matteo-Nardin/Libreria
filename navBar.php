<?php
    session_start();
    include_once('functions.php');
    //var_dump( $_SESSION['userLogin']);
    if(!isset($_SESSION['userLogin']) && ( preg_match("/addBook/i", uri()) || preg_match("/index/i", uri()) ) ){
      exit(header('Location: http://localhost/IFOA/libreria/login.php'));
    };
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link<?= preg_match("/index/i", uri() ) ? " active" : "";?>" aria-current="page" href="index.php">Catalogo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?= preg_match("/addBook/i", uri() ) ? " active" : "";?>" href="addBook.php">Aggiungi Libro</a>
        </li>
        <li class="nav-item">
      </ul>

      <span class="navbar-text">
        <?php 
            if(!isset($_SESSION['userLogin'])){ ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="register.php">Register</a>
                    </li>
                </ul>
            <?php } else { ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                        <p><?= $_SESSION['userLogin']['user_name'] ?></p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="gestione.php?action=logout">Logout</a> 
                    </li>
                 -->
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $_SESSION['userLogin']['user_name'] ?>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="gestione.php?action=logout">Logout</a></li>
                      </ul>
                    </li>
                </ul>
            <?php } ?>
        </span>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>