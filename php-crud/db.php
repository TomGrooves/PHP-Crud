<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php

class DB
{
    protected $conn = null;

    // En function til at starte connectionen, med $user og $password
    public function Connect($user, $password)
    {
        try {

            $dsn = "mysql:dbname=USER_DB; host=localhost";

            $options  = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false];

            $this->$conn = new PDO($dsn, $user, $password, $options);
            return $this->$conn;

    // Tjek om der er errors
        } catch (PDOException $errorMsg) {
            echo 'Connection error: ' . $errorMsg->getMessage();
        }
    }

    public function Close()
    {
        $this->conn = null;
    }
}

?>
    
</body>
</html>
