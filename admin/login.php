<?php

    ob_start();
    session_start();
    
    if(isset($_POST["username"])){

        include("../include/connect.php");
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * from admin";

        $result = $connect->query($sql);
        while ($ri = mysqli_fetch_array($result)){
            if ($ri["username"] == $username && $ri["password"] == $password){
                $_SESSION["id"]=$ri["id"];
                $_SESSION["username"]=$username;
                header("location:admin_page.php");
            }

            else{
                echo"<script>alert('Username or password is incorrect!')</script>";
            }
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_login.css">
    <title>Login</title>
</head>
<body>

    <div class="container">
        
        
        <form  method="post">
            <div>
                <label for="username"> <b>User Name</b>  </label>
                <input type="text" placeholder="user name" name="username"/>
            </div>

            <div>
                <label for="password"> <b>Password</b> </label>
                <input type="password" placeholder="password" name="password"/>
            </div>

            <div>
                <button type="submit"> Login </button>
            </div>

        </form>
    </div>
</body>
</html>