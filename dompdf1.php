<?php
//Hier wird das dompdf quasi installiert 
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
//Hier wird das Dompdf Objekt erzeugt
$dompdf = new Dompdf();
//Hier wird der Inhalt einer bestimmten Html Datei geladen
$dompdf->loadHtml(file_put_contents('Anwesenheitsliste.php'));
//Hier wird das Pdf formatiert
$dompdf->setPaper(array(0,0,850,1600),'landscape');
//Hier (kann) das Pdf gerendert werden
$dompdf->render();
//Hier ist die Bezeichnung für den Output Stream
$dompdf->stream("samplepdf1");
?>