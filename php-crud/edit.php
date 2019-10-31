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
<h2>Rediger Bruger</h2>
<div class="center-div1">
<form class="theForm" action="" method="post">
    
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <label for="password">Password:</label>
        <input type="text" name="password" id="password">
        <label for="emailaddress">Email:</label>
        <input type="text" name="email" id="email">
    
    <input class="formButton" type="submit" value="Submit">
</form>
</div>

<?php

//Edit Page:

//"Form med data fra bruger valgt." 
include 'db.php';


// Create a new instance of DB and Connect with user test and pass 1234.
  $database = new DB();
  $conn = $database->Connect("test", 1234);

// Server
$dataID = $_GET['ID'];

try  {
     // HVIS DE 3 INPUTS ER INDTASTET
     $res = $conn->query("SELECT username FROM Users WHERE id= $dataID");
     $data = $res->fetchAll();

     foreach($data as $row){
        echo "<div class='center-div1' style='margin-top:-15px'>Brugeren med navnet: ".$row['username']." redigeres";
        echo "<div class='center-div1'><a href='../php-crud/index.php'><button class='buttonInput havartiOst'>Tilbage til start</button></a></div></div>";
   
    }
    // echo "Opdater bruger med navnet:".
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) 
    {  
        // HER SÆTTER VI VARIABLERNE TIL AT VÆRE DET VI MODTAGER I INPUTS'NE
        $name = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        // QUERY MED NAMED PLACEHOLDERS
        $sql = "UPDATE Users SET username = :username, email = :email, passwrd = :passwrd WHERE id= $dataID";
        
   $statement = $conn->prepare($sql);
   $statement->execute(array(':email' => $email, ':passwrd' => $password, ':username' => $name));
    echo "Bruger-id'et: ".$dataID." er opdateret";
    echo "<div class='center-div2'><a href='../php-crud/index.php'><button class='buttonInput havartiOst'>Tilbage til start</button></a></div>";

    }    
 }
 
 catch(PDOException $e)
{ echo "Tilslutningsfejl: " . $e->getMessage();}
  

?>
</body>
</html>

