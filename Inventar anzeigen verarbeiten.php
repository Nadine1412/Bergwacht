<?php
//Session starten
                session_start();
?>


<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="bootstrap.css">
<link rel="Stylesheet" type="text/css" href="style.css">
<head>
        <title>Inventar anzeigen</title>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            
            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            
            tr:nth-child(even) {
                background-color: #dddddd;
            }
            .navbar{
            width: 100%;
            background-color: #6699cc;
            z-index: 10;

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
            left:100;
        }
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            
            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
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
                z-index: 1;
            }  
            </style>
    </head>
        <body>
        <div class="navbar">
                        <ul>
                            <li><a href="startseite.html">Home</a></li>
                            <li><a href="Profil anzeigen.php">Profil</a>
                                <ul>
                                    <li><a href="Profil anzeigen.php">Profil anzeigen</a></li>
                                    <li><a href="Profil ändern.php">Profil ändern</a></li>
                                </ul>
                            </li>
                            <li><a href="Ausbildung anzeigen.php">Ausbildung</a>
                                <ul>
                                    <li><a href="Anwesenheitsliste.php">Anwesenheitsliste</a></li>
                                    <li><a href="Ausbildung anlegen.php">Ausbildung anlegen</a></li>
                                    <li><a href="Ausbildung anzeigen.php">Ausbildung anzeigen</a></li>
                                    <li><a href="Ausbildung loeschen.php">Ausbildung löschen</a></li>
                                </ul>
                            </li>
                            <li><a href="Inventar anzeigen.html">Inventar</a>
                                <ul>
                                    <li><a href="Inventar pflegen.html">Inventar anlegen</a></li>
                                    <li><a class="active" href="Inventar anzeigen.php">Inventar anzeigen</a></li>
                                    <li><a href="Inventar ändern.php">Inventar ändern</a></li>
                                    <li><a href="Inventar löschen.php">Inventar löschen</a></li>
                                </ul>
                            </li>
                            <li><a href="Mitglieder Bergwacht.php">Mitglieder</a></li>
                            <ul>
                                <li><a href="Mitglied loeschen.php">Mitglied löschen</a></li>
                            </ul>
                            <li><a href="Charts Bergwacht.html">Charts</a></li>
                            <li><a href="Kalender Bergwacht.html">Kalender</a></li>
                        </ul>
                        <input type="button" value="Logout" onClick="window.location.href='Anmeldung Bergwacht.html'">
                    </div>
                    
                    
            <section id="container" class="container">
            <br><br><br><br><br><br>

            <center> <h2>Inventar anzeigen</h2> </center>
            <p></p>
            <div class="container">
            <div class="row">
            
            <div style="width:60%;" id="Inventaraendern"class="container">
                <?php
                    $matbez = $_POST["matbez"];
                    $_SESSION["matbez"] = $matbez;

                   /* DB Verbindung herstellen */
                    define("DB_HOST", "localhost");
                    define("DB_USER", "root");
                    define("DB_PASSWORD", "");
                    define("DB_DATABASE", "bergwacht_db");

                    $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)or die(mysql_error()); 
                    $query1 = "SELECT * FROM tbl_inventar WHERE Bezeichnung LIKE '$matbez'";
                    $result = mysqli_query($db, $query1);
                    // Check ob Material vorhanden oder nicht
                    if($result->num_rows == 0)
                    {
                        // Ausgabe Material nicht vorhanden
                        echo '<script language="javascript">';
                        echo 'alert("Material nicht vorhanden oder falsche Bezeichnung angegeben.")';
                        echo '</script>';
                    }
                    else{
                        // Material vorhanden
                        while($row = $result->fetch_assoc())
                        {
                            
                            $sid = $row["S_ID"];
                            $standort = $row["Standort"];
                            $datum = $row["Datum"];
                            $status = $row["Status"];
                            $_SESSION["sid"]= $sid;
                            $_SESSION["standort"]= $standort;
                            $_SESSION["datum"]= $datum;
                            $_SESSION["status"]= $status;
                        }
                            
                            echo("  <label>Material-ID:</label>
                                    <div class='row'>
                                     <div class='col-md-7'>
                                        <input type='text' name ='sid' value='$sid' class='form-control' readOnly>
                                     </div>
                                 </div>");
                            echo("  <label>Material-Bezeichnung:</label>
                                    <div class='row'>
                                        <div class='col-md-7'>
                                            <input type='text' name ='matbez' value='$matbez' class='form-control' readOnly>
                                        </div>
                                    </div>");
                            echo("  <label>Datum:</label>
                                    <div class='row'>
                                        <div class='col-md-7'>
                                            <input type='text' name ='datum' value='$datum' class='form-control' readOnly>
                                        </div>
                                  </div>");
                            
                            echo("  <label>Status:</label>
                                    <div class='row'>
                                    <div class='col-md-7'>
                                    <input type='text' name ='status' value='$status' class='form-control' readOnly>
                                    </div>
                                    </div>");
                            // wenn status = ausgeliehen dann zeige standort mit an
                            //if($row['status'] == "ausgeliehen"){
                                echo("  <label>Standort:</label>
                                        <div class='row'>
                                        <div class='col-md-7'>
                                        <input type='text' name ='standort' value='$standort' class='form-control' readOnly>
                                        </div>
                                        </div> 
                                        <p></p>");
                                echo("
                                    <input type='button' value='Inventar ändern' onClick='window.location.href=\"Inventar ändern.php\"'>
                                     <input type='button' value='Inventar löschen' onClick='window.location.href=\"Inventar löschen.php\"'>
                                ");
                           // }  
                    }
                ?>
                <p></p>
                <input type="button" value="Zurück" onClick="window.location.href='Inventar anzeigen.php'">
                
                        
            </div> 
        </div> 
        <br><br><br><br><br><br><br><br><br><br><br><br>
        </section>
        </body>
</html>





