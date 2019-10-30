 <!DOCTYPE html>
 <html lang="en">

<head>
     <meta charset="UTF-8">
     <title>CRUD</title>
     <meta name="description" content="DESCRIPTION">
     <link rel="stylesheet" href="style.css">
     <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
 </head>

 <body>

<div class="main">
<div class="sidebar">
<form method="post" action="">
  <select name="selection">
  <option value="getusers">Fetch Usernames</option>
  <option value="getid">Fetch ID's</option>
  <option value="getpass">Fetch Passwords</option>
  <option value="getemail">Fetch Emails</option>
  <option value="disconnect">Disconnect</option>
  <!--<input placeholder="type something here" value="input">-->
  <input type="submit" name="submit" value="Submit" />
  </select>
</form>
</div>
<div class="main-container"></div>

</div>

<?php


//Landing page:   

//"Create table med data"  

//"To buttons ud for hvert row" 

//"a tags med links ved onclick"  

//"button til at lave new user."  


include 'db.php';

// Create a new instance of DB and Connect with user test and pass 1234.
  $database = new DB();
  $conn = $database->Connect("test", 1234);
  if ($conn){
    echo "Connected to the database";

    $res = $conn->query('SELECT * FROM Users');
    $data = $res->fetchAll();

    echo '<h2>All users</h2><br><table>';     
    foreach($data as $row){
      echo "<tr><td>";
      echo ($row['id']." " . $row['username']." " .$row['email']." ".$row['password']." "."<a name='edit' href='../php-crud/edit.php?ID=".$row['id']."'>Edit</a><a name='delete'  href='../php-crud/delete.php?ID=".$row['id']."'>Delete</a>");
      echo "</td></tr>";
    }
    echo "</table>";
    echo "<a name='edit' href='../php-crud/add.php'>Create new user</a>";
  }
?>
 </body>

 </html>
