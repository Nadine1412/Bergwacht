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
                <h2>Inventar anzeigen</h2>
               
                <p>Hier können Sie das Material ändern.</p>
            </div>
            <div class="col-md-6">
                <form name="changeInventar" method="post" action="changeInventar.php">
                <legend>Bitte geben Sie eine Materialbezeichnung ein:</legend>
                <label>Materialbezeichnung :*</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="text" name = "matbez" value= "<?php echo($_SESSION["matbez"]) ?>" class="form-control" readOnly>
                    </div>
                </div>
                  <?php
                   /* DB Verbindung herstellen */
                    define("DB_HOST", "localhost");
                    define("DB_USER", "root");
                    define("DB_PASSWORD", "");
                    define("DB_DATABASE", "bergwacht_db");

                    $matbez = $_POST['matbez'];

                    $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)or die(mysql_error()); 
                    $query1 = "SELECT * FROM tbl_inventar WHERE bezeichnung LIKE '$matbez'";
                    $result = mysqli_query($db, $query1);

                    while($row = $result->fetch_assoc())
                    {
                        echo "<div class="row">
                                 <div class="col-md-7">
                                    <input type="text" name =$row['bezeichnung'] class="form-control" required>
                                 </div>
                             </div>";
                        echo "<div class="row">
                                <div class="col-md-7">
                                    <input type="text" name =$row['datum'] class="form-control" required>
                                </div>
                              </div>";
                        echo "<div class="row">
                              <div class="col-md-7">
                                <input type="text" name =$row['status'] class="form-control" required>
                              </div>
                            </div>";
                        // wenn status = ausgeliehen dann zeige standort mit an
                        if($row['status'] == "ausgeliehen"){
                            echo "<div class="row">
                                    <div class="col-md-7">
                                        <input type="text" name =$row['standort'] class="form-control" required>
                                    </div>
                                  </div>";
                        }  
                    }
                ?>
                <p></p>
                <input type="button" value="Inventar ändern" onClick="window.location.href='Inventar ändern.php'">
                </form>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        </section>
        </body>
</html>
