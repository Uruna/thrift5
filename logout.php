<?php
echo 1; 
session_start();
session_destroy();

header('location: index.php');

?>