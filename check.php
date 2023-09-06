
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type= "image/x-icon" href="secmyit.png">   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Include your stylesheet here -->
    <link rel="stylesheet" href="check.css"> 

    <title>Result</title>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['user'])) {
    header('location: login.php');
    exit; // Make sure to exit after redirecting
}

$con = mysqli_connect('localhost', 'root', '', 'quizdatabase');

if (!$con) {
    die('Error: ' . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    if (!empty($_POST['quizcheck'])) {
        $count = count($_POST['quizcheck']);
        echo "<div class='result-message'>Out of 10 Questions, You have attempted " . $count . " Questions</div>";

        $result = 0;

        $selected = $_POST['quizcheck'];

        $q = "SELECT * FROM questions";
        $query = mysqli_query($con, $q);

        $i = 1;
        while ($rows = mysqli_fetch_array($query)) {
            if (isset($selected[$i])) {
                $checked = $rows['ans_id'] == $selected[$i];
                if ($checked) {
                    $result++;
                }
            }
            $i++;
        }

        $name = $_SESSION['user'];

        $stmt = mysqli_prepare($con, "INSERT INTO user (username, totalques, answer_correct) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sii', $name, $count, $result);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($result >= 8) {
            // Passed the test
            echo "<div class='pass-message'>Congratulations!! You passed the test</div>";
            echo "<div class='correct-answers'>You answered $result out of 10 questions correctly.</div>";
            echo "<a href='logout.php' class='end-test-button'>End Test</a>";
        } else {
            // Failed the test
            echo "<div class='fail-message blinking'>Unfortunately, you failed the test</div>";
            echo "<div class='correct-answers'>You answered $result out of 10 questions correctly.</div>";
            echo "<a href='login.php' class='retest-button'>Retest</a>";
        }
        
    }
}

mysqli_close($con);
?>

</body>
</html>
