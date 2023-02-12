<?php
 // hidden page for order confirmation
 include_once('connect.php');
 session_start();
 $user_id =  $_SESSION['user_id'];
 $order_id = $_SESSION['order_id'];

 $amount = $_POST['price'];
 $address = $_POST['address'];
 $payment_type = $_POST['payment_type'];

 $sql = "INSERT into shippings(address) values('$address') ";
 $insert_shipping = mysqli_query($con, $sql);

 if($insert_shipping){
    $shipping_id = mysqli_insert_id($con);

    $sql1 = "INSERT into payments(user_id, type, price) values('$user_id', '$payment_type', $amount) ";
    $insert_payment = mysqli_query($con, $sql1);
    $payment_id = mysqli_insert_id($con);


    if(!$insert_payment){
        echo 'failed';
    }
    else{
        // update order
        $sql3 = "UPDATE orders set payment_id ='$payment_id', shipping_id='$shipping_id', price = '$amount' where id='$order_id' ";
        $update_payment = mysqli_query($con, $sql3);

        if($update_payment){
            header('location: index.php');
        }
    }
 } // close shipping
 else{
    echo 'failed shipping'.mysqli_error($con);
 }

?>