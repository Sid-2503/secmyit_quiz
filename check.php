

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type= "image/x-icon" href="secmyit.png">   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="check.css"> 
    <title>Result</title>
</head>
<body>

<?php 

session_start();
if(!isset($_SESSION['user'])){
header ('location:login.php');
}

$con = mysqli_connect('localhost','root');

mysqli_select_db($con,'quizdatabase');



if (isset($_POST['submit'])) {
    if (!empty($_POST['quizcheck'])) {
        $count = count($_POST['quizcheck']);
        echo "Out of 10 Questions, You have attempted" . " " . $count . " " . "Questions";
        
        $result = 0;
        
        $selected = $_POST['quizcheck'];
        
        $q = "SELECT * FROM questions";
        $query = mysqli_query($con, $q);

        $i = 1;
        while ($rows = mysqli_fetch_array($query)) {
            if (isset($selected[$i])) { // Check if answer is selected for the current question
                $checked = $rows['ans_id'] == $selected[$i];
                if ($checked) {
                    $result++;
                }
            }
            $i++;
        }
        
        echo "<br>Your total score is $result out of 10";
    }
}






$name = $_SESSION['user'];
$finalresult = "INSERT INTO user (username,	totalques, answer_correct) VALUES ('$name','10','$result')";
$queryresult = mysqli_query($con,$finalresult);
echo "<br>Test Completed";





?>

</body>
</html>
