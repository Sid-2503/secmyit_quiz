<?php

session_start();


$con = mysqli_connect('localhost','root');
if($con){
    echo "Connection Successfull";
}else {
    echo "No Connection";
}

mysqli_select_db($con, 'session');

$name = $_POST['user'];
$password = $_POST['password'];

$Q = "SELECT * FROM signin WHERE name  = '$name' && password='$password'  ";

$result = mysqli_query($con, $Q);
$num = mysqli_num_rows($result);


if($num == 1){
$_SESSION['user'] = $name;
header('location: home.php');
    
    
}else {
   header ('location:login.php');
}



?>