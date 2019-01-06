<?php
$materialbez = $_POST['materialbez'];
$status = $_POST['status'];
$datum = $_POST['datum'];
$standort = $_POST['standort'];

/* DB Verbindung herstellen */
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "bergwacht_db");

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)or die(mysql_error());

// material löschen
 $query1 = "Delete tbl_inventar 
            WHERE bezeichnung= '$materialbez'"; 

 $check = mysqli_query($db, $query1); //Query ausführen und ergebnis speichern

    if($check)
    {
        # Weiterleitung auf die Profil anzeigen Seite;
        header('location: Inventar anzeigen.php');
        exit(1);

    }
    else
    {
        echo "Das Material konnte nicht gelöscht werden.";
        header('location: Inventar löschen.php');
        exit();
    }
 } 
?>
