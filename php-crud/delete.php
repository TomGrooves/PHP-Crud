
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<body>

<!-- <form>
    <label>Name</label>
    <input name="name"><input>

    <label>Email</label>
    <input name="email"><input>

    <label>Password</label>
    <input name="password"><input>
</form> -->


<?php

/* Delete page:  
"Tag data fra formen og send det ind i en ny form i delete.php." 
"create to knapper "accept og cancel" If "Accept then do { open underside med confirm og if accept så slet data}.  */

include 'db.php';

// Create a new instance of DB and Connect with user test and pass 1234.
  $database = new DB();
  $conn = $database->Connect("test", 1234);
  if ($conn){
    //echo "Connected to the database";

// Server
$dataID = $_GET['ID'];

if ($_GET['confirmed']){
    $conn->query("DELETE FROM Users WHERE id = $dataID");
    echo "<h3 class='center'>User has been deleted</h3>";
    echo "<div class='center-div2'><a href='../php-crud/index.php'><button class='buttonInput havartiOst'>Tilbage til start</button></a></div>";
}

else{

    $dataRes = $conn->query("SELECT * FROM Users WHERE id = $dataID");
    $dataAll = $dataRes->fetchAll();
    $confirm = false;
    
    // View
    echo "<div class='center-div'><h2>Confirm deletion</h2>
    <p class='center'>Are you sure want to delete this user</p>
    <br><br>"; 
    echo "<div><h2>Username</h2>";
    foreach ($dataAll as $row){
        echo '<div class="center">';
       echo ($row['username']);
       echo '</div>';
    }
    
    echo "</div><div><h2>Email</h2>";
    foreach ($dataAll as $row){
        echo '<div class="center">';
       echo ($row['email']);
       echo '</div>';
    }
    echo "</div><div><h2>Password</h2>";
    foreach ($dataAll as $row){
        echo '<div class="center">';
       echo ($row['passwrd']);
       echo '</div>';
    }

    echo "</div>";
    
    // HER SKAL INDSÆTTES CONFIRMED VALUE
    echo "<div class='create2'><a class='center-div2' name='delete' href='../php-crud/delete.php?ID=".$row['id']."&confirmed=true'><button class='buttonInput2'>Delete</button></a></div>";
    }
    
}


?>
</body>
</html>