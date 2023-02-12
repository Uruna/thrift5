<?php session_start() ?>
<nav class="navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="index.php">
            <img src="images/Logo.png" alt="site icon" style="width:100px; height:50px;" />
        </a>

        <div class="order-lg-2 nav-btns">
            <a href="cart.html">
                <button type="button" class="btn position-relative">
                    <i
                        class="fa fa-shopping-cart"></i><!-- <span class = "position-absolute top-0 start-100 translate-middle badge bg-primary">5</span> -->
                </button>
            </a>
            <button type="button" class="btn position-relative">
                <i class="fa fa-search"></i>
            </button>

            
            <?php
            if(empty($_SESSION['user_id'])){
              ?>
              <a href="login.php">
              <button class="btn btn-outline-success" type="button"> <i class="fa fa-user"></i></button>
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
        </div>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-lg-1" id="navMenu">
            <ul class="navbar-nav mx-auto text-center">

                <li class="nav-item px-2 py-2">
                    <a class="nav-link text-uppercase text-dark" href="#collection">collection</a>
                </li>
                <li class="nav-item px-2 py-2">
                    <a class="nav-link text-uppercase text-dark" href="about.html">about us</a>
                </li>
                <li class="nav-item px-2 py-2 border-0">
                    <a class="nav-link text-uppercase text-dark" href="#popular">Popular</a>
                </li>
                <li class="nav-item px-2 py-2 border-0">
                    <a class="nav-link text-uppercase text-dark" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>