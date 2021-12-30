<?php



ob_start();
session_start();

if(isset($_POST['signup']))
{
    include("include/connect.php");
    

    if(empty($_POST['Firstname']) || empty($_POST['Fathername']) || empty($_POST['GrandFatherName']) || empty($_POST['Gender']) || empty($_POST['Email']) || empty($_POST['PhoneNumber'])
    || empty($_POST['Age']) || empty($_POST['Region']) || empty($_POST['sub_region']) || empty($_POST['Kebele'])
    || empty($_POST['Houseno_']) || empty($_POST['VilageName']) || empty($_FILES['image'])){


        echo"<script>alert('Please Fill All Forms..')</script>";

    }
    else{

  



    $first_name = strtolower($_POST['Firstname']);
    $father_name = strtolower($_POST['Fathername']);
    $gfather_name = strtolower($_POST['GrandFatherName']);
    $gender = strtolower($_POST['Gender']);
    $region = strtolower($_POST['Region']);
    $sub_region = strtolower($_POST['sub_region']);
    $kebele = $_POST['Kebele'];
    $house_no = strtolower($_POST['Houseno_']);
    $PhoneNumber = $_POST['PhoneNumber'];



    $sql_u = "Select * from user WHERE first_name = '$first_name'";
    $sql_uf = "Select * from user WHERE father_name = '$father_name'";
    $sql_ugf = "Select * from user WHERE gfather_name = '$gfather_name'";
    $sql_ug = "Select * from user WHERE gender = '$gender'";
    $sql_ur = "Select * from user WHERE region = '$region'";
    $sql_us = "Select * from user WHERE sub_region = '$sub_region'";
    $sql_uk = "Select * from user WHERE kebele = '$kebele'";
    $sql_uh = "Select * from user WHERE house_no = '$house_no'";
    
    //for check user from woreda db

    $res_u = mysqli_query($connect2, $sql_u);
    $res_uf = mysqli_query($connect2, $sql_uf);
    $res_ugf = mysqli_query($connect2, $sql_ugf);
    $res_ug = mysqli_query($connect2, $sql_ug);
    $res_ur = mysqli_query($connect2, $sql_ur);
    $res_us = mysqli_query($connect2, $sql_us);
    $res_uk = mysqli_query($connect2, $sql_uk);
    $res_uh = mysqli_query($connect2, $sql_uh);
    
    if (mysqli_num_rows($res_u) > 0 && mysqli_num_rows($res_uf) > 0 && mysqli_num_rows($res_ugf) > 0 && 
    mysqli_num_rows($res_ug) > 0 && mysqli_num_rows($res_ur) > 0 && mysqli_num_rows($res_us) > 0 && mysqli_num_rows($res_uk) > 0 && 
    mysqli_num_rows($res_uh) > 0 ) {

        $sql_r = "Select * from register WHERE first_name = '$first_name'";
        $sql_rf = "Select * from register WHERE father_name = '$father_name'";
        $sql_rgf = "Select * from register WHERE gfather_name = '$gfather_name'";
        $sql_rh = "Select * from register WHERE house_no = '$house_no'";
        $sql_rp = "Select * from register WHERE phone_number = '$PhoneNumber'";

        $res_r = mysqli_query($connect, $sql_r);
        $res_rf = mysqli_query($connect, $sql_rf);
        $res_rgf = mysqli_query($connect, $sql_rgf);
        $res_rh = mysqli_query($connect, $sql_rh);
        $res_rp = mysqli_query($connect, $sql_rp);

        if (mysqli_num_rows($res_r) > 0){
            if(mysqli_num_rows($res_rf) > 0){
                if(mysqli_num_rows($res_rgf) > 0){
                    if(mysqli_num_rows($res_rh) > 0){
                        if(mysqli_num_rows($res_rp) > 0){
                            $name_error = "Sorry... Values already taken"; 	
                        }
                
                    }
                
                }
            }
        }

        else{

            $image = $_FILES['image']['name'];
            $target = "all_images/".basename($image);
            $user_otp = rand(100000, 999999);

            
            
           
     
        $sql = ("INSERT INTO register(first_name, father_name, gfather_name,gender ,email,phone_number,age,region,sub_region,kebele,house_no,
        village_name,id_or_pass,otp) 
        VALUES('" . strtolower($_POST['Firstname']) . "', '" . strtolower($_POST['Fathername']) . "', '" . strtolower($_POST['GrandFatherName']) . "', 
         '" . strtolower($_POST['Gender']) . "',
        '" . $_POST['Email'] . "', '" . $_POST['PhoneNumber'] . "', '" . $_POST['Age'] . "', '" . strtolower($_POST['Region']) . "'
        , '" . strtolower($_POST['sub_region']) . "',
        '" . $_POST['Kebele'] . "', '" . $_POST['Houseno_'] . "', '" . $_POST['VilageName'] . "', 
        '" . $image . "','". $user_otp ."')");

        if($connect->query($sql)){
            

            //send mail
            $to = $_POST['Email'];
            $subject = "Your PIN is ";
         
            $message = $user_otp;
         
         
            $header = "From: kaleabwalelign@gmail.com";
         
         
            $retval = mail($to,$subject,$message,$header);
         
            if( $retval == true ) {
            echo "Message sent successfully check your email ...";
            }else {
            echo "Message could not be sent... ";
            }




            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                
            }else{
                
            }

            
            echo"inserted succusfully ";
            
            
            $_SESSION["id"]=$ri["id"];
            header("location:user_login.php");
        }
        else 
            {
            echo"problem arises".mysqli_error($connect);
            }
    

    
    }
}

        else{
            
            echo"<script>alert('You Are not Found in Woreda Data base please First register In your woreda')</script>";
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
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
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

<div class="container">
    <div>
        <h2>Personal Information</h2>
    </div>
    
    <div class="form" >
    
    <form  method="POST" enctype="multipart/form-data"> 
    <input type="hidden" name="MAX_FILE_SIZE" value="200000" />
        <div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
            <?php if (isset($name_error)): ?>
            <span style="color:red"><?php echo $name_error; ?></span>
	  <?php endif ?>
      </div>
        <div>
            <label for="Firstname"> First Name* </label>
            <input type="text" name="Firstname"> 
        </div>

        <div>
            <label for="Fathername"> Father Name* </label>
            <input type="text" name="Fathername"> 
        </div>

        <div>
            <label for="GrandFatherName"> Grand Father Name* </label>
            <input type="text" name="GrandFatherName"> 
        </div>

        

        <div>
            <label for="Gender"> Gender* </label>   
            <input type="text" name="Gender"> 
        </div>

        <div>
            <label for="Email"> Email* </label>
            <input type="email" name="Email"> 
        </div>

        <div>
            <label for="PhoneNumber"> Phone Number* </label>
            <input type="text" name="PhoneNumber"> 
        </div>

        

        <div>
            <label for="Age"> Age* </label>
            <input type="text" name="Age"> 
        </div>

        <div>
            <label for="Region"> Region* </label>
            <input type="text" name="Region"> 
        </div>

        

        <div>
            <label for="sub_region"> Sub_region* </label>
            <input type="text" name="sub_region"> 
        </div>

        <div>
            <label for="Kebele"> Kebele* </label>
            <input type="text" name="Kebele"> 
        </div>

        <div>
            <label for="Houseno_"> House no_* </label>
            <input type="text" name="Houseno_"> 
        </div>

        <div>
            <label for="VilageName"> Vilage Name* </label>
            <input type="text" name= "VilageName"> 
        </div>

        <div>
            <label for="image"> ID/Passport* </label>
            <input type="file" name="image"> 
        </div>

        
        
        <div>
            <button type="submit" name="signup"> Sign Up </button>
        </div>

        

   

    </form>
    </div>
</div>
</body>
</html>