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

    if ($_POST['selection'] == "disconnect"){
      $option = 0;
      echo "Connection closed";
      $conn = $database->Close();
    }
  
  // Check what user has selected in selection box
    if ($_POST['selection'] == "getusers"){
      $option = 0;
    }
    if ($_POST['selection'] == "getpass"){
      $option = 1;
    }
    if ($_POST['selection'] == "getid"){
      $option = 2;
    }
    if ($_POST['selection'] == "getemail"){
      $option = 3;
    }
    
  // Switch on Option variable. 

  switch ($option){
  
  //Case 0
      case 0:
      $res = $conn->query("SELECT username FROM Users");
      $data = $res->fetchAll();
  
      echo ('<h2>All user names</h2>');     
      foreach($data as $row){
        echo ($row['username']." "."<br>");
      }
      break;

  //Case 1
      case 1: 
      $res = $conn->query('SELECT passwrd FROM Users');
      $data = $res->fetchAll();
      
      echo ('<h2>All user passwords</h2>');     
      foreach($data as $row){
        echo ($row['passwrd']." "."<br>");
      }
      break;
    
  //Case 2
      case 2: 
      $res = $conn->query('SELECT id FROM Users');
      $data = $res->fetchAll();
      
      echo ('<h2>All user ID\'s</h2>');     
      foreach($data as $row){
        echo ($row['id']." "."<br>");
      }
      break;
      
  //Case 3
      case 3: 
      $res = $conn->query('SELECT email FROM Users');
      $data = $res->fetchAll();
  
      echo ('<h2>All user emails</h2>');     
      foreach($data as $row){
        echo ($row['email']." "."<br>");
      } 
      break;
    }
  }

  else {
    echo
     $conn;
   }
  

   // Function not working
  function checkOption($selected){

    $res = $conn->query('SELECT '.".$selected. ".'FROM Users');
    $data = $res->fetchAll();

    echo ('<h2>All users</h2>');     
    foreach($data as $row){
      echo ($row['id']." " . $row['username']." " .$row['email']." ".$row['password']." "."<br>");
    }

  }

?>
 </body>

 </html>
