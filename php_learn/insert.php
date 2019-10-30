<!-- When a user clicks the submit button of the add record HTML form, in the example above, the form data is sent to 'insert.php' file. The 'insert.php' file connects to the MySQL database server, retrieves forms fields using the PHP $_REQUEST variables and finally execute the insert query to add the records. Here is the complete code of our 'insert.php' file: -->

<?php

// include 'index.php';

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    $pdo = new PDO("mysql:host=localhost;dbname=demo", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
// Attempt insert query execution
try{
    // Create prepared statement
    $sql = "INSERT INTO persons (first_name, last_name, email) VALUES (:first_name, :last_name, :email)";
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':first_name', $_REQUEST['first_name']);
    $stmt->bindParam(':last_name', $_REQUEST['last_name']);
    $stmt->bindParam(':email', $_REQUEST['email']);
    
    // Execute the prepared statement
    $stmt->execute();
    echo "<br>Records inserted successfully.";
} catch(PDOException $e){
    die("<br>ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);
?>


