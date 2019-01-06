<?php
$materialbez = $_POST['materialbez'];
$status = $_POST['state'];
$datum = $_POST['datum'];
$standort = $_POST['standort'];

/* DB Verbindung herstellen */
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "bergwacht_db");

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)or die(mysql_error());

// Überpruefen ob das Material bereits gibt
 $query1 = "SELECT Bezeichnung FROM tbl_inventar
            WHERE Bezeichnung LIKE '$materialbez'"; 

 $check = mysqli_query($db, $query1); //Query ausführen und ergebnis speichern
 $result = mysqli_num_rows($check); //Prüfen ob Eintrag bereits vorhanden
 
 if ($result) {
     # Material bereits vorhanden
   // @ToDo Ausgabe, das Material bereits vorhanden ist.
    echo "Material bereits vorhanden";
    exit();
    } 
else {
    
     # Material hinzufügen
    $query3="INSERT INTO tbl_inventar
             SET 
             Bezeichnung='$materialbez',
             Status='$status',
             Datum='$datum',
             Standort= '$standort';";
    $eintragen = mysqli_query($db, $query3);

    if($eintragen)
    {
        echo "Das Material wurde hinzugefügt.";
        exit();
    }
    else
    {
        echo "Das Material konnte nicht hinzugefügt werden.";
        exit();
    }
 } 
?>
