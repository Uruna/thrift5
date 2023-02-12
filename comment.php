
<?php include_once('connect.php'); ?>
<?php
    // comments
        $comments = $_POST['user_comment'];
        $product_id = $_POST['product_id'];
        $user_id = $_POST['user_id'];
        $sql="INSERT into reviews(comments, user_id, product_id) values('$comments', $user_id, $product_id)";
        $ins = mysqli_query($con, $sql);

        if($ins){
             echo json_encode('You commented the product!');
        }
        else{
            return false;
            
        }
        
        
    
        ?>