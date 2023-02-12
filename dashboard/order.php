<?php
include_once('../connect.php');
include('top.php');
$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['user_role'];

//for all categories
switch($user_role){
    case 'admin':
        $where = '1=1';
        break;
    case 'seller':
        $where = "ord.user_id in (Select user_id from products)";
        break;
    default: 
        $where = "ord.user_id = '$user_id'";
}

    // $order_q = "SELECT pro.*, usr.*, ord.date as order_date, pro.name as product, usr.name as user from orders ord left join users usr on ord.user_id = usr.id  left join products pro on ord.product_id = pro.id where  $where order by ord.id desc";
    $order_q = "SELECT user.address as user_address, user.name as buyer, ord.date as order_date, pro.name as product from orders ord  left join products pro on ord.product_id = pro.id left join users user on ord.user_id=user.id ";
    $orders = mysqli_query($con, $order_q);
    $get_orders = mysqli_fetch_array($orders);
    // var_dump($get_orders);
    foreach($get_orders as $items){
        echo $items['product'];
    }
    die;

 ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- left column -->
            <div class="col-md-12">
                <div class="">
                    <h3 class="bg-success text-light w-100 p-2">Orders</h3>
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
                            foreach($orders as $key => $item){
                                ?>
                                    <tr class="">
                                        <td><?php echo $item["order_date"]; ?></td>
                                        <td><?php echo $item["buyer"]; ?></td>
                                        <td><?php echo $item['product']; ?></td>
                                        <td><?php echo $item['seller']; ?></td>
                                        <td><?php echo $item['user_address']; ?></td>
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