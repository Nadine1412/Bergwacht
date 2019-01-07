<?php
$bezeichnung = $_POST['bezeichnung'];


/* DB Verbindung herstellen */
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "bergwacht_db");

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)or die(mysql_error());

// Ausbildung hinzufügen
 $query1 = "INSERT INTO tbl_ausbildung
            SET Ausbildungsbezeichnung = '$bezeichnung';"; 

 $check = mysqli_query($db, $query1); //Query ausführen und ergebnis speichern

    if($check)
    {
        # Weiterleitung auf die Profil anzeigen Seite;
        header('location: Ausbildung anzeigen.php');
        exit(1);

    }
    else
    {
        echo "Das Material konnte nicht gelöscht werden.";
        header('location: Ausbildung anlegen.php');
        exit();
    }
 
?>
