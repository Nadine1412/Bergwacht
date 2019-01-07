<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<link rel="Stylesheet" type="text/css" href="bootstrap.css">
<head> 
<head>
    <title>Inventar</title>
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
            <center><h2>Inventar</h2></center>
            <p></p>
            <div style="width:60%;" class="container">
                    
                            <body>
                                                        
                            <table>
                              <tr>
                                <th>Bezeichnung</th>
                                <th>MID</th>
                                <th>SID</th>
                                <th>Datum</th>
                                <th>Status</th>
                              </tr>
                              <tr>
                                <td>NULL</td>
                                <td>NULL</td>
                                <td>NULL</td>
                                <td>NULL</td>
                                <td>NULL</td>
                              </tr>
                              <tr>
                                    <td>NULL</td>
                                    <td>NULL</td>
                                    <td>NULL</td>
                                    <td>NULL</td>
                                    <td>NULL</td>
                              </tr>
                              <tr>
                                    <td>NULL</td>
                                    <td>NULL</td>
                                    <td>NULL</td>
                                    <td>NULL</td>
                                    <td>NULL</td>
                              </tr>
                              <tr>
                                    <td>NULL</td>
                                    <td>NULL</td>
                                    <td>NULL</td>
                                    <td>NULL</td>
                                    <td>NULL</td>
                              </tr>
                              <tr>
                                    <td>NULL</td>
                                    <td>NULL</td>
                                    <td>NULL</td>
                                    <td>NULL</td>
                                    <td>NULL</td>
                              </tr>
                              <tr>
                                    <td>NULL</td>
                                    <td>NULL</td>
                                    <td>NULL</td>
                                    <td>NULL</td>
                                    <td>NULL</td>
                              </tr>
                            </table>
                </div>
                <br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </section>
    </body>
</html>
