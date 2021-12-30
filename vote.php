<?php
include("include/connect.php");


session_start();
if(isset($_SESSION["id"])){
    echo("<br>");

}


else {
  header("location:register.php");
}


if(isset($_POST['submit'])) {
    $resr = mysqli_query($connect, "select * from reigional_c");
    while ($rowr = mysqli_fetch_assoc($resr)){
        if(isset($_POST['option'.$rowr['id']])){
            $id = $rowr['id'];
            mysqli_query($connect,"update reigional_c set result = result + 1 where id = '$id'");
            header("location:thanks.php");
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
    <title>Vote</title>
    <link rel="stylesheet" href="votee.css">
</head>
<body>
<section class="table">
<div class="column">
          
          <h1 class="word">እንኳን ደህና መጡ!</h1>
          <h1 class="word2">እባክዎን በሕጉ መሠረት ድምጽዎን ይስጡ! </h1>
<!-- second table -->
<form method="POST" enctype="multipart/form-data">
          
          <table>
              <h1 >የክልል ምክርቤት ተወዳዳሪዎች</h1>
              <h3>መምረጥ ያለቦት 5 አጩ ብቻ</h3>
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
                              $resr = mysqli_query($connect, "select * from reigional_c");
                              while ($rowr = mysqli_fetch_array($resr)){

                          ?>
                          <tr>
                          
                              <td><?php echo $rowr["id"]; ?></td>
                              <td><?php echo $rowr["name"];?></td>
                              
                              <td><?php echo '<img src = "admin/party_icon/'.$rowr["icon"].'">'; ?> </td>
                              <td><input type="checkbox" class="single-checkbox" id="Ch" name="option<?php echo $rowr['id']; ?>"/>    </td>
                              
                          </tr>
                          <?php 
                          
                      
                              } ?>

<script type="text/javascript">
        var limit = 5;
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
          <div class="center">
              <div class="outer button">
          <button type="submit" name="submit">አስገባ</button>
          </form>
          <span></span>
          <span></span>
          
      </div>
      
  </div>
      </section>
</body>
</html>