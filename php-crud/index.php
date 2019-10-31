 <!DOCTYPE html>
 <html lang="en">

<head>
     <meta charset="UTF-8">
     <title>CRUD</title>
     <meta name="description" content="DESCRIPTION">
     <link rel="stylesheet" href="style.css">
     <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

 </head>

 <body>

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


    echo '<h2>CRUD Brugerstyrings system</h2><br>';     

    echo "<div class='grid'> ";
    
    echo "<div class='holder'><h3>ID</h3>";
    foreach ($data as $row){
    echo "<div class='center'>".$row['id']."</div>";
  }
  echo "</div>"; 


    echo "<div class='holder'><h3>Brugernavn</h3>";

    foreach ($data as $row){
    echo "<div class='center'>".$row['username']."</div>";
    }
    echo "</div>";
    
    echo "<div class='holder'><h3>Email</h3>";
    foreach ($data as $row){
      echo "<div class='center'>".$row['email']."</div>";
    }
    echo "</div>";

    echo "<div class='holder'><h3>Password</h3>";
    foreach ($data as $row){
      echo "<div class='center'>".$row['passwrd']."</div>";
    }
    echo "</div>";

    echo "<div class='holder'><h3>Rediger</h3>";
    foreach ($data as $row){
    echo "<div><a name='edit' href='../php-crud/edit.php?ID=".$row['id']."'><button class='buttonInput'>Rediger</button></a></div>";
    }
    echo "</div>";

    echo "<div class='holder'><h3>Fjern</h3>";
    foreach ($data as $row){
    echo "<div><a name='delete'  href='../php-crud/delete.php?ID=".$row['id']."'><button class='buttonInput'>Fjern</button></a></div>";
    }
    echo" 
    </div></div>";
    echo "<div class='create'> <a name='edit' href='../php-crud/add.php'><button class='createButton'>Opret ny bruger</button></a></div>";

  }

?>
 </body>

 </html>