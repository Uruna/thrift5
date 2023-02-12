<?php 
include_once('./connect.php');

//for parent category
$category_q = "SELECT cat.*, pro.*, cat.name as category from products pro left join categories cat on pro.category_id = cat.id group by pro.category_id order by pro.id desc";
$cat_products = mysqli_query($con, $category_q);

$cat = mysqli_fetch_array($cat_products);

foreach($cat as $items){
    // echo $items;
}



$produts_q = "SELECT * from products order by id desc";
$products = mysqli_query($con, $produts_q);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thriftonic</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://kit.fontawesome.com/7300af8bbb.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- custom css -->
    <link rel = "stylesheet" href = "main.css">
    <link rel = "stylesheet" href = "main2.css">

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    
    <!-- navbar -->
    <div id="nav-placeholder">

    </div>

    <!-- end of navbar -->
 
<!-- Carousel -->
<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./images/ban1.jpg" class="d-block w-100" style="width:50%; height: 700px;" alt="banner1">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./images/ban2.jpg" class="d-block w-100" style="width:100%; height: 720px;" alt="banner2">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./images/jack.jpg" class="d-block w-100" style="width:100%; height: 720px;" alt="banner3">
        <div class="carousel-caption d-none d-md-block">
          <h5>Winter Jackets</h5>
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

    <!-- collection -->
    <section id = "collection" class = "py-5">
        <div class = "container">
            <div class = "title text-center">
                <h2 class = "position-relative d-inline-block">Collection</h2>
            </div>

            <div class = "row g-0">
                <div class = "d-flex flex-wrap justify-content-center mt-5 filter-button-group">
                <?php 
                    foreach($cat_products as $cat){
                ?>
                   <button type = "button" class = "btn m-2 text-dark active-filter-btn text-capitalize" data-filter = ".<?php echo $cat['category']; ?>"><?php echo $cat['category']; ?></button>
                   
                    <?php
                    }
                    ?>
                    <!-- <button type = "button" class = "btn m-2 text-dark" data-filter = "">Casuals</button>
                    <button type = "button" class = "btn m-2 text-dark" data-filter = ".feat">Traditionals</button>
                    <button type = "button" class = "btn m-2 text-dark" data-filter = ".new">Ornaments</button>
                    <button type = "button" class = "btn m-2 text-dark" data-filter = ".new">Footwears</button> -->
                </div>

                <div class = "collection-list mt-4 row gx-0 gy-3">
                   
                   
                    <?php 
                        $best_q = "SELECT * from categories where parent_id=0";
                        $best = mysqli_query($con, $best_q);
                        foreach($best as $items){
                    ?>
                     <div class = "col-md-6 col-lg-4 col-xl-3 p-2 <?php echo $items['name'] ?>">
                        <?php 
                        
                        foreach($cat_products as $all):
                            if($items['name'] == $all['category']):
                        ?>
                        <div class = "special-img position-relative coll-container">
                        <a href="detail.php?id=<?php echo $all['id'] ?>"> <img src = "dashboard/uploads/<?php echo $all['image'] ?>" class = "w-100">
                            </a>
                                <span class = "position-absolute d-flex align-items-center justify-content-center hidden rounded-circle p-2 shop-icon">
                                    <i class = "fa fa-shopping-cart"></i>
                                </span>
                        </div>
                        <div class = "text-center">
                            <div class = "rating mt-3">
                                <span class = "text-primary"><i class = "fas fa-star stars"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star stars"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star stars"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star stars"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star stars"></i></span>
                            </div>
                            <p class = "text-capitalize my-1"><?php echo $all['name'] ?></p>
                            <span class = "fw-bold">Rs. 450</span>
                        </div>
                        <?php
                        endif;
                    endforeach;
                        ?>
                                           
                    </div>
                        <?php
                    }
                    ?>

            </div>
        </div>
    </section>
    <!-- end of collection -->

    
    <!-- blogs -->
    <section id = "offers" class = "py-5">
        <div class = "container">
            <div class = "row d-flex align-items-center justify-content-center text-center justify-content-lg-start text-lg-start">
                <div class = "offers-content">
                    <span class = "text-white">Discount Up To 40%</span>
                    <h2 class = "mt-2 mb-4 text-white">Grand Sale Offer!</h2>
                    <a href = "#" class = "btn">Buy Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end of blogs -->


    <!-- most rented -->
    <section id = "popular" class = "py-5">
        <div class = "container">
            <div class = "title text-center pt-3 pb-5">
                <h2 class = "position-relative d-inline-block ms-4">Popular This Week</h2>
            </div>

            <div class = "row">
                <div class = "d-flex align-items-center justify-content-between">
                    <figure class="figure">
                        <img src = "images/best_selling_1.jpg" alt = "" class = "figure-img img-fluid rounded">
                        <figcaption class="figure-caption">Shirt</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src = "images/best_selling_1.jpg" alt = "" class = "figure-img img-fluid rounded">
                        <figcaption class="figure-caption">This Suit</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src = "images/best_selling_1.jpg" alt = "" class = "figure-img img-fluid rounded">
                        <figcaption class="figure-caption">That Suit</figcaption>
                    </figure>
                    <!-- <img src="..." class="figure-img img-fluid rounded" alt="..."> -->
                    <!-- <img src = "images/best_selling_1.jpg" alt = "" class = "img-fluid pe-3 w-25">
                    <img src = "images/best_selling_1.jpg" alt = "" class = "img-fluid pe-3 w-25"> -->
                </div>
            </div>
        </div>
    </section>
    <!-- end of popular -->

    <div id="foot-placeholder">

    </div>


    <!-- jquery -->
    <script src = "jquery.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- custom js -->
    <script>
        // init Isotope
var $grid = $('.collection-list').isotope({
  // options
});
// filter items on button click
$('.filter-button-group').on( 'click', 'button', function() {
  var filterValue = $(this).attr('data-filter');
  resetFilterBtns();
  $(this).addClass('active-filter-btn');
  $grid.isotope({ filter: filterValue });
});

var filterBtns = $('.filter-button-group').find('button');
function resetFilterBtns(){
  filterBtns.each(function(){
    $(this).removeClass('active-filter-btn');
  });
}
    </script>
    <script>
    $(function(){
    $("#nav-placeholder").load("nav.php");
    $("#foot-placeholder").load("footer.html");
    });
    </script>
</body>
</html>