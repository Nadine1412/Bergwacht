<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="bootstrap.css">
<link rel="Stylesheet" type="text/css" href="style.css">
<head>
    <title>Profil anzeigen</title>
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
                <li><a class="active" href="Profil anzeigen.html">Profil</a>
                    <ul>
                        <li><a class="active" href="Profil anzeigen.html">Profil anzeigen</a></li>
                        <li><a href="Profil ändern.html">Profil ändern</a></li>
                    </ul>
                </li>
                <li><a href="Ausbildungen Bergwacht.html">Ausbildung</a></li>
                <li><a href="Inventar Bergwacht.html">Inventar</a></li>
                <li><a href="Mitglieder Bergwacht.html">Mitglieder</a></li>
                <li><a href="Charts Bergwacht.html">Charts</a></li>
                <li><a href="Kalender Bergwacht.html">Kalender</a></li>
            </ul>
    </div>
    <?php 
    ?>
    <section id="contact" class="contact">
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
                    <label>MaID :*</label>
                    <div class="row">
                    <div class="col-md-7">
                    <input name="maid" type="text" class="form-control" required>
                </div>
                </div>
                    <label>Position :*</label>
                    <div class="row">
                    <div class="col-md-7">
                    <input type="text" name = "position" class="form-control" required>
                </div>
                </div>
                    <label>Passwort :*</label>
                    <div class="row">
                    <div class="col-md-7">
                    <input type="text" name = "password" class="form-control" required>
                </div>
                </div>
                <p></p>
                    <button type="submit">Registrieren</button>
                    <p></p>
                <input type="button" value="Zurück" onClick="window.location.href='Anmeldung Bergwacht.html'">
                </form>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        </section>
</body>
</html>