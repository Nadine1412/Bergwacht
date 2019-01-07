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
              <center>  <h2>Ausbildung anzeigen</h2></center> 
               
              <center>  <p>Hier können Sie ihre Ausbildungen einsehen und ändern.</p> </center> 
              <form name="ausbildungloeschenFormular" method="post" action="Ausbildung loeschen verarbeiten.php">

              <div style="width:60%;" id="Ausbildungloeschentbl" class="container">

                 <table>
                              <tr>
                                <th>Ausbildungs-ID:</th>
                                <th>Bezeichnung:</th>
                                <th>Löschen:</th>
                              </tr>
                              <?php
                                    /* DB Verbindung herstellen */
                                    define("DB_HOST", "localhost");
                                    define("DB_USER", "root");
                                    define("DB_PASSWORD", "");
                                    define("DB_DATABASE", "bergwacht_db");

                                    $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)or die(mysql_error());

                                    $query1 = "SELECT * FROM tbl_ausbildung";

                                    $result = mysqli_query($db, $query1); //Query ausführen und ergebnis speichern

                                    while($user_db = $result->fetch_assoc())
                                    {
                                        // Laden der Ausbildungsdaten aus der Datenbank
                                        $a_id =  $user_db["A_ID"];
                                        $ausbildungsbezeichnung =  $user_db["Ausbildungsbezeichnung"];
                                        echo("
                                        <tr>
                                            <td>$a_id </td>
                                            <td>$ausbildungsbezeichnung</td>
                                            <td><button type='submit' name='Ausbildungloeschen' value='$a_id'>Löschen</button></td>
                                            </tr>
                                        ");       
                                    }
                                ?>  
                         </table>
                         <p></p>
                         </form>
            <!-- <div style="width:60%;" id="KeinAdmin"class="container">
                Sie haben keine Admin-Rechte und können keine Mitglieder löschen.
            </div> 
         <script type="text/javascript">
           var rolle = "<?php echo($_SESSION['userRoleString']);?>";
           var table = document.getElementById("Mitgliederloeschentbl");
           var unauthorised = document.getElementById("KeinAdmin");

           if(rolle == "Anwaerter" || rolle == "Ausbilder")
           {
                table.hidden=false;
                unauthorised.hidden=true;
           }
           else
           {
                table.hidden=true;
                unauthorised.hidden=false;
           }
        </script> -->
        </section>

        
</body>
</html>