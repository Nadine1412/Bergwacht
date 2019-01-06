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
                                    <li><a class="active" href="Profil ändern.php">Profil ändern</a></li>
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
                                    <li><a href="Inventar ändern.html">Inventar ändern</a></li>
                                    <li><a href="Inventar anzeigen.php">Inventar anzeigen</a></li>
                                    <li><a href="Inventar loeschen.html">Inventar löschen</a></li>
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
            <div class="container">
            <div class="row">
            <div class="col-md-6">
                <h2>Registrierung</h2>
               
                <p>Für die Nutzung der Kapazitätsübersicht ist eine Registrierung erforderlich, geben Sie hierfür Ihre Daten im nebenstehenden Formular ein.</p>
            </div>
            <div class="col-md-6">
                <form name="registrierungFormular" method="post" action="registrierungVerarbeiten.php">
                <legend>Daten eingeben</legend>
                <label>Name :*</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="text" name = "name" class="form-control" required>
                    </div>
                </div>
                <label>Vorname :*</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="text" name = "vorname" class="form-control" required>
                    </div>
                </div>
                <label>Geburtsdatum :*</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="date" name = "birthday" class="form-control">
                    </div>
                </div>
                <label>E-Mail :*</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="email" name = "email" class="form-control">
                    </div>
                </div>
                <label>Rolle :*</label>
                <div class="row">
                    <div class="col-md-7">
                        <select name="roles" class="form-control">
                            <?php
                                /* DB Verbindung herstellen */
                                define("DB_HOST", "localhost");
                                define("DB_USER", "root");
                                define("DB_PASSWORD", "");
                                define("DB_DATABASE", "bergwacht_db");

                                $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)or die(mysql_error());

                                // Auslesen aller vorhandenen Rollen aus der Datenbank
                                $query1 = "SELECT Rolle FROM tbl_rolle"; 

                                $result = mysqli_query($db, $query1); //Query ausführen und ergebnis speichern

                                while($roles_db = $result->fetch_assoc())
                                {
                                    $role =  $roles_db["Rolle"];
                                    // Ausgabe jeder einzelnen Rolle für Dropdownliste (select)
                                    echo "<option value=$role> $role </option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <label>Status :*</label>
                <div class="row">
                    <div class="col-md-7">
                    <select name="state" class="form-control">
                        <option value="aktiv">aktiv</option>
                        <option value="passiv">passiv</option>
                        </select>
                    </div>
                </div>
                <label>Passwort :*</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="password" name = "password" class="form-control" required>
                    </div>
                </div>
                <p></p>
                    <button type="submit">Registrieren</button>
                    <p></p>
                </form>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        </section>
        </body>
</html>
