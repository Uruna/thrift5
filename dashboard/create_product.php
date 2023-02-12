<?php
include_once('../connect.php');
// create a new category
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
if(move_uploaded_file($fileTempName,$uploads_dir.'/'.$fileName)){
    $sql = "INSERT into products(category_id, name, size, color, age, price, tags, details, image, status) values('$category', '$name', '$size', '$color', '$group', '$price', '$tags', '$details', '$fileName', 1 )";
    $ins = mysqli_query($con, $sql);

    if(!$ins){
        echo "error".mysqli_error($con);
    }
    else{
        header('location: product.php');
    }
}
else{
    echo 'failed to move file';
}


?>