<?php
    //Session starten
    session_start();

    /* DB Verbindung herstellen */
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "bergwacht_db");

    $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)or die(mysql_error());

?>


<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="bootstrap.css">
<link rel="Stylesheet" type="text/css" href="style.css">
<head>
        <title>Inventar ändern</title>
        <style>
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
                            <li><a href="Ausbildungen Bergwacht.html">Ausbildung</a>
                                <ul>
                                    <li><a href="Anwesenheitsliste.php">Anwesenheitsliste</a></li>
                                    <li><a href="Ausbildung anlegen.php">Ausbildung anlegen</a></li>
                                    <li><a href="Ausbildung anzeigen.php">Ausbildung anzeigen</a></li>
                                    <li><a href="Ausbildung loeschen.php">Ausbildung löschen</a></li>
                                </ul>
                            </li>
                            <li><a href="Inventar anzeigen.php">Inventar</a>
                                <ul>
                                    <li><a href="Inventar pflegen.html">Inventar anlegen</a></li>
                                    <li><a href="Inventar anzeigen.php">Inventar anzeigen</a></li>
                                    <li><a class="active" href="Inventar ändern.php">Inventar ändern</a></li>
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
    <section id="contact" class="contact">
            <br><br><br><br><br><br>
            <div class="container">
            <div class="row">
            <div class="col-md-6">
                <h2>Inventar ändern</h2>
               
                <p>Hier können Sie das Material ändern.</p>
            </div>
            <div class="col-md-6">
                <form name="changeInventarFormular" method="post" action="changeInventar.php">
                <legend>Bitte geben Sie eine Materialbezeichnung ein:</legend>
               
                <label>Material-ID:</label>
                    <div class="row">
                        <div class="col-md-7">
                            <input type="text" name="sid" value ="<?php echo($_SESSION["sid"]) ?>" class="form-control" readonly>
                        </div>
                    </div>
                <label>Material-Bezeichnung:</label>
                    <div class='row'>
                        <div class='col-md-7'>
                            <input type="text" name="matbez" value ="<?php echo($_SESSION["matbez"]) ?>" class="form-control" required>  
                        </div>
                    </div>
                <label>Datum:</label>
                    <div class='row'>
                        <div class='col-md-7'>
                            <input type="date" name="date" value ="<?php echo($_SESSION["datum"]) ?>" class="form-control" required>  
                        </div>
                    </div>
                <label>Status :*</label>
                <div class="row">
                    <div class="col-md-7">
                        <?php 
                            if($_SESSION["status"] == "ausgeliehen")
                            {
                                echo "<select name='state' class='form-control'>
                                <option value='ausgeliehen' selected>ausgeliehen</option>
                                <option value='nicht ausgeliehen'>nicht ausgeliehen</option>
                                </select>";
                            }
                            else
                            {
                                echo "<select name='state' class='form-control'>
                                <option value='ausgeliehen' >ausgeliehen</option>
                                <option value='nicht ausgeliehen' selected>nicht ausgeliehen</option>
                                </select>";
                            }
                        ?>
                    </div>
                </div>                           
                <label>Standort:</label>
                    <div class='row'>
                        <div class='col-md-7'>
                            <input type="text" name="standort" value ="<?php echo($_SESSION["standort"]) ?>" class="form-control" required>  
                        </div>
                    </div>    


                <p></p>
                <button type='submit'>Änderungen speichern</button>
                </form>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        </section>
        </body>
</html>
