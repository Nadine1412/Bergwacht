<?php
    //Session starten
    session_start();

    /* DB Verbindung herstellen */
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "bergwacht_db");

    $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)or die(mysql_error());

    $query1 = "SELECT * FROM tbl_mitglied WHERE EMail LIKE '" . $_SESSION["LoggedEMail"] . "'";

    $result = mysqli_query($db, $query1); //Query ausführen und ergebnis speichern

    while($user_db = $result->fetch_assoc())
    {
        // Laden der Userdaten aus der Datenbank
        $_SESSION["userName"] =  $user_db["Name"];
        $_SESSION["userForename"] =  $user_db["Vorname"];
        $_SESSION["userMID"] =  $user_db["M_ID"];
        $_SESSION["userBirthday"] =  $user_db["GebDatum"];
        $_SESSION["userState"] =  $user_db["Status"];
        $_SESSION["userEMail"] =  $user_db["EMail"];
        $_SESSION["userRole"] = $user_db["Rolle"];
        $_SESSION["userPasswordEnc"] = $user_db["Passwort"];        

        // Abfrage der UserRole um die RollenID in die Bezeichnung umzuwandeln
        $query2 = "SELECT Rolle FROM tbl_rolle WHERE R_ID LIKE '" . $_SESSION["userRole"] . "' ";
        
        $resultRoleString = mysqli_query($db, $query2);

        while($user_db2 = $resultRoleString->fetch_assoc())
        {
            $_SESSION["userRoleString"] = $user_db2["Rolle"];
        }
        
        
    }
?>


<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="bootstrap.css">
<link rel="Stylesheet" type="text/css" href="style.css">
<head>
    <title>Profil anzeigen</title>
    <style>
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #333;
                }
            
            li {
                float: left;
                }
                    
            li a {
                display: block;
                color:white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                }
                                    
            li a:hover:not(.active) {
                background-color: #111;
                }
    
            .active{
                background-color: #4caf50
                }        
        </style>
    
</head>
<body>
    <div id="Navigationsbereich">
            <ul>
                <li><a href="startseite.html">Home</a></li>
                <li><a class="active" href="Profil anzeigen.php">Profil</a>
                    <ul>
                        <li><a class="active" href="Profil anzeigen.php">Profil anzeigen</a></li>
                        <li><a href="Profil ändern.php">Profil ändern</a></li>
                    </ul>
                </li>
                <li><a href="Ausbildungen Bergwacht.html">Ausbildung</a></li>
                <li><a href="Inventar Bergwacht.html">Inventar</a></li>
                <li><a href="Mitglieder Bergwacht.html">Mitglieder</a></li>
                <li><a href="Charts Bergwacht.html">Charts</a></li>
                <li><a href="Kalender Bergwacht.html">Kalender</a></li>
            </ul>
    </div>
    <section id="contact" class="contact">
            <br><br><br><br><br><br>
            <div class="container">
            <div class="row">
            <div class="col-md-6">
                <h2>Profil anzeigen</h2>
               
                <p>Hier können Sie ihre Nutzerdaten einsehen und ändern.</p>
            </div>
            <div class="col-md-6">
            <label>Mitarbeiter-ID:</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="text" name = "ID"  value="<?php echo($_SESSION["userMID"]) ?>" class="form-control" readonly>
                    </div>
                </div>
                <label>Name:</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="text" name = "name" value="<?php echo( $_SESSION["userName"]) ?>" class="form-control" readonly>
                    </div>
                </div>
                <label>Vorname:</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="text" name = "vorname" value="<?php echo($_SESSION["userForename"]) ?>" class="form-control" readonly>
                    </div>
                </div>
                <label>Geburtsdatum:</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="date" name = "birthday" value="<?php echo($_SESSION["userBirthday"]) ?>" class="form-control" readonly>
                    </div>
                </div>
                <label>E-Mail:</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="email" name = "email" value="<?php echo($_SESSION["userEMail"]) ?>" class="form-control" readonly>
                    </div>
                </div>
                <label>Rolle:</label>
                <div class="row">
                    <div class="col-md-7">
                    <input type="text" name = "role" value="<?php echo($_SESSION["userRoleString"]) ?>" class="form-control" readonly>
                    </div>
                </div>
                <label>Status:</label>
                <div class="row">
                    <div class="col-md-7">
                    <input type="text" name = "state" value="<?php echo($_SESSION["userState"]) ?>" class="form-control" readonly>
                    </div>
                </div>
                
                    <p></p>
                <input type="button" value="Profil ändern" onClick="window.location.href='Profil ändern.php'">
                </form>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        </section>
</body>
</html>