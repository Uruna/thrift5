<?php 
include_once('../connect.php');

//for parent category
$product_id = $_GET['id'];
$product_q = "SELECT * from products where id='$product_id'";
$product_detail = mysqli_query($con, $product_q);
$product =  mysqli_fetch_array($product_detail);

//for all categories
$all_category = "SELECT * from categories";
$category = mysqli_query($con, $all_category);

//for parent category
$sel_category = "SELECT * from categories where parent_id=0 ";
$parent = mysqli_query($con, $sel_category);

?>
<?php include('top.php'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="update_product.php?id=<?php echo $product['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="catname">Title</label>
                    <input type="text" value ="<?php echo $product['name'] ?>" name="name" class="form-control" id="catname" placeholder="Product name">
                  </div>
                  <div class="form-group">
                    <select class="form-select text-capitalize" name="category" id="">
                        <option value=""> --Select Category -- </option>
                        <?php
                        foreach($parent as $cat){
                            ?>
                            <option value="<?php echo $cat['id']; ?> " <?php echo ($product['category_id'] == $cat['id']) ? 'selected' : '' ; ?>><?php echo $cat['name']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-select text-capitalize" name="size" id="">
                        <option value=""> --Select Size -- </option>
                        <option value="xs"  <?php echo ($product['size'] == 'xs') ? 'selected' : '' ; ?>>X-small</option>
                        <option value="sm" <?php echo ($product['size'] == 'sm') ? 'selected' : '' ; ?>>Small</option>
                        <option value="md" <?php echo ($product['size'] == 'md') ? 'selected' : '' ; ?>>Medium</option>
                        <option value="lg" <?php echo ($product['size'] == 'lg') ? 'selected' : '' ; ?>>Large</option>
                        <option value="xl" <?php echo ($product['size'] == 'xl') ? 'selected' : '' ; ?>>X-large</option>
                        <option value="xxl" <?php echo ($product['size'] == 'xxl') ? 'selected' : '' ; ?>>XX-large</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-select text-capitalize" name="group" id="">
                        <option value=""> --Age Group -- </option>
                        <option value="kid" <?php echo ($product['age'] == 'kid') ? 'selected' : '' ; ?>>Kids</option>
                        <option value="teen" <?php echo ($product['age'] == 'teen') ? 'selected' : '' ; ?>>Teen</option>
                        <option value="adult" <?php echo ($product['age'] == 'adult') ? 'selected' : '' ; ?>>Adult</option>
                        <option value="aged" <?php echo ($product['age'] == 'aged') ? 'selected' : '' ; ?>>aged</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" name="color" value ="<?php echo $product['color'] ?>" class="form-control" id="color" placeholder="Category name">
                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price"  value ="<?php echo $product['price'] ?>" class="form-control" id="price" placeholder="price in NRS">
                  </div>
                  <div class="form-group">
                    <label for="tags">Tags</label>
                    <input type="text" name="tags"  value ="<?php echo $product['tags'] ?>" class="form-control" id="tags" placeholder="Category tags seperated by comma">
                  </div>
                  <div class="form-group">
                    <label for="tags">Details</label> <br>
                   <textarea name="details" id="details"  value ="<?php echo $product['details'] ?>" class="w-100" rows="10" placeholder="details of the product"></textarea>
                  </div>
                  <div class="form-group">
                    <img src="uploads/<?php echo  $product['image'] ?>" alt="">
                  </div>
                  <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                  </div>
                </div>
                <!-- /.card-body -->
               
               
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
        </div>
            <!-- /.card -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

  <?php include('foot.php'); ?>