  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>


<?php
//Edit Page:

include 'db.php';

  if($pdo){
      
    $stmt = $pdo->query('SELECT * FROM data');
    $data = $stmt->fetchAll();
    }


// PDO connection Config  data der hjælper med at connecte til database
// database info
$host="localhost";
$dbName="user";
$user = "root";
$password = "";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false];

//"Form med data fra bruger valgt." 

echo '
    <form method="POST" style="display:grid; width: 10%;">
    <input  name="name" placeholder="Name" type="text" />
    <input  name="email" placeholder="E-mail" type="text" />
    <input  name="password" placeholder="Password" type="text" />
    <form method="POST" style="display:grid; width: 10%;">
    <input  type="submit" value="Accept" />
    <input  type="submit" value="Delete" />

    </form>
    ';

    try  {
    $pdo = new PDO("mysql:host=".$host.";dbName=".$dbName, $user, $password, $options);
        // HVIS DE 3 INPUTS ER INDTASTET
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) 
    {  
        // HER SÆTTER VI VARIABLERNE TIL AT VÆRE DET VI MODTAGER I INPUTS'NE
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // QUERY MED NAMED PLACEHOLDERS
        $sql = "UPDATE user SET email = :email, password = :password WHERE name = :name";
        
   $statement = $pdo->prepare($sql);
   $statement->execute(array(':email' => $email, ':password' => $password, ':name' => $name));

    echo "Bruger-id'et: ".$name." fik ændret sin alder til: ".$email." og sin by til: ".$password;
    }    
 }

 // set the PDO error mode to exception
catch(PDOException $e)
{ echo "Tilslutningsfejl: " . $e->getMessage();
    
}
?>
</body>
</html>