<?php 
include_once('../connect.php');

//for parent category
$orders_q = "SELECT *, sum(price) as total, count(*) as qty from orders where date in (SELECT date from orders) group by date order by date desc";
$sales = mysqli_query($con, $orders_q);

?>
<?php include('top.php'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
                <div class="">
                    <h3 class="bg-success text-light w-100 p-2">Recent Sales</h3>
                </div>
                    <table class="table table-striped w-100 text-capitalize">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Quantity</th>
                                <th>Total (NRs)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($sales as $key => $item){
                                ?>
                                    <tr class="">
                                        <td><?php echo $item['date']; ?></td>
                                        <td><?php echo $item['qty']; ?></td>
                                        <td><?php echo $item['total']; ?></td>
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