<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
<meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/styledati3.css" rel="stylesheet">

<style>
/*STILE PER LE TABELLE*/

body {
  background-color: #199eb8;
  font-family: "Roboto", helvetica, arial, sans-serif;
  font-size: 12px;
  font-weight: 250;
  text-rendering: optimizeLegibility;
}

div.table-title {
  display: block;
  margin: auto;
  max-width: 400px;
  padding:3px;
  width: 75%;
}

.table-title h3 {
   color: #fafafa;
   font-size: 24px;
   font-weight: 250;
   font-style:normal;
   font-family: "Roboto", helvetica, arial, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
   text-transform:uppercase;
}

.table-fill {
  background: white;
  border-radius:2px;
  border-collapse: collapse;
  height: 200px;
  margin: auto;
  max-width: 400px;
  padding:3px;
  width: 75%;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}
 
th {
  color:#D5DDE5;;
  background:#1b1e24;
  border-bottom:3px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:18px;
  font-weight: 75;
  padding:18px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th:first-child {
  border-top-left-radius:2px;
}
 
th:last-child {
  border-top-right-radius:2px;
  border-right:none;
}
  
tr {
  border-top: 1px solid #C1C3D1;
  border-bottom: 1px solid #C1C3D1;
  color:#666B85;
  font-size:18px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
tr:hover td {
  background:#199eb8;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
}
 
tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}
 
tr:nth-child(odd) td {
  background:#EBEBEB;
}
 
tr:nth-child(odd):hover td {
  background:#199eb8;
}

tr:last-child td:first-child {
  border-bottom-left-radius:2px;
}
 
tr:last-child td:last-child {
  border-bottom-right-radius:2px;
}
 
td {
  background:#FFFFFF;
  padding:14px;
  text-align:left;
  vertical-align:middle;
  font-weight:200;
  font-size:15px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
}

td.text-left {
  text-align: left;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: right;
}

table {
    border: 1px solid black;
    width:50%;
    text-align:center;
    margin:auto;
    height:75px;
} 

a {
  color: #FFFFFF;
}
 

</style>
</head>


<body>

 <!-- ======= Header ======= -->
 <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="https://uli.it/"><img src="assets/img/logoULI.png" alt=""></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Bell</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="visualizzaFiltri.php">Filtra Ricerca</a></li>
          <li><a href="Export.php">Scarica</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->

      <nav class="nav social-nav pull-right d-none d-lg-inline">
        <a href="https://twitter.com/uli_seveso"><i class="fa fa-twitter"></i></a> <a href="https://it-it.facebook.com/UtilityLineItalia"><i class="fa fa-facebook"></i></a> <a href="https://it.linkedin.com/company/utility-line-italia"><i class="fa fa-linkedin"></i></a> <a href="#contact"><i class="fa fa-envelope"></i></a>
      </nav>
    </div>
  </header><!-- End Header -->
  </main><!-- End #main -->
</body>
</html>
<?php
$conn = new mysqli("localhost","root","","dbFinale");

$risultatiperpage=25;

if(isset($_GET['page'])){
  if($_GET['page']>1){
    $start=($_GET['page']-1)*$risultatiperpage;
  }else{
  $start=0;
}
}else{
  $start=0;
}
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$sql=$conn->query("SELECT COUNT(*) as conteggio from prova");
$array=$sql->fetch_assoc();
$totalerighe=$array['conteggio'];
$pages=ceil($totalerighe/$risultatiperpage);
$query=$conn->query("SELECT * FROM prova LIMIT ".$start.",".$risultatiperpage);
$Previous = $page - 1;
$Next = $page + 1;
?>

<html>
<head>
</head>
<body>
<table class="responsive">
<thead>
<th>
Id
</th>
<th>
A.S
</th>
<th>
AreaGeografica
</th>
<th>
REGIONE
</th>
<th>
PROVINCIA
</th>
<th>
CODICEISTITUTO
</th>
<th>
DENOMINAZIONE
</th>
<th>
CODICESCUOLA
</th>
<th>
NOMINATIVO
</th>
<th>
INDIRIZZO
</th>
<th>
CAP
</th>
<th>
CODCOMUNE
</th>
<th>
COMUNE
</th>
<th>
CARATTERISTICASCUOLA
</th>
<th>
GRADOSCUOLA
</th>
<th>
SEDEDIRETTIVO
</th>
<th>
OMNICOMPRENSIVO
</th>
<th>
EMAIL
</th>
<th>
PEC
</th>
<th>
SITOWEB
</th>
<th>
SEDE
</th>
</thead>
<tbody>
<?php
  while($riga=$query->fetch_assoc())
  echo "<tr><td>".$riga['id']."</td><td>".$riga['ANNOSCOLASTICO']."</td><td>".$riga['AREAGEOGRAFICA']."</td><td>".$riga['REGIONE']."</td><td>".$riga['PROVINCIA']."</td><td>".$riga['CODICEISTITUTORIFERIMENTO']."</td><td>".$riga['DENOMINAZIONEISTITUTORIFERIMENTO']."</td><td>".$riga['CODICESCUOLA']."</td><td>".$riga['DENOMINAZIONESCUOLA']."</td><td>".$riga['INDIRIZZOSCUOLA']."</td><td>".$riga['CAPSCUOLA']."</td><td>".$riga['CODICECOMUNESCUOLA']."</td><td>".$riga['DESCRIZIONECOMUNE']."</td><td>".$riga['DESCRIZIONECARATTERISTICASCUOLA']."</td><td>".$riga['DESCRIZIONETIPOLOGIAGRADOISTRUZIONESCUOLA']."</td><td>".$riga['INDICAZIONESEDEDIRETTIVO']."</td><td>".$riga['INDICAZIONESEDEOMNICOMPRENSIVO']."</td><td>".$riga['INDIRIZZOEMAILSCUOLA']."</td><td>".$riga['INDIRIZZOPECSCUOLA']."</td><td>".$riga['SITOWEBSCUOLA']."</td><td>".$riga['SEDESCOLASTICA']."</td></tr>";
  ?>
  </tbody>
  </table>
  <nav aria-label="Page navigation">
					<ul class="pagination">
				    
				      <a href="visualizzaDati.php?page=<?= $Previous; ?>" aria-label="Previous">
				        <span aria-hidden="true">&laquo; Precedente</span>
				      </a>
				    
              &nbsp;
              &nbsp;
              &nbsp;
				    
				      <a href="visualizzaDati.php?page=<?= $Next; ?>" aria-label="Next">
				        <span aria-hidden="true"> Successiva &raquo;</span>
				      </a>
				    
				  </ul>
				</nav>
</body>
  </html>
  <html>
  <head>
  </head>
  <body>
  <!-- ======= Contact Section ======= -->
<section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="section-title">Contact Us</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-3 col-md-4">
            <div class="info">
              <div>
                <i class="fa fa-map-marker"></i>
                <p>Via Mezzera, 29/a<br>20822 Seveso (MB)</p>
              </div>

              <div>
                <i class="fa fa-envelope"></i>
                <p>assistenza@uli.com</p>
              </div>

              <div>
                <i class="fa fa-phone"></i>
                <p>+39 0362 540538</p>
              </div>

            </div>
          </div>


        </div>
      </div>
    </section><!-- End Contact Section -->
    </body>
    </html>


