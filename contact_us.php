<?php 
include("include/connect.php");
if (isset($_POST["submit"])){
    

    mysqli_query($connect, "insert into contact(first_name,last_name,email,subject) values ('$_POST[firstname]', '$_POST[lastname]','$_POST[email]','$_POST[subject]')");
    

         
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact_us.css">
    
    <title>Contact Us</title>
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
<div class="container">
  <div style="text-align:center">
    <h2>Contact Us</h2>
    <p> leave us a message:</p>
  </div>
  <div class="row">
    <div class="column">
      <img src="image/las.gif" style="width:100%">
    </div>
    <div class="column">
      <form method="post">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
        <label for="lname">Email</label>
        <input type="text" id="lname" name="email" placeholder="Your Email..">
        
        
        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
        <input type="submit" name="submit" value="Submit">
      </form>
    </div>
  </div>
</div>
</body>
</html>