<?php
$vorname = $_POST['vorname'];
$nachname = $_POST['name'];
$maid = $_POST['maid'];
$position = $_POST['position'];

/* DB Verbindung herstellen */
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "bergwacht_db");

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)or die(mysql_error());


// Überpruefen ob das Mitglied bereits vorhanden ist
 $query1 = "SELECT mid FROM tbl_mitglied
            WHERE mid LIKE '$maid' 
                  OR mid LIKE '$maid' AND vorname LIKE '$vorname' AND name LIKE '$nachname'"; 
 $check = mysqli_query($db, $query1); //Query ausführen und ergebnis speichern
 $result = mysqli_num_rows($check); //Prüfen ob Eintrag bereits vorhanden
 if ($result) {
     # Mitglied bereits vorhanden
    echo "Mitglied bereits vorhanden. Bitte erneut Daten eingeben.";
    header('location: Registrierung Bergwacht.html');
    exit();
 } else {
     # Mitglied hinzufügen
    $query2="INSERT INTO tbl_mitglied
             SET name='$nachname',
             vorname='$vorname',
             mid='$maid',
             position='$position';";
    $eintragen = mysqli_query($db, $query2);

    if($eintragen)
    {

         # weiterleitung auf die seite nach erfolgreichem login
        header('location: Anmeldung Bergwacht.html');
        exit(1);
    }
    else
    {
         # weiterleitung auf die Registrierungsseite ...
        header('location: Registrierung Bergwacht.html');
        exit();
    }
 }
?>