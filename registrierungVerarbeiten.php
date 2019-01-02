<?php
$vorname = $_POST['vorname'];
$nachname = $_POST['name'];
$birthday = $_POST['birthday'];
$email = $_POST['email'];
// $maid = $_POST['maid'];
// $position = $_POST['position'];
$password = $_POST['password'];
$password_encrypt = password_hash($password, PASSWORD_DEFAULT);

/* DB Verbindung herstellen */
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "bergwacht_db");

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)or die(mysql_error());


// Überpruefen ob das Mitglied bereits vorhanden ist
 $query1 = "SELECT EMail FROM tbl_mitglied
            WHERE EMail LIKE '$email'"; 
                //    OR mid LIKE '$maid' AND vorname LIKE '$vorname' AND name LIKE '$nachname'"; 
 $check = mysqli_query($db, $query1); //Query ausführen und ergebnis speichern
 $result = mysqli_num_rows($check); //Prüfen ob Eintrag bereits vorhanden
 
 if ($result) {
     # Mitglied bereits vorhanden
   // @ToDo Ausgabe, dass Mitglied bereits vorhanden ist.
    header('location: Registrierung Bergwacht.html');
    exit();
 } else {
     # Mitglied hinzufügen
    $query2="INSERT INTO tbl_mitglied
             SET Name='$nachname',
             Vorname='$vorname',
            -- Birthday='$birthday',
             EMail= '$email',
            --  mid='$maid',
            --  position='$position',
             Passwort='$password_encrypt';";
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
