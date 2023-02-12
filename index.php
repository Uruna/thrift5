<?php 
include_once('./connect.php');

//for parent category
$category_q = "SELECT cat.*, pro.*, cat.name as category from products pro left join categories cat on pro.category_id = cat.id group by pro.category_id order by pro.id desc";
$cat_products = mysqli_query($con, $category_q);

$produts_q = "SELECT * from products order by id desc limit 8";
$products = mysqli_query($con, $produts_q);


?>
<?php include_once('topbar.php') ?>
<link rel="stylesheet" href="main.css">

<!-- Carousel -->
<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="false">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/ban1.jpg" class="d-block w-100" style="width:100%; height: 670px;" alt="banner1">
      <div class="carousel-caption d-none d-md-block">
        <h5>Thrift Shop</h5>
        <p>A place where preloved items are reloved.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/b2.jpg" class="d-block w-100" style="width:100%; height: 670px;" alt="banner2">
      <div class="carousel-caption d-none d-md-block">
        <h5>Shop smart</h5>
        <p>Get our preloved items in best price</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/b3.jpg" class="d-block w-100" style="width:100%; height: 670px;" alt="banner3">
      <div class="carousel-caption d-none d-md-block">
        <h5>Quote</h5>
        <p>Get the fluffiest jacket this Winter</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>

<!-- Category Section -->
<section id="Collection">
<div class="card-title">
  <h1>Our Collections</h1>
</div>

<div class="row d-flex justify-content-center gap-2">
  <?php 
  foreach($cat_products as $cat){
    ?>
  <span class="col-md-3" style="border:1px solid grey">
  <div class="card-item"><h4 class="text-capitalize "><?php echo $cat['category']; ?></h4></div>
    <div class="col-12"><img class="img-fluid" src="dashboard/uploads/<?php echo $cat['image']; ?>" style=""/>
  </div>
    
  </span>
  <?php
  }
  ?>
  </div>
</section>
<!-- Latest Products -->
<div class="card-title">
  <h1>Latest Products</h1>
</div>

  <div class="row prod">
    
    <?php foreach($products as $product){
      ?>
      
        <div class="col-4">
        <a href="detail.php?id=<?php echo $product['id'] ?>">
          <img src="dashboard/uploads/<?php echo $product['image'] ?>">
          <h4><?php echo $product['name'] ?></h4>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <p>Rs.<?php echo $product['price'] ?></p>
      </a>

      </div>
    <?php
    }
    ?>
    </div>
<?php include_once('foot.php') ?>
  