<?php
    //Session starten
    session_start();
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
    <body>
    <div class="navbar">
                        <ul>
                            <li><a href="startseite.html">Home</a></li>
                            <li><a href="Profil anzeigen.php">Profil</a>
                                <ul>
                                    <li><a class="active" href="Profil anzeigen.php">Profil anzeigen</a></li>
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
                            <li><a href="Inventar anzeigen.php">Inventar</a>
                                <ul>
                                    <li><a href="Inventar pflegen.html">Inventar anlegen</a></li>
                                    <li><a href="Inventar anzeigen.php">Inventar anzeigen</a></li>
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
            <div class="container">
            <div class="row">
            <div class="col-md-6">
                <h2>Profil anzeigen</h2>
               
                <p>Hier können Sie ihre Nutzerdaten einsehen und ändern.</p>
            </div>
            <div class="col-md-6">
            <label>Mitarbeiter-ID:</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="text" name = "ID"  value="<?php echo($_SESSION["userMID"]) ?>" class="form-control" readonly>
                    </div>
                </div>
                <label>Name:</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="text" name = "name" value="<?php echo( $_SESSION["userName"]) ?>" class="form-control" readonly>
                    </div>
                </div>
                <label>Vorname:</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="text" name = "vorname" value="<?php echo($_SESSION["userForename"]) ?>" class="form-control" readonly>
                    </div>
                </div>
                <label>Geburtsdatum:</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="date" name = "birthday" value="<?php echo($_SESSION["userBirthday"]) ?>" class="form-control" readonly>
                    </div>
                </div>
                <label>E-Mail:</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="email" name = "email" value="<?php echo($_SESSION["userEMail"]) ?>" class="form-control" readonly>
                    </div>
                </div>
                <label>Rolle:</label>
                <div class="row">
                    <div class="col-md-7">
                    <input type="text" name = "role" value="<?php echo($_SESSION["userRoleString"]) ?>" class="form-control" readonly>
                    </div>
                </div>
                <label>Status:</label>
                <div class="row">
                    <div class="col-md-7">
                    <input type="text" name = "state" value="<?php echo($_SESSION["userState"]) ?>" class="form-control" readonly>
                    </div>
                </div>
                
                    <p></p>
                <input type="button" value="Profil ändern" onClick="window.location.href='Profil ändern.php'">
                </form>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        </section>
</body>
</html>