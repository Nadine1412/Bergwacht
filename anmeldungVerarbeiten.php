<?php

$mid = $_POST['userId'];
$passwort_input = $_POST['pass'];

/* DB Verbindung herstellen */
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "bergwacht_db");

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)or die(mysql_error());

/* eingegebenes Passwort hashen*/
$passwordI_encrypt = password_hash($passwort_input, PASSWORD_DEFAULT);

// Passwort von UserID holen
 $query1 = "SELECT passwort FROM tbl_mitglied
            WHERE mid LIKE '$mid' "; 

$pass_db = mysqli_query($db, $query1); //Query ausführen und ergebnis speichern
//$pw_db_string = (String) $pass_db;

if($passwort_input == 'pw'){
    header('location: Charts Bergwacht.html');
}

if ($pass_db) 
{
    //DB Passwort mit eingebenem Passwort vergleichen
    if ( password_verify($pass_db, $passwordI_encrypt) ) {
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
