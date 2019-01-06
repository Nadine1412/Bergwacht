<?php
    //Session starten
    session_start();

    /* DB Verbindung herstellen */
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "bergwacht_db");

    $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)or die(mysql_error());

    $query1 = "SELECT * FROM tbl_ausbildung WHERE EMail LIKE '" . $_SESSION["LoggedEMail"] . "'";

    $result = mysqli_query($db, $query1); //Query ausführen und ergebnis speichern

    while($user_db = $result->fetch_assoc())
    {
        // Laden der Ausbildungsdaten aus der Datenbank
        $_SESSION["userA_ID"] =  $user_db["Ausbildungs ID"];
        $_SESSION["userAusbildungsbezeichnung"] =  $user_db["Ausbildungsbezeichnung"];
        

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
<head>
    <title>Ausbildung anzeigen</title>
    <style>
        .navbar{
            width: 100%;
            background-color: #6699cc;

        }
        ul{
            text-align: left;
            display: inline;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        ul li{
            font: bold 12px/18px sans-serif;
            display: inline-block;
            position:relative;
            padding: 25px 20px;
            background: #6699cc;

        }
        ul li a{
            text-decoration: none;
            padding: 25px 20px;
            color:white;
            font-size: 18px;
        }          
        ul li:hover{
            background: #4dd0e1;
            color:white;
        }
        ul li ul{
            padding: 0;
            position: absolute;
            top: 70px;
            left:0;
            width:250px;
            display:none;
            visibility:hidden;
        }

        ul li ul li{
            background: #00acc1;
            display: block;
        }
        ul li ul li:hover{
            background: #4dd0e1;

        }
        ul li:hover ul{
            display: block;
            opacity: 1;
            visibility: visible;
        }
        ul ul ul li{
            display: none;
        }
        ul ul li:hover li{
            display: block;
        }
        ul ul ul{
            left:100
        }
        body{
            color: rgba(255, 255, 255, 0.16);
            position: relative;
            background: url("landscape-615429_1920.jpg") ;
            background-size:cover;
            
        }
        .container{
            color: rgb(255, 255, 255);
        }
    </style>
    <body>
    <div class="navbar">
                        <ul>
                            <li><a href="startseite.html">Home</a></li>
                            <li><a href="Profil anzeigen.php">Profil</a>
                                <ul>
                                    <li><a href="Profil anzeigen.php">Profil anzeigen</a></li>
                                    <li><a class="active" href="Profil ändern.php">Profil ändern</a></li>
                                </ul>
                            </li>
                            <li><a href="Ausbildungen Bergwacht.html">Ausbildung</a>
                                <ul>
                                    <li><a href="Anwesenheitsliste.php">Anwesenheitsliste</a></li>
                                    <li><a href="Ausbildung anzeigen.php">Ausbildung anzeigen</a></li>
                                    <li><a href="Ausbildung ändern.php">Ausbildung ändern</a></li>
                                </ul>
                            </li>
                            <li><a href="Inventar Bergwacht.html">Inventar</a>
                                <ul>
                                    <li><a href="Inventar pflegen.html">Inventar anlegen</a></li>
                                    <li><a href="Inventar ändern.html">Inventar ändern</a></li>
                                    <li><a href="Inventar anzeigen.php">Inventar anzeigen</a></li>
                                    <li><a href="Inventar loeschen.html">Inventar löschen</a></li>
                                </ul>
                            </li>
                            <li><a href="Mitglieder Bergwacht.html">Mitglieder</a></li>
                            <ul>
                                <li><a href="Mitglied loeschen.html">Mitglied löschen</a></li>
                            </ul>
                            <li><a href="Charts Bergwacht.html">Charts</a></li>
                            <li><a href="Kalender Bergwacht.html">Kalender</a></li>
                        </ul>
                        <input type="button" value="Logout" onClick="window.location.href='Anmeldung Bergwacht.html'">
                    </div>
                    
        <section id="container" class="container">
            <br><br><br><br><br><br>
            <div class="container">
            <div class="row">
            <div class="col-md-6">
                <h2>Ausbildung anzeigen</h2>
               
                <p>Hier können Sie ihre Ausbildungen einsehen und ändern.</p>
            </div>
            <div class="col-md-6">
            <label>Ausbildungs-ID:</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="text" name = "ID"  value="<?php echo($_SESSION["A_ID"]) ?>" class="form-control" readonly>
                    </div>
                </div>
                <label>Bezeichnung:</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="text" name = "Bezeichnung" value="<?php echo( $_SESSION["Ausbildungsbezeichnung"]) ?>" class="form-control" readonly>
                    </div>
                </div>
                
                    <p></p>
                <input type="button" value="Ausbildung ändern" onClick="window.location.href='Ausbildung ändern.php'">
                </form>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        </section>
</body>
</html>