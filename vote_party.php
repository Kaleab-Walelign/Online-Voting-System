<?php
include("include/connect.php");

session_start();
if(isset($_SESSION["id"])){
    echo("<br>");
} else {
  header("location:register.php");
  
}

    
   // if(isset($var)) {
        //$nname = $_POST['name_region'];
        // $resr = mysqli_query($connect, "select * from reigional_c");
        // while ($rowr = mysqli_fetch_array($resr)){
            
        
       // }

   // }
//$nname=mysqli_real_escape_string($connect,$_POST['']);
//$submit=mysqli_real_escape_string($connect,$_POST['submit']);
//$res="UPDATE reigional_c SET result=result+1 WHERE name= '".$nname."'";
 
 if(isset($_POST['submitparty'])){
    $res = mysqli_query($connect, "select * from party");
    while ($rowr = mysqli_fetch_assoc($res)){
        if(isset($_POST['optionparty'.$rowr['id']])){
            $_SESSION["id"]=$rowr["id"];
            $id = $rowr['id'];
            mysqli_query($connect,"update party set result = result + 1 where id = '$id'");
            
        }
    }
    
    header("location:vote.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote</title>
    <link rel="stylesheet" href="votee.css">
    
    
    
    
</head>
<body>
<section class="table">
          
          <h1 class="word">እንኳን ደህና መጡ!</h1>
          <h1 class="word2">እባክዎን በሕጉ መሠረት ድምጽዎን ይስጡ! </h1>
                    <!-- first table -->

                    

                    <form method="POST" enctype="multipart/form-data">
                    

                    <div class="row">
                        <div class="column">
                    <table>
                <h1 >
                    የተወካዮች ምክር ቤት ተወዳዳሪዎች
                    </h1>
                    <h3>መምረጥ ያለቦት 1 አጩ ብቻ</h3>
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAME</th>
                                <th>PARTY ICON</th>
                                <th>CHECK BOX</th>
                            </tr>
                        </thead>
                        <tbody>
                        <script src="minijs.js"></script>
                                <?php 
                                $res = mysqli_query($connect, "select * from party");
                                while ($row = mysqli_fetch_array($res)){

                            ?>
                            <tr>
                            
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["name"];?></td>
                                
                                <td><?php echo '<img src = "admin/party_icon/'.$row["icon"].'">'; ?> </td>
                                <td><input type="checkbox" class="single-checkbox"  id="Ch" name="optionparty<?php echo $row['id']; ?>"/>    </td>
                                    
                                
                            </tr>
                            <?php
} ?>
<script type="text/javascript">
        var limit = 1;
var checked = 0;
$('.single-checkbox').on('change', function() {
  if($(this).is(':checked'))
    checked = checked+1;

  if($(this).is(':checked') == false)
    checked = checked-1;

  if(checked > limit) {
    this.checked = false;
    checked = limit;
  }
});
    </script>

                            
                            
                            
                        </tbody>
                        
                    </table>
                    <div class="outer button">
                           <button  type="submit" name="submitparty">አስገባ</button>
                       </div>
                       </div> 
                       
                       
                       </form>
          
     
        
     
        
     
         
           
            
            <span></span>
            <span></span>
            
        </div>
        
    </div>
        </section>
</body>
</html>

