<?php
    include("AdminDb.php");
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];

        if($con->connect_error){
            die("Connection Failed: ". $con->connect_error);
        }

        $query = "select * from admin where binary Username = '$Username' and binary Password = '$Password'";
        $result = $con->query($query);
        if($result->num_rows ==1 ){
            $_SESSION['Username']=$Username;
            header("location:../Dashboard/Dashboard.php");
        }
        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="Login.css">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <h1 class="h1">STAFF <br> <span> MANAGEMENT</span></h1>
    
            <form method="post">
                <div class="login-container">
                    <div class="username">
                        <input class="input" id="username" name="Username" type="text" required autocomplete="none" placeholder="Username">
                    </div>
    
                    <div class="password">
                        <input class="input" id="password" name="Password" type="password" required autocomplete="none" placeholder="Password">
                    </div>
    
                    <div class="button">
                        <input class="login-button" id="login-button" name="login-button" type="submit" value="Log In">
                    </div>
                </div>
    
            </form>
    </div>
</body>
</html>