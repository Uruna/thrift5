<?php session_start(); ?>
<?php include_once('connect.php'); ?>
<?php
    $product_id = $_GET['id'];
    $product_type = $_GET['type'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT into orders(type,user_id, product_id) values('$product_type', '$user_id', '$product_id') ";
    $insert = mysqli_query($con, $sql);

    if(!$insert){
        echo 'error'.mysqli_error($con);
    }
    else{
        $order_id =  mysqli_insert_id($con);
        $_SESSION['order_id'] = $order_id;

        header('location: checkout.php');
    }
?>