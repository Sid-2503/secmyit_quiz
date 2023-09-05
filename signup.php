<?php

session_start();
header('location: login.php');

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
    echo "User already exists";
}else {
    $qy = "INSERT INTO signin(name, password) VALUES('$name','$password')";
    mysqli_query($con, $qy);
}



?>