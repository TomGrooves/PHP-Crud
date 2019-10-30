<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <p>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
    </p>
    <p>
        <label for="password">Password:</label>
        <input type="text" name="password" id="password">
    </p>
    <p>
        <label for="emailaddress">Email:</label>
        <input type="text" name="email" id="email">
    </p>
    
    <input type="submit" value="Submit">
</form>

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
    echo "<a href='../php-crud/index.php'>Retuner til start</a>";

    }    
 }
 
 catch(PDOException $e)
{ echo "Tilslutningsfejl: " . $e->getMessage();}
  

?>
</body>
</html>

