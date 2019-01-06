<?php

$selectedMid = $_POST["Mitgliedloeschen"];

/* DB Verbindung herstellen */
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "bergwacht_db");

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)or die(mysql_error());

 //Mitglieder löschen
 $query1 ="DELETE FROM tbl_mitglied WHERE M_ID LIKE '$selectedMid' ";

$result = mysqli_query($db, $query1);

if($result)
{
     # Weiterleitung auf die Mitglied löschen Seite;
    header('location: Mitglied loeschen.php');
    exit(1);

}
else{
    echo("Löschen fehlgeschlagen.");
}

?>