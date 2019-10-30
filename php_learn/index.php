<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
</head>
<body>
<form action="insert.php" method="post">
    <p>
        <label for="firstName">First Name:</label>
        <input type="text" name="first_name" id="firstName">
    </p>
    <p>
        <label for="lastName">Last Name:</label>
        <input type="text" name="last_name" id="lastName">
    </p>
    <p>
        <label for="emailAddress">Email Address:</label>
        <input type="text" name="email" id="emailAddress">
    </p>
    <input type="submit" value="Submit">
</form>
</body>
</html>


<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

try{
    $pdo = new PDO("mysql:host=localhost", "root", "");
    
    // Set the PDO error mode to exception
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	// Setting the PDO::ATTR_ERRMODE attribute to PDO::ERRMODE_EXCEPTION tells PDO to throw exceptions whenever a database error occurs.
    
    // Print host information
    echo "Connect Successfully. Host info: " . 
$pdo->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Attempt create database query execution
try{
    $sql = "CREATE DATABASE IF NOT EXISTS demo";
    $pdo->exec($sql);
    echo "<br>Database created successfully";
} catch(PDOException $e){
    die("<br>ERROR: Could not able to execute $sql. " . $e->getMessage());
}

$pdo = null; 
$pdo = new PDO("mysql:host=localhost;dbname=demo", "root", "");

// Attempt create table query execution
try{
    $sql = "CREATE TABLE IF NOT EXISTS persons(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL,
        email VARCHAR(70) NOT NULL UNIQUE
    )";
    $pdo->exec($sql);
    echo "<br>Table created successfully.";
} catch(PDOException $e){
    die("<br>ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Attempt insert query execution. Here's an example, which insert a new row to the persons table by specifying values for the first_name, last_name and email fields.Here's an example, which insert a new row to the persons table by specifying values for the first_name, last_name and email fields:
try{
    $sql = "INSERT INTO persons (first_name, last_name, email) VALUES ('Peter', 'Parker', 'peterparker@mail.com')";
    $pdo->exec($sql);
    echo "<br>Record inserted successfully.";
} catch(PDOException $e){
    die("<br>ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Attempt insert query execution. You can also insert multiple rows into a table with a single insert query at once. To do this, include multiple lists of column values within the INSERT INTO statement, where column values for each row must be enclosed within parentheses and separated by a comma. Let's insert few more rows into the persons table, like this:

try{
    $sql = "INSERT INTO persons (first_name, last_name, email) VALUES
            ('John', 'Rambo', 'johnrambo@mail.com'),
            ('Clark', 'Kent', 'clarkkent@mail.com'),
            ('John', 'Carter', 'johncarter@mail.com'),
            ('Harry', 'Potter', 'harrypotter@mail.com')";
    $pdo->exec($sql);
    echo "<br>Records inserted successfully.";
} catch(PDOException $e){
    die("<br>ERROR: Could not able to execute $sql. " . $e->getMessage());
}





// Close connection
unset($pdo);
?>

