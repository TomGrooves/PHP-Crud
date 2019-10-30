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
</body>
</html>
<?php

  include 'db.php';

// Create a new instance of DB and Connect with user test and pass 1234.
  $database = new DB();
  $conn = $database->Connect("test", 1234);
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
        echo "<br>Records inserted successfully.";
        echo "<a href='../php-crud/index.php'>Return to start</a>";

    }
} catch(PDOException $e){
    die("<br>ERROR: Could not able to execute $sql. " . $e->getMessage());
}
}
?>
</body>
</html>
