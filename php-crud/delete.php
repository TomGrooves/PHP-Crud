
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    echo "User has been deleted";
    echo "<a href='../php-crud/index.php'>Return to start</a>";
}

else{

    $dataRes = $conn->query("SELECT * FROM Users WHERE id = $dataID");
    $dataAll = $dataRes->fetchAll();
    $confirm = false;
    
    // View
    echo "<div><h2>Confirm deletion</h2>
    <p>Are you sure want to delete this user</p>
    <br><table><tr><td>"; 
    
    foreach ($dataAll as $row){
       echo ($row['username']." " .$row['email']." ".$row['password']);
    }
    
    echo "</td></tr></table>";
    
    // HER SKAL INDSÆTTES CONFIRMED VALUE
    echo "<a name='delete' href='../php-crud/delete.php?ID=".$row['id']."&confirmed=true'>Delete</a>";
    }
    
}


?>
</body>
</html>