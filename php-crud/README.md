#CRUD opgave - Create READ from DB with PDO

For at tilslutte din egen database:

#1. Gå til "dbf.php" og find funktionen connect().
#2. Omkring linje 21 skulle du kunne se: $conn = $database->Connect("test", 1234, "USER_DB", "localhost");
#3. Ændre variablerne i Connect() funktionen i forhold til: Connect("username", password, "dbname", "localhost");
#4. Du skulle nu være tilsluttet din egen database. 