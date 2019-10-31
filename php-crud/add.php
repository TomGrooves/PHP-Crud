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
<h2>Ny Bruger</h2>
<div class="center-div2">
<form class="theForm" action="" method="post">
    
        <label for="username">Brugernavn:</label>
        <input placeholder="indtast brugernavn" type="text" name="username" id="username">
        <label for="password">Password:</label>
        <input placeholder="indtast password" type="text" name="password" id="password">
        <label for="emailaddress">Email:</label>
        <input placeholder="indtast email" type="text" name="email" id="email">
    
    <input class="formButton" type="submit" value="Opret bruger">
</form>

</body>
</html>
<?php

  include 'db.php';

// Create a new instance of DB and Connect with user test and pass 1234.
  $database = new DB();
  $conn = $database->Connect("test", 1234, "USER_DB", "localhost");
  if ($conn){
    //echo "Connected to the database";

// Attempt insert query execution
try{
    // Create prepared statement
    $sql = "INSERT INTO Users (username, email, passwrd) VALUES (:username_var, :password_var, :email_var)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':username_var', $_POST['username']);
    $stmt->bindParam(':password_var', $_POST['password']);
    $stmt->bindParam(':email_var', $_POST['email']);
    
    // Execute the prepared statement
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
        $stmt->execute();
        echo "<br><div class='center-div1' >Brugeren er tilføjet til databasen.";
        echo "<div class='center-div1' style='margin-top: -50px;'><a href='../php-crud/index.php'><button class='buttonInput havartiOst' style='margin-top: 15%;margin-bottom: 5%;'>Tilbage til start</button></a></div></div>";

    }
    else{
        echo "<br><div class='center-div1' >Indtast nye brugeroplysninger.";
        echo "<div class='center-div1' style='margin-top: -20px;'><a href='../php-crud/index.php'><button class='buttonInput havartiOst' style='margin-top: 15%;margin-bottom: 5%;'>Tilbage til start</button></a></div></div>";

    }
} catch(PDOException $e){
    die("<br>ERROR: Could not able to execute $sql. " . $e->getMessage());
}
}
?>
</div>
</body>
</html>
