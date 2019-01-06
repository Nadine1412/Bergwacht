<?php
    //Session starten
    session_start();

    /* DB Verbindung herstellen */
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "bergwacht_db");

    $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)or die(mysql_error());

    $query1 = "SELECT * FROM tbl_ausbildungsthema WHERE EMail LIKE '" . $_SESSION["LoggedEMail"] . "'";

    $result = mysqli_query($db, $query1); //Query ausführen und ergebnis speichern

    while($user_db = $result->fetch_assoc())
    {
        // Laden der Userdaten aus der Datenbank
        $_SESSION["userAT_ID"] =  $user_db["Ausbildungsthema ID"];
        $_SESSION["userDatum"] =  $user_db["Datum"];
        $_SESSION["userDauer"] =  $user_db["Dauer"];
        $_SESSION["userThema"] =  $user_db["Thema"];
        $_SESSION["userA_ID"] =  $user_db["Ausbildungs ID"];
        $_SESSION["userAusbilder"] =  $user_db["Ausbilder"];     

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
    <title>Profil anzeigen</title>
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
            color: rgba(255, 255, 255,255);
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
                    
       
            <br><br><br><br><br><br>
                <h2>Anwesenheitsliste anzeigen</h2>
               
                <p>Hier können Sie die Anwesenheitsliste der Ausbildungen einsehen und als PDF exportieren.</p>
                <table>
                              <tr>
                                <th>Ausbildungsthema ID:</th>
                                <th>Datum:</th>
                                <th>Dauer:</th>
                                <th>Thema:</th>
                                <th>Ausbildungs ID:</th>
                                <th>Ausbilder:</th>
                              </tr>
                              <tr>
                                <td><input type="text" name = "Ausbildungsthema ID"  value="<?php echo($_SESSION["userAT_ID"]) ?>" class="form-control" readonly></td>
                                <td><input type="text" name = "Datum" value="<?php echo( $_SESSION["userDatum"]) ?>" class="form-control" readonly></td>
                                <td><input type="text" name = "Dauer" value="<?php echo($_SESSION["userDauer"]) ?>" class="form-control" readonly></td>
                                <td><input type="date" name = "Thema" value="<?php echo($_SESSION["userThema"]) ?>" class="form-control" readonly></td>
                                <td><input type="email" name = "Ausbildungs ID" value="<?php echo($_SESSION["userA_ID"]) ?>" class="form-control" readonly></td>
                                <td><input type="text" name = "Ausbilder" value="<?php echo($_SESSION["userAusbilder"]) ?>" class="form-control" readonly></td>
                              </tr>
    </table>
          
                    <p></p>
                <input type="button" value="PDF Export" onClick="window.location.href='Profil ändern.php'">
                </form>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        </section>
</body>
</html>