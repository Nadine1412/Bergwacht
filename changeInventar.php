<?php

//Session starten
session_start();

$materialbez = $_POST['matbez'];
$status = $_POST['status'];
$datum = $_POST['datum'];
$standort = $_POST['standort'];


$_SESSION["matbez"] = $materialbez;
$_SESSION["userName"] = $status;
$_SESSION["userBirthday"] = $datum;
$_SESSION["userEMail"] = $standort;


/* DB Verbindung herstellen */
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "bergwacht_db");

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)or die(mysql_error());

// material in Datenbank updaten
 $query1 = "UPDATE tbl_inventar 
            SET 
                Status='$status',
                Datum='$datum',
                Standort='$standort',
            WHERE Bezeichnung= '$materialbez'"; 

 $check = mysqli_query($db, $query1); //Query ausführen und ergebnis speichern

    if($check)
    {
        # Weiterleitung auf die Profil anzeigen Seite;
        header('location: Inventar anzeigen.php');
        exit(1);

    }
    else
    {
        echo "Das Material konnte nicht hinzugefügt werden.";
        header('location: Inventar ändern.php');
        exit();
    }
 
?>

