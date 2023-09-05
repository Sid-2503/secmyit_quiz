<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>SecMyIT Quiz</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" type= "image/x-icon" href="secmyit.png">   
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>


    <div class="form-container">
        <form action="signup.php" method="post" class="signup-form">
            <h3>Sign Up</h3>
            <label >Username</label>
            <input type="text" placeholder="Email or Phone" name="user">
            <label >Password</label>
            <input type="password" placeholder="Password" name="password">
            <button type="Submit">Sign Up</button>
        </form>

        <form action="validation.php" method="post" class="login-form">
            <h3>Login Here</h3>
            <label >Username</label>
            <input type="text" placeholder="Email or Phone" name="user">
            <label>Password</label>
            <input type="password" placeholder="Password" name="password">
            <button type="Submit">Log In</button>
        </form>
    </div>
</body>
</html>
