<?php
$vorname = $_POST['vorname'];
$nachname = $_POST['name'];
$birthday = $_POST['birthday'];
$email = $_POST['email'];
$selectedRole = $_POST['roles'];
$state = $_POST['state'];

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
    echo "Email bereits vorhanden";
    exit();
    } else {
    // Aus der Datenbank wird zur zugehörigen Rolle die passende Rollen ID herausgesucht, um es später dem Mitarbeiter zuweisen zu können
    $query2 = "SELECT R_ID FROM tbl_rolle
    WHERE Rolle LIKE '$selectedRole'";

    $r_id_result = mysqli_query($db, $query2);

    while($r_id_db = $r_id_result->fetch_assoc())
    {
    $selectedRoleID = $r_id_db["R_ID"];
    }

     # Mitglied hinzufügen
    $query3="INSERT INTO tbl_mitglied
             SET 
             Name='$nachname',
             Vorname='$vorname',
             GebDatum='$birthday',
             EMail= '$email',
             Rolle='$selectedRoleID',
             Status= '$state',
             Passwort='$password_encrypt';";
    $eintragen = mysqli_query($db, $query3);

    if($eintragen)
    {

         # weiterleitung auf die seite nach erfolgreichem login
        header('location: Anmeldung Bergwacht.html');
        exit(1);
    }
    else
    {
         # weiterleitung auf die Registrierungsseite ...
       header('location: Registrierung Bergwacht.php');
        exit();
    }
 } 
?>
