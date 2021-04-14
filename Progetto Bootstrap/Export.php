<<<<<<< HEAD
<?php  
      //export.php  
 
      $connect = mysqli_connect("localhost", "root", "", "dbfinale");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('id','ANNOSCOLASTICO','AREAGEOGRAFICA','REGIONE','PROVINCIA','CODICEISTITUTORIFERIMENTO','DENOMINAZIONEISTITUTORIFERIMENTO','CODICESCUOLA','DENOMINAZIONESCUOLA','INDIRIZZOSCUOLA','CAPSCUOLA','CODICECOMUNESCUOLA','DESCRIZIONECOMUNE','DESCRIZIONECARATTERISTICASCUOLA','DESCRIZIONETIPOLOGIAGRADOISTRUZIONESCUOLA','INDICAZIONESEDEDIRETTIVO','INDICAZIONESEDEOMNICOMPRENSIVO','INDIRIZZOEMAILSCUOLA','INDIRIZZOPECSCUOLA','SITOWEBSCUOLA','SEDESCOLASTICA'));  
      $query = "SELECT * from prova";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
  
 ?>  

=======
<?php  
      //export.php  
 
      $connect = mysqli_connect("localhost", "root", "", "dbfinale");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('id','ANNOSCOLASTICO','AREAGEOGRAFICA','REGIONE','PROVINCIA','CODICEISTITUTORIFERIMENTO','DENOMINAZIONEISTITUTORIFERIMENTO','CODICESCUOLA','DENOMINAZIONESCUOLA','INDIRIZZOSCUOLA','CAPSCUOLA','CODICECOMUNESCUOLA','DESCRIZIONECOMUNE','DESCRIZIONECARATTERISTICASCUOLA','DESCRIZIONETIPOLOGIAGRADOISTRUZIONESCUOLA','INDICAZIONESEDEDIRETTIVO','INDICAZIONESEDEOMNICOMPRENSIVO','INDIRIZZOEMAILSCUOLA','INDIRIZZOPECSCUOLA','SITOWEBSCUOLA','SEDESCOLASTICA'));  
      $query = "SELECT * from prova";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
  
 ?>  

>>>>>>> e0afe090243f63ce5f8aaec2abdb1096345b14e9
