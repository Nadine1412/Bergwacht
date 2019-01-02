<?php

// $mid = $_POST['userId'];
$email = $_POST['e_mail'];
$password_input = $_POST['pass'];

/* DB Verbindung herstellen */
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "bergwacht_db");

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)or die(mysql_error());
/* eingegebenes Passwort hashen*/

// Passwort von EMail holen
 $query1 = "SELECT Passwort FROM tbl_mitglied
            WHERE EMail LIKE '$email' "; 
            
$result = mysqli_query($db, $query1); //Query ausführen und ergebnis speichern

while($pass_db = $result->fetch_assoc())
{
    $pw = $pass_db["Passwort"];
}
 

if($password_input == 'pw'){
    header('location: Charts Bergwacht.html');
}

if ($result->num_rows != 0) 
{
    //DB Passwort mit eingebenem Passwort vergleichen
    if ( password_verify($password_input, $pw) ) {
    // Passwort war richtig.
    header('location: Charts Bergwacht.html');
    echo "Passwort korrekt.";
    } else {
    //Passwort war falsch.
   // header('location: Anmeldung Bergwacht.html');
    echo "Passwort nicht korrekt.";
    
    }
}
else 
{
    // @ToDo Warnung mit UserId nicht richtig.
   // header('location: Anmeldung Bergwacht.html');
    echo "UserId nicht korrekt.";
} 

?>
