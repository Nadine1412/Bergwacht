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
                                        <li><a href="Anwesenheitsliste Bergwacht.html">Anwesenheitsliste</a></li>
                                    </ul>
                                </li>
                                <li><a href="Inventar Bergwacht.html">Inventar</a>
                                    <ul>
                                        <li><a href="Inventar pflegen.html">Inventar anlegen</a></li>
                                        <li><a class="active" href="Inventar ändern.html">Inventar ändern</a></li>
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
