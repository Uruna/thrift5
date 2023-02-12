<?php
include_once('../connect.php');
include('top.php');
$user_id = $_SESSION['user_id'];
//for all categories
$order_q = "SELECT pro.*, usr.*, pro.name as product, usr.name as user, ord.date as order_date from orders ord left join users usr on ord.user_id = usr.id  left join products pro on ord.product_id = pro.id where ord.user_id = $user_id and ord.type='rent' order by ord.id desc";
$rents = mysqli_query($con, $order_q);

 ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- left column -->
            <div class="col-md-12">
                <div class="">
                    <h3 class="bg-success text-light w-100 p-2">Rents</h3>
                </div>
                    <table class="table table-striped w-100 ">
                        <thead>
                            <tr class="text-capitalize">
                                <th>date</th>
                                <th>user</th>
                                <th>product</th>
                                <th>seller</th>
                                <th>address</th>
                                <th>total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($rents as $key => $item){
                                ?>
                                    <tr class="">
                                        <td><?php echo $item["order_date"]; ?></td>
                                        <td><?php echo $item["user"]; ?></td>
                                        <td><?php echo $item['product']; ?></td>
                                        <td><?php echo $item['user']; ?></td>
                                        <td><?php echo $item['address']; ?></td>
                                        <td><?php echo $item['price']; ?></td>
                                    </tr>
                                <?php
                            }
                            ?>
                            <tr class="text-right"><td colspan="5"> <a href="">View All</a></td></tr>
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