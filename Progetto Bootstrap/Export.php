<?php  
session_start();
$connect = new mysqli("localhost","root","","dbFinale");

     if ($_GET["caller"] === "visualizzaDati" || $_GET["caller"] === "visualizzaFiltri") {

      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('id','ANNOSCOLASTICO','AREAGEOGRAFICA','REGIONE','PROVINCIA','CODICEISTITUTORIFERIMENTO','DENOMINAZIONEISTITUTORIFERIMENTO','CODICESCUOLA','DENOMINAZIONESCUOLA','INDIRIZZOSCUOLA','CAPSCUOLA','CODICECOMUNESCUOLA','DESCRIZIONECOMUNE','DESCRIZIONECARATTERISTICASCUOLA','DESCRIZIONETIPOLOGIAGRADOISTRUZIONESCUOLA','INDICAZIONESEDEDIRETTIVO','INDICAZIONESEDEOMNICOMPRENSIVO','INDIRIZZOEMAILSCUOLA','INDIRIZZOPECSCUOLA','SITOWEBSCUOLA','SEDESCOLASTICA'));  
 
          if ($_GET["caller"] === "visualizzaDati") {

               $query = "SELECT * from prova";  
               $result = mysqli_query($connect, $query);  
               while($row = mysqli_fetch_assoc($result))  
               {  
                    fputcsv($output, $row);  
               }  
          } else if ($_GET["caller"] === "visualizzaFiltri") {


     $result = $_SESSION["result"];

          for ($i = 0; $i < sizeof($result); $i++) {
               fputcsv($output, $result[$i]);  
          }

     }

     fclose($output); 

     } else {
          echo "Errore";
     } 
?>  











