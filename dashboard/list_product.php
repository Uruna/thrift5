<?php 
include_once('../connect.php');

//for parent category
$products_q = "SELECT * from products order by id desc ";
$product = mysqli_query($con, $products_q);



?>
<?php include('top.php'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- left column -->
         
            <div class="col-md-12">
                <div class="">
                    <h3 class="bg-success text-light w-100 p-2">Products List</h3>
                </div>
                    <table class="table table-striped w-100 text-capitalize" id="dataTable">
                        <thead>
                            <tr>
                                <th>sn</th>
                                <th>name</th>
                                <th>size</th>
                                <th>color</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($product as $key => $item){
                                ?>
                                    <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $item['name']; ?></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                       <a href="delete_product.php?id=<?php echo $item['id']; ?>" class="text-danger">Delete</a>
                                       <a href="edit_product.php?id=<?php echo $item['id'] ?>" class="text-primary">Edit</a>
                                        </td>
                                        
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
  
<script>
  document.getElementById('dataTable').DataTable()
</script>
  <?php include('foot.php'); ?>