<?php
include_once('../connect.php');
?>
<?php include('top.php'); ?>
<?php
  //for parent category
  $sel_category = "SELECT * from categories where parent_id=0 ";
  $parent = mysqli_query($con, $sel_category);

  //for all categories
  if($_SESSION['user_role'] == 'admin'):
    $user_id = $_SESSION['user_id'];
    $products_q = "SELECT * from products order by id desc limit 11";
  else:
    $products_q = "SELECT * from products where user_id=$user_id order by id desc limit 11";
  endif;

  $products = mysqli_query($con, $products_q);
?>
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
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="create_product.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="catname">Title</label>
                    <input type="text" name="name" class="form-control" id="catname" placeholder="Product name" required>
                  </div>
                  <div class="form-group">
                    <select class="form-select text-capitalize" name="category" id="">
                        <option value=""> --Select Category -- </option>
                        <?php
                        foreach($parent as $cat){
                            ?>
                            <option value="<?php echo $cat['id']; ?> "><?php echo $cat['name']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-select text-capitalize" name="size" id="">
                        <option value=""> --Select Size -- </option>
                        <option value="xs">X-small</option>
                        <option value="sm">Small</option>
                        <option value="md">Medium</option>
                        <option value="lg">Large</option>
                        <option value="xl">X-large</option>
                        <option value="xxl">XX-large</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-select text-capitalize" name="group" id="">
                        <option value=""> --Age Group -- </option>
                        <option value="kid">Kids</option>
                        <option value="teen">Teen</option>
                        <option value="adult">Adult</option>
                        <option value="aged">aged</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" name="color" class="form-control" id="color" placeholder="Category name">
                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control" id="price" required placeholder="price in NRS">
                  </div>
                  <div class="form-group">
                    <label for="tags">Tags</label>
                    <input type="text" name="tags" class="form-control" id="tags" required placeholder="Category tags seperated by comma">
                  </div>
                  <div class="form-group">
                    <label for="tags">Details</label> <br>
                   <textarea name="details" id="details" class="w-100" rows="10" required placeholder="details of the product"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" required name="image" class="form-control" id="image">
                  </div>
                </div>
                <!-- /.card-body -->
               
               
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
            <div class="col-md-6">
                <div class="">
                    <h3 class="bg-success text-light w-100 p-2">Recent Prdoucts</h3>
                </div>
                    <table class="table table-striped w-100 text-capitalize">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>price</th>
                                <th>image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($products ? $products : [] as $key => $item){
                                ?>
                                    <tr class="">
                                        <td><?php echo $item['name']; ?></td>
                                        <td><?php echo $item['price']; ?></td>
                                        <td><img src="./uploads/<?php echo $item['image']; ?>" alt="" height="48px"></td>
                                    </tr>
                                <?php
                            }
                            ?>
                            <tr class="text-center"><td colspan="3"> <a href="">View All</a></td></tr>
                        </tbody>
                    </table>
            </div>
            <!-- /.card -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

  <?php include('foot.php'); ?>