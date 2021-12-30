<?php

session_start();
unset($_SESSION["id"]);

session_destroy();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="thanks.css">
    <link rel="stylesheet" href="contact_us.css">
    <title>Thanks</title>
</head>
<body>
<section class="header">    
        <nav>
            <a  href="voteh.html"><img src="image/las.gif" 
              width="200px" height="150px"  border-radius="50px" > 
              
             
             </a>
             
        <div class="nav-links">
            <ul>
            <li><a href="home.php">HOME</a></li>
                
                <li><a href="news.php">NEWS</a></li>
                <li><a href="contact_us.php">CONTACT US</a></li>
                <li><a href="register.php">REGISTER</a></li>
            </ul>
        </div>
          </nav>
        </section>
        <br><br><br><br><br><br><br>
    <h1>Thank you for choosing!!</h1>
    <br><br><br>
    
    
    <a href='home.php'> <input type="submit" value="Home"> </a>

</body>
</html>