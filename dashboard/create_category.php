<?php
include_once('../connect.php');
// create a new category
$name = $_POST['name'];
$parent_id = $_POST['parent'];

$sql = "INSERT into categories values('', '$name', '$parent_id', 1)";

$ins = mysqli_query($con, $sql);

if(!$ins){
    echo "error";
}
else{
    echo 'done';
}
?>