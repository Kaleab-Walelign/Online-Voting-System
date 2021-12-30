<?php
include("include/connect.php");


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="ViewPort"
		content="widtth=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-compatible" content="ie=edge">
	<title> Important News </title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="news2.css">
<link rel="stylesheet" href="contact_us.css">
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
		
		<table>
			<tr>
				<th><h1>Party name</h1></th>
				<?php 
                                $resp = mysqli_query($connect, "select * from party");
                                while ($rowp = mysqli_fetch_array($resp)){  ?>
				<th><h1><?php echo $rowp["name"]; ?></h1></th>
				
				<?php
} ?>
<tr></tr><tr></tr><tr></tr><tr></tr>
				
			</tr>
			<tr>
				<th><h1>current result</h1></th>
				
				<?php 
                                $resp = mysqli_query($connect, "select * from party");
                                while ($rowp = mysqli_fetch_array($resp)){  ?>
				
				<th><h1><?php echo $rowp["result"]; ?></h1></th>
				<?php
} ?>
				
			</tr>
			

		</table>
		


<?php 
                                $res = mysqli_query($connect, "select * from news");
                                while ($row = mysqli_fetch_array($res)){  ?>
	<div class="blog-post">
	<div class="blog-post_img">
	<?php echo '<img src = "image/'.$row["image"].'">'; ?>
	</div>
	<div class="blog-post_info">
	<div class= "blog_post_date">
	<span> <?php echo $row["date"]; ?> </span>
	
	</div>
	<h1 class="blog-post_title"> <?php echo $row["title"]; ?> </h1>
	<p class= "blog-post-text"> 
	<?php echo $row["content"]; ?>
	</p>
	
	</div>
	</div>
	<br><br><br>
	<?php
} ?>



</body>
</html>	