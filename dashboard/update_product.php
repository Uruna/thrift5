<?php
include_once('../connect.php');

$product_id = $_GET['id'];

$category = $_POST['category'];
$name = $_POST['name'];
$size = $_POST['size'];
$color = $_POST['color'];
//gender
$group = $_POST['group'];
$price = $_POST['price'];
$tags = $_POST['tags'];
$details = $_POST['details'];

$image = $_FILES['image'];
$fileName = $_FILES['image']['name'];
$fileTempName = $_FILES['image']['tmp_name'];

// move file 
$uploads_dir ="./uploads";
// chmod($uploads_dir, 0777);
// if(move_uploaded_file($uploads_dir,$fileTempName)){
//     echo 'moved';
// }
// else{
//     echo 'failed';
// }

$sql = "UPDATE  products set category_id = '$category', name = '$name', size = '$size', color = '$color', age = '$group', price = '$price', tags = '$tags', details = '$details', image = '$fileName' where id = '$product_id'";

$update = mysqli_query($con, $sql);

if(!$update){
    echo "error";
}
else{
    header('location: list_product.php');

}
?>