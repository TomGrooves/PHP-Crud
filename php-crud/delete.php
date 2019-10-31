
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <title>CRUD</title>

</head>
<body>

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

    echo "<h3 class='center'>Brugeren er fjernet fra databasen</h3>";

    echo "<div class='center-div2'><a href='../php-crud/index.php'><button class='buttonInput havartiOst'>Tilbage til start</button></a></div>";
}

else{

    $dataRes = $conn->query("SELECT * FROM Users WHERE id = $dataID");
    $dataAll = $dataRes->fetchAll();
    $confirm = false;
    
    // View

    echo "<div class='center-div2'><h2>Bekræft sletning</h2>";
    echo "<p class='center'>Er du sikker på at du vil slette: ";
    foreach ($dataAll as $row){
        
        echo ($row['username']);
        

    }
    echo " ?</p>
    <br><br>"; 
    

    echo "<div><h2>Brugernavn</h2>";
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

    echo "<div class='create3'><a class='center-div1' name='delete' href='../php-crud/delete.php?ID=".$row['id']."&confirmed=true'><button style='margin-bottom:1%;' class='buttonInput2'>Fjern bruger</button></a></div>";
    echo "<div class='center-div1'><a href='../php-crud/index.php'><button class='buttonInput havartiOst'>Tilbage til start</button></a></div></div>";

    }
}


?>
</body>
</html>