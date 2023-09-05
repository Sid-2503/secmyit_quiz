<?php 

session_start();
if(!isset($_SESSION['user'])){
header ('location:login.php');
}

$con = mysqli_connect('localhost','root');

mysqli_select_db($con,'quizdatabase');



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" type= "image/x-icon" href="secmyit.png">   
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="header-for-quiz">SecMyIT Quiz</h1>
   <h2>Welcome <?php echo $_SESSION['user']; ?> </h2> 



<div class="card">
    <h3> <?php echo $_SESSION ['user']; ?>, you have to select only one out of 4 options</h3>
</div>

<form action = "check.php" method="post">
<?php
for($i =1; $i<11;$i++){
$q = "SELECT * FROM questions where qid=$i";
$query = mysqli_query($con,$q);

while($rows = mysqli_fetch_array($query)){
    ?>
<div class="card">
    <h4 class = "card-header"><?php echo $rows['question']
    
    ?></h4>
</div>

<?php
$q = "SELECT * FROM answers WHERE ans_id=$i";
$query = mysqli_query($con,$q);

while($rows = mysqli_fetch_array($query)){
    ?>

    <div class="card-body">
        <input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]" value="<?php echo $rows['aid'] ;  ?>">
        <?php
        echo $rows['answers'];

        ?>
    </div>

<?php
}
}
}

?>


<input type="submit" name="submit" value="Submit" class="btn">
</form>





<div class="log">
<a href = "logout.php" class="btn-1"> Logout </a>
</div>
   </div>
<div class="footer"> ⒸSecMyIT 2023 </div>
   <div>
</div>




</body>
</html>



