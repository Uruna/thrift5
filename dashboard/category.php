<?php 
include_once('../connect.php');

//for parent category
$sel_category = "SELECT * from categories where parent_id=0 ";
$parent = mysqli_query($con, $sel_category);

//for all categories
$all_category = "SELECT * from categories";
$category = mysqli_query($con, $all_category);

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
                <h3 class="card-title">Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="create_category.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="catname">Name</label>
                    <input type="text" name="name" class="form-control" id="catname" placeholder="Category name">
                  </div>
                  <div class="form-group">
                    <select class="form-select text-capitalize" name="parent" id="">
                        <option value=""> --Select Parent -- </option>
                        <?php
                        foreach($parent as $cat){
                            ?>
                            <option value="<?php echo $cat['id']; ?> "><?php echo $cat['name']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
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
                    <h3 class="bg-success text-light w-100 p-2">Add Category</h3>
                </div>
                    <table class="table table-striped w-100 text-capitalize">
                        <thead>
                            <tr>
                                <th>sn</th>
                                <th>name</th>
                                <th>has parent</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($category as $key => $item){
                                ?>
                                    <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $item['name']; ?></td>
                                        <td><?php 
                                        if($item['parent_id'] == 0 ){
                                                echo 'main'; 
                                            }
                                            else{
                                                echo 'sub';
                                            }
                                        ?></td>
                                    </tr>
                                <?php
                            }
                            ?>
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