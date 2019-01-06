<?php
//Session starten
session_start();

  /* DB Verbindung herstellen */
  define("DB_HOST", "localhost");
  define("DB_USER", "root");
  define("DB_PASSWORD", "");
  define("DB_DATABASE", "bergwacht_db");

  $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)or die(mysql_error());
  $test = $_SESSION["userPasswordEnc"];

  ?>


<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="bootstrap.css">
<head>
    <title>Profil ändern</title>
    
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
                <h2>Profil ändern:</h2>
               
                <p>Hier können Sie ihre Nutzerdaten ändern.</p>
            </div>
            <div class="col-md-6">
                <form name="profilaendernFormular" method="post" action="Profil ändern verarbeiten.php">
                <label>Name :*</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="text" name = "name" value="<?php echo( $_SESSION["userName"]) ?>" class="form-control">
                    </div>
                </div>
                <label>Vorname :*</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="text" name = "vorname" value="<?php echo($_SESSION["userForename"]) ?>" class="form-control">
                    </div>
                </div>
                <label>Geburtsdatum :*</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="date" name = "birthday" value="<?php echo($_SESSION["userBirthday"]) ?>" class="form-control">
                    </div>
                </div>
                <label>E-Mail :*</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="email" name = "email" value="<?php echo($_SESSION["userEMail"]) ?>" class="form-control">
                    </div>
                </div>
                <label>Rolle :*</label>
                <div class="row">
                    <div class="col-md-7">
                        <select name="roles" class="form-control">
                            <?php
                              
                                // Auslesen aller vorhandenen Rollen aus der Datenbank
                                $query1 = "SELECT Rolle FROM tbl_rolle"; 

                                $result = mysqli_query($db, $query1); //Query ausführen und ergebnis speichern

                                while($role_db = $result->fetch_assoc())
                                {
                                    $role =  $role_db["Rolle"];
                                    // Ausgabe jeder einzelnen Rolle für Dropdownliste (select)
                                    if($role == $_SESSION["userRoleString"])
                                    {
                                        echo "<option value=$role selected> $role </option>";
                                    }
                                    else
                                    {
                                        echo "<option value=$role> $role </option>";
                                    }
                                    
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <label>Status :*</label>
                <div class="row">
                    <div class="col-md-7">
                        <?php 
                            if($_SESSION["userState"] == "aktiv")
                            {
                                echo "<select name='state' class='form-control'>
                                <option value='aktiv' selected>aktiv</option>
                                <option value='passiv'>passiv</option>
                                </select>";
                            }
                            else
                            {
                                echo "<select name='state' class='form-control'>
                                <option value='aktiv' >aktiv</option>
                                <option value='passiv' selected>passiv</option>
                                </select>";
                            }
                        ?>
                    </div>
                </div>
                <!-- <label> Altes Passwort :*</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="password" name="oldpassword" class="form-control"> 
                    </div>
                </div> -->
                <label>Neues Passwort :*</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="password" name = "newpassword" class="form-control">
                    </div>
                </div>
                <p></p>
                    <button type="submit">Daten speichern</button>
                    <p></p>
                </form>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        </section>
    </body>
</html>
