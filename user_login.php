<?php 

ob_start();
session_start();


if(isset($_POST["Firstname"])){

	include("include/connect.php");
	$Firstname = $_POST['Firstname'];
	$Fathername = $_POST['Fathername'];
	$pin = $_POST['pin'];
	$sql = "SELECT * from register";

	$result = $connect->query($sql);
	while ($ri = mysqli_fetch_array($result)){
		if ($ri["first_name"] == $Firstname && $ri["father_name"] == $Fathername && $ri["otp"] == $pin){
			$_SESSION["id"]=$ri["id"];
			$_SESSION["first_name"]=$Firstname;
			
			header("location:vote_party.php");
		}

		else{
			echo"<script>alert('Username or password is incorrect!')</script>";
		}
	}
}


?>


<!DOCTYPE html>
<html>
<head>
<title> Login </title>

<link rel= "stylesheet" type="text/css" href="user_login.css">
</head>
<body>
<div class="container">
	<div class="header">
		<h1> Login </h1>
	</div>
	<div class="main">
		<form method="POSt">
			<span>
				<i class="fa fa-user"></i>
				<input type="text" placeholder="First Name" name="Firstname">
			</span> <br>
			<span>
				<i class="fa fa-user"></i>
				<input type="text" placeholder="Father Name" name="Fathername">
			</span> <br>
			</span>
				<i class="fa fa-lock"></i>
				<input type="password" placeholder="PIN" name="pin">
			<span> <br>
				<button type="submit">Login </button>
		</form>
	</div>
</div>
</body>
	
	

