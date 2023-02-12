<?php
include_once('connect.php');

//collect data from register form
// $a = $_Method['name of field'];
$fn = $_POST['fn'];
$type = $_POST['type']; // sel = seller, buy = buyer
$address = $_POST['address'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT into users values('', '$fn', '$type', '$address', '$phone', '$gender', '$email', '$password',0, '')";

$insert = mysqli_query($con, $sql); // run query mysqli_query(connection_variable, query_variable);

if(!$insert){
    echo "failed";
}
else{
    // echo "okay inserted!";
    header('location: index.php');
}

?>