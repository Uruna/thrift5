<?php
include_once('connect.php');

$email = $_POST['email'];
$password = $_POST['password'];

$cart_item = $_POST['cart_item'];
$delimeters = ['|','[',',',']',' '];
$new_item = str_replace($delimeters, $delimeters[0], $cart_item);

// adding the cart to the database table after user is logged in
$addCart = function($product_id) use($con){
    $user_id = 2; // active user id
    $ins = "INSERT into carts(user_id,product_id) values('$user_id', '$product_id')";
    $insert = mysqli_query($con, $ins);

    if(!$insert){
        echo "failed".mysqli_error($con);
    }
};

$sql = "SELECT * from users where email='$email' and password='$password' ";
$check = mysqli_query($con, $sql);

if(mysqli_num_rows($check) == 1){
    // add all cart items one by one
    foreach(explode($delimeters[0], $new_item) as $product_id){
        $id = str_replace('"','', $product_id);
        $addCart(intval($id));
    }
    $user =  mysqli_fetch_array($check);
    session_start();
    $_SESSION['user_id'] =$user['id'];
    $_SESSION['user_role'] =$user['type'];
    header('location: dashboard/index.php');
}
else{
    // return error msg to the user (validation)
    header('location: login.html');
}



?>