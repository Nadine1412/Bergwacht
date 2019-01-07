
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
        table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            
            /* td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                background-color: grey;
            } */
            
            td{
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                background-color: #D3D3D3;
                color: black;
            }
            th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                background-color: #6699cc;
                color: white;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
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
                    
            <section id="container" class="container">

            <br><br><br><br><br><br>
               <center> <h2>Anwesenheitsliste anzeigen</h2> </center>
               
                <center><p>Hier können Sie die Anwesenheitsliste der Ausbildungen einsehen und als PDF exportieren.</p></center>
                <div style="width:60%;" class="container">
                <table>
                              <tr>
                                <th>Ausbildungsthema ID:</th>
                                <th>Datum:</th>
                                <th>Dauer:</th>
                                <th>Thema:</th>
                                <th>Ausbildungs ID:</th>
                                <th>Ausbilder:</th>
                              </tr>
                              <?php
                                    /* DB Verbindung herstellen */
                                    define("DB_HOST", "localhost");
                                    define("DB_USER", "root");
                                    define("DB_PASSWORD", "");
                                    define("DB_DATABASE", "bergwacht_db");

                                    $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)or die(mysql_error());

                                    $query1 = "SELECT * FROM tbl_ausbildungsthema";

                                    $result = mysqli_query($db, $query1); //Query ausführen und ergebnis speichern

                                    while($user_db = $result->fetch_assoc())
                                    {
                                        // Laden der Userdaten aus der Datenbank
                                        $userAtID =  $user_db["AT_ID"];
                                        $userDatum =  $user_db["Datum"];
                                        $userDauer =  $user_db["Dauer"];
                                        $userThema =  $user_db["Thema"];
                                        $userA_ID =  $user_db["A_ID"];
                                        $userAusbilder =  $user_db["Ausbilder"];    
                                        echo("
                                        <tr>
                                            <td>$userAtID </td>
                                            <td>$userDatum</td>
                                            <td>$userDauer</td>
                                            <td>$userThema</td>
                                            <td>$userA_ID</td>
                                            <td>$userAusbilder</td>
                                            </tr>
                                        ");       
                                    }
                                ?>  
                         </table>
                         
                    <p></p>
                <input type="button" value="PDF Export" onClick="window.location.href='dompdf1.php'">
        <br><br><br><br><br><br><br><br><br><br><br><br>
        </section>
</body>
</html>