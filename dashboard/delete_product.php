<?php
include_once('../connect.php');

$product_id = $_GET['id'];
$sql = "DELETE from products where id='$product_id'";

$del = mysqli_query($con, $sql);

if($del){
    header('location: list_product.php');
}
else{
    echo 'failed';
}

?>