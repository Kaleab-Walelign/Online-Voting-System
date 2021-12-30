<?php

include("../include/connect.php");
session_start();
if(isset($_SESSION["id"])){
    echo("<br>");
} else {
  header("location:login.php");
}
?>


<?php

if (isset($_POST["submit"])){
    $image = $_FILES['icon']['name'];
    $target = "party_icon/".basename($image);

    mysqli_query($connect, "insert into party(name,icon) values ('$_POST[name]', '$image')");
    move_uploaded_file($_FILES['icon']['tmp_name'], $target);
    echo"<script>alert('Inserted Success Fully')</script>";
}

if(isset($_POST["delete"])){

    mysqli_query($connect, "DELETE FROM party WHERE name =  '$_POST[name]'");
    echo"<script>alert('Deleted Success Fully')</script>";
    
}
if(isset($_POST["update"])){
    $imageu = $_FILES['icon']['name'];
    $targetu = "party_icon/".basename($imageu);

    mysqli_query($connect, "update party set name = '$_POST[for_update]', icon = '$imageu' where name = '$_POST[name]'");
    echo"<script>alert('Updated Success Fully')</script>";
    move_uploaded_file($_FILES['icon']['tmp_name'], $targetu);
    
    
}

// For regional_council

if (isset($_POST["submitr"])){
    $imager = $_FILES['iconr']['name'];
    $targetr = "party_icon/".basename($imager);

    mysqli_query($connect, "insert into reigional_c(name,icon) values ('$_POST[namer]', '$imager')");
    move_uploaded_file($_FILES['iconr']['tmp_name'], $targetr);
    echo"<script>alert('Inserted Success Fully')</script>";
}

if(isset($_POST["deleter"])){

    mysqli_query($connect, "DELETE FROM reigional_c WHERE name =  '$_POST[namer]'");
    echo"<script>alert('Deleted Success Fully')</script>";
    
}
if(isset($_POST["updater"])){
    $imageur = $_FILES['iconr']['name'];
    $targetur = "party_icon/".basename($imageur);

    mysqli_query($connect, "update party set name = '$_POST[for_updater]', icon = '$imageur' where name = '$_POST[namer]'");
    echo"<script>alert('Updated Success Fully')</script>";
    move_uploaded_file($_FILES['iconr']['tmp_name'], $targetur);
    
    
}

//For news
if (isset($_POST["submitn"])){
    $imagen = $_FILES['imagen']['name'];
    $targetr = "../all_images".basename($imagen);

    mysqli_query($connect, "insert into news(title,content,image) values ('$_POST[title]','$_POST[content]', '$imagen')");
    move_uploaded_file($_FILES['imagen']['tmp_name'], $targetr);
    echo"<script>alert('Inserted Success Fully')</script>";
}

if(isset($_POST["deleten"])){

    mysqli_query($connect, "DELETE FROM news WHERE name =  '$_POST[title]'");
    echo"<script>alert('Deleted Success Fully')</script>";
    
}
if(isset($_POST["updaten"])){
    $imageurn = $_FILES['imagen']['name'];
    $targetur = "../all_images".basename($imageurn);

    mysqli_query($connect, "update news set title = '$_POST[for_updatetn]',content = '$_POST[for_updatetnc]', image = '$imageurn' where title = '$_POST[title]'");
    echo"<script>alert('Updated Success Fully')</script>";
    move_uploaded_file($_FILES['imagen']['tmp_name'], $targetur);
    
    
}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin</title>
</head>
<body>
    <h1> Admin Page </h1>
    <div class="hole">
    <!-- hr -->
    <div class="container">
    
    <form action="" method="post" enctype="multipart/form-data">
    <h3>HR</h3>
    <table>
        <tr>
            <td>Name</td>    
            <td> <input type="text" name="name"> </td>
        </tr>
        <tr>
               
            <td colspan="3"> <input type="text" name="for_update" placeholder="for update" class="update"> </td>
        </tr>

        <tr>
            <td>Icon</td>    
            <td> <input type="file" name="icon" > </td>
        </tr>

        <tr>
            <td colspan="2" align="center"> <input type="submit" name="submit" value="insert">
                                            <input type="submit" name="delete" value="delete"> 
                                            <input type="submit" name="update" value="update">                                          
                                            <input type="submit" name="display" value="display">
                                            <input type="submit" name="search" value="search"></td>
        </tr>
        
    </table>
    </form>
    


    



    <?php



if(isset($_POST["display"])){

    $res = mysqli_query($connect, "select * from party");
    echo "<table border=1>";
    
        echo "<tr>";
        echo "<th>"; echo "ID";  echo "</th>";
        echo "<th>"; echo "Name";  echo "</th>";
        echo "<th>"; echo "Icon";  echo "</th>";
        echo "<th>"; echo "Result";  echo "</th>";
        echo "</tr>";


    while ($row = mysqli_fetch_array($res)){
        echo "<tr>";
        echo "<td>"; echo $row["id"];  echo "</td>";
        echo "<td>"; echo $row["name"];  echo "</td>";
        echo "<td>"; echo $row["icon"];  echo "</td>";
        echo "<td>"; echo $row["result"];  echo "</td>";
        echo "</tr>";

    }
    echo "</table>";   
}


if(isset($_POST["search"])){

    $res = mysqli_query($connect, "select * from party where name = '$_POST[name]'");
    echo "<table border=1>";
    
        echo "<tr>";
        echo "<th>"; echo "ID";  echo "</th>";
        echo "<th>"; echo "Name";  echo "</th>";
        echo "<th>"; echo "Icon";  echo "</th>";
        echo "<th>"; echo "Result";  echo "</th>";
        echo "</tr>";


    while ($row = mysqli_fetch_array($res)){
        echo "<tr>";
        echo "<td>"; echo $row["id"];  echo "</td>";
        echo "<td>"; echo $row["name"];  echo "</td>";
        echo "<td>"; echo $row["icon"];  echo "</td>";
        echo "<td>"; echo $row["result"];  echo "</td>";
        echo "</tr>";

    }
    echo "</table>";   
}



    ?>
    </div>
    <!-- regional -->
    <div class="container">

<form action="" method="post" enctype="multipart/form-data">
    <h3>Regional Council Candidate</h3>
    <table>
        <tr>
            <td>Name</td>    
            <td> <input type="text" name="namer"> </td>
        </tr>
        <tr>
               
            <td colspan="3"> <input type="text" name="for_updater" placeholder="for update" class="update"> </td>
        </tr>

        <tr>
            <td>Icon</td>    
            <td> <input type="file" name="iconr" > </td>
        </tr>

        <tr>
            <td colspan="2" align="center"> <input type="submit" name="submitr" value="insert">
                                            <input type="submit" name="deleter" value="delete"> 
                                            <input type="submit" name="updater" value="update">                                          
                                            <input type="submit" name="displayr" value="display">
                                            <input type="submit" name="searchr" value="search"></td>
        </tr>
        
    </table>
    </form>
    
    <?php



if(isset($_POST["displayr"])){

    $resr = mysqli_query($connect, "select * from reigional_c");
    echo "<table border=1>";
    
        echo "<tr>";
        echo "<th>"; echo "ID";  echo "</th>";
        echo "<th>"; echo "Name";  echo "</th>";
        echo "<th>"; echo "Icon";  echo "</th>";
        echo "<th>"; echo "Result";  echo "</th>";
        echo "</tr>";


    while ($rowr = mysqli_fetch_array($resr)){
        echo "<tr>";
        echo "<td>"; echo $rowr["id"];  echo "</td>";
        echo "<td>"; echo $rowr["name"];  echo "</td>";
        echo "<td>"; echo $rowr["icon"];  echo "</td>";
        echo "<td>"; echo $rowr["result"];  echo "</td>";
        echo "</tr>";

    }
    echo "</table>";   
}


if(isset($_POST["searchr"])){

    $resr = mysqli_query($connect, "select * from reigional_c where name = '$_POST[namer]'");
    echo "<table border=1>";
    
        echo "<tr>";
        echo "<th>"; echo "ID";  echo "</th>";
        echo "<th>"; echo "Name";  echo "</th>";
        echo "<th>"; echo "Icon";  echo "</th>";
        echo "<th>"; echo "Result";  echo "</th>";
        echo "</tr>";


    while ($rowr = mysqli_fetch_array($resr)){
        echo "<tr>";
        echo "<td>"; echo $rowr["id"];  echo "</td>";
        echo "<td>"; echo $rowr["name"];  echo "</td>";
        echo "<td>"; echo $rowr["icon"];  echo "</td>";
        echo "<td>"; echo $rowr["result"];  echo "</td>";
        echo "</tr>";

    }
    echo "</table>";   
}


    ?>
    </div>


    
    




<!-- news -->
<div class="container">

<form action="" method="post" enctype="multipart/form-data">
    <h3>News</h3>
    <table>
        <tr>
            <td>title</td>    
            <td> <input type="text" name="title"> </td>
        </tr>
        <tr>
               
            <td colspan="3"> <input type="text" name="for_updatetn" placeholder="for update title" class="update"> </td>
        </tr>
        <tr>
            <td>Content</td>    
            <td> <input type="text" name="content"> </td>
        </tr>
        <tr>
               
            <td colspan="3"> <input type="text" name="for_updatetnc" placeholder="for update content" class="update"> </td>
        </tr>

        <tr>
            <td>image</td>    
            <td> <input type="file" name="imagen" > </td>
        </tr>

        <tr>
            <td colspan="2" align="center"> <input type="submit" name="submitn" value="insert">
                                            <input type="submit" name="deleten" value="delete"> 
                                            <input type="submit" name="updaten" value="update">                                          
                                            <input type="submit" name="displayn" value="display">
                                            <input type="submit" name="searchn" value="search"></td>
        </tr>
        
    </table>
    </form>
    
    <?php



if(isset($_POST["displayn"])){

    $resr = mysqli_query($connect, "select * from news");
    echo "<table border=1>";
    
        echo "<tr>";
        echo "<th>"; echo "ID";  echo "</th>";
        echo "<th>"; echo "title";  echo "</th>";
        echo "<th>"; echo "content";  echo "</th>";
        echo "<th>"; echo "image";  echo "</th>";
        echo "</tr>";


    while ($rowr = mysqli_fetch_array($resr)){
        echo "<tr>";
        echo "<td>"; echo $rowr["id"];  echo "</td>";
        echo "<td>"; echo $rowr["title"];  echo "</td>";
        echo "<td>"; echo $rowr["content"];  echo "</td>";
        echo "<td>"; echo $rowr["image"];  echo "</td>";
        echo "</tr>";

    }
    echo "</table>";   
}


if(isset($_POST["searchn"])){

    $resr = mysqli_query($connect, "select * from news where title = '$_POST[title]'");
    echo "<table border=1>";
    
        echo "<tr>";
        echo "<th>"; echo "ID";  echo "</th>";
        echo "<th>"; echo "title";  echo "</th>";
        echo "<th>"; echo "content";  echo "</th>";
        echo "<th>"; echo "image";  echo "</th>";
        echo "</tr>";


    while ($rowr = mysqli_fetch_array($resr)){
        echo "<tr>";
        echo "<td>"; echo $rowr["id"];  echo "</td>";
        echo "<td>"; echo $rowr["title"];  echo "</td>";
        echo "<td>"; echo $rowr["content"];  echo "</td>";
        echo "<td>"; echo $rowr["image"];  echo "</td>";
        echo "</tr>";

    }
    echo "</table>";   
}


    ?>
    </div>
   <!-- Contact Us -->

    <div class="container">

<form action="" method="post" enctype="multipart/form-data">
    <h3>From Contact Page</h3>
    <table>
        
        <?php 
                                $res = mysqli_query($connect, "select * from contact");
                                while ($row = mysqli_fetch_array($res)){  ?>
                                <p>
        <tr>
        <p> <strong>First name:</strong> <?php echo $row["first_name"]; ?></p>
        </tr>
        <tr>
        <p> <strong>Last name:</strong> <?php echo $row["last_name"]; ?></p>
        </tr>
        <tr>
           <p> <strong>email:</strong> <?php echo $row["email"]; ?></p>
        </tr>
        <tr>
        <p> <strong>Subject:</strong> <?php echo $row["subject"]; ?></p>
        </tr>
        <br><br><br>
        <?php
} ?></p>

        <tr>
            <td colspan="2" align="center"> 
                                            </td>
        </tr>
        
    </table>
    </form>
    
  




    </div>
    <form action="logout.php">

    <input type="submit" value="Logout">
</form>

</div>


</body>
</html>