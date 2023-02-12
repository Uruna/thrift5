<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Thriftonic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
          crossorigin="anonymous">
          <link rel="shortcut icon" href="./images/Logo.png" type="image/x-icon">
          <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Corben:wght@400;700&family=Heebo:wght@400;500;700&display=swap" rel="stylesheet">
          <script src="https://kit.fontawesome.com/7300af8bbb.js" crossorigin="anonymous"></script>
          <link rel="stylesheet" href="tops.css">
          <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
     -->
     <script src="jquery.js"></script>
     <script src="ajax.js" ></script>
</head>

<body>
<!-- navbar -->
  <header class="header">
    <nav class="navbar navbar-expand-lg header-nav fixed-top border-bottom">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="./images/Logo.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
          <li class="nav-item">
          <a class="nav-link" href="#">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Cart</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
                </li> -->
      </ul>
      <form class="d-flex" role="search">
        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
        <?php 
            if(empty($_SESSION['user_id'])){
              ?>
              <a href="login.html">
              <button class="btn btn-outline-success" type="button">Login</button>
              </a>
              <?php
              }
              else{
                ?>
                  <a href="logout.php">
                  <button class="btn btn-outline-success" type="button">Log Out</button>
                  </a>
                <?php
              }
        ?>
      </form>
    </div>
  </div>
</nav>
  </header>