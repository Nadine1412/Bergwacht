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
<link rel="Stylesheet" type="text/css" href="style.css">
<head>
    <title>Profil ändern</title>
    
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

                                while($roles_db = $result->fetch_assoc())
                                {
                                    $role =  $roles_db["Rolle"];
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
                <input type="button" value="Zurück" onClick="window.location.href='Profil anzeigen.php'">
                </form>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        </section>
    </body>
</html>
