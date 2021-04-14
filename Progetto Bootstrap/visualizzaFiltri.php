<<<<<<< HEAD
<?php
session_start();
?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">
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
  <link href="assets/css/styleFiltri.css" rel="stylesheet">

    <title>Index</title>


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
          <li><a href="visualizzaDati.php">Visualizza Dati</a></li>
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

    <br><br>
    <fieldset>

    <form name="form" method='post' action='filtri.php'>

            <h2>Visualizza Dati</h2>

            <h3>Filtra Per:</h3>

            <label for="area">Area Geografica: </label>
            <select name="area">
                <option value=""></option>
                <option value="NORD EST">NORD EST</option>
                <option value="NORD OVEST">NORD OVEST</option>
                <option value="CENTRO">CENTRO</option>
                <option value="SUD">SUD</option>
                <option value="ISOLE">ISOLE</option>
            </select>

            <br><br>

            <label for="regione">Regione: </label>
            <select name="regione">
                <option value=""></option>
                <option value="Abruzzo">Abruzzo</option>
                <option value="Basilicata">Basilicata</option>
                <option value="Calabria">Calabria</option>
                <option value="Campania">Campania</option>
                <option value="Elimilia_Romagna">Elimilia Romagna</option>
                <option value="Friuli">Friuli-Venezia G.</option>
                <option value="Lazio">Lazio</option>
                <option value="Liguria">Liguria</option>
                <option value="Lombardia">Lombardia</option>
                <option value="Marche">Marche</option>
                <option value="Molise">molise</option>
                <option value="Piemonte">Piemonte</option>
                <option value="Puglia">Puglia</option>
                <option value="Sardegna">Sardegna</option>
                <option value="Sicilia">Sicilia</option>
                <option value="Toscana">Toscana</option>
                <option value="Trentino">Trentino alto adige</option>
                <option value="Umbria">Umbria</option>
                <option value="Valle d'aosta">Valle d'aosta</option>
                <option value="Veneto">Veneto</option>
            </select>

            <br><br>
            <label for="provincia">Provincia: </label>
            <input type="text" name="provincia" maxlength="20">


            <br><br>
            <label for="comune">Comune: </label>
            <input type="text" name="comune" maxlength="20">

            <br><br>
            <input type="submit" name="cerca" value="Ricerca">
            <input type="reset" value="Reset">
            </form>

            <?php
            $conn = new mysqli("localhost", "root", "", "dbFinale");

            $risultatiperpage = 25;

            if (isset($_GET['page'])) {
                if ($_GET['page'] > 1) {
                    $start = ($_GET['page'] - 1) * $risultatiperpage;
                } else {
                    $start = 0;
                }
            } else {
                $start = 0;
            }
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $sql = $conn->query("SELECT COUNT(*) as conteggio from prova");
            $array = $sql->fetch_assoc();
            $totalerighe = $array['conteggio'];
            $pages = ceil($totalerighe / $risultatiperpage);
            $query = $conn->query("SELECT * FROM prova LIMIT " . $start . "," . $risultatiperpage);
            $Previous = $page - 1;
            $Next = $page + 1;
            
            

            echo "<br><br><br>";

            if (isset($_SESSION["result"])) {
                echo "<table align=" . '"' . "center" . '"' . ">
                          <tr>
                            <th>ID</th>
                            <th>A.S.</th>
                            <th>AreaGeografica</th>
                            <th>REGIONE</th>
                            <th>PROVINCIA</th>
                            <th>CODICEISTITUTO</th>
                            <th>DENOMINAZIONE</th>
                            <th>CODICESCUOLA</th>
                            <th>NOMINATIVO</th>
                            <th>INDIRIZZO</th>
                            <th>CAP</th>
                            <th>CODCOMUNE</th>
                            <th>COMUNE</th>
                            <th>CARATTERISTICASCUOLA</th>
                            <th>GRADOSCUOLA</th>
                            <th>SEDEDIRETTIVO</th>
                            <th>OMNICOMPRENSIVO</th>
                            <th>EMAIL</th>
                            <th>PEC</th>
                            <th>SITOWEB</th>
                            <th>SEDE</th>
                          </tr>";


                for ($i = $start; $i < $risultatiperpage + $start; $i++) {

                    if (array_key_exists($i, $_SESSION["result"])) {
                        $row = $_SESSION["result"][$i];

                        echo "<tr>";

                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['ANNOSCOLASTICO'] . "</td>";
                        echo "<td>" . $row['AREAGEOGRAFICA'] . "</td>";
                        echo "<td>" . $row['REGIONE'] . "</td>";
                        echo "<td>" . $row['PROVINCIA'] . "</td>";
                        echo "<td>" . $row['CODICEISTITUTORIFERIMENTO'] . "</td>";
                        echo "<td>" . $row['DENOMINAZIONEISTITUTORIFERIMENTO'] . "</td>";
                        echo "<td>" . $row['CODICESCUOLA'] . "</td>";
                        echo "<td>" . $row['DENOMINAZIONESCUOLA'] . "</td>";
                        echo "<td>" . $row['INDIRIZZOSCUOLA'] . "</td>";
                        echo "<td>" . $row['CAPSCUOLA'] . "</td>";
                        echo "<td>" . $row['CODICECOMUNESCUOLA'] . "</td>";
                        echo "<td>" . $row['DESCRIZIONECOMUNE'] . "</td>";
                        echo "<td>" . $row['DESCRIZIONECARATTERISTICASCUOLA'] . "</td>";
                        echo "<td>" . $row['DESCRIZIONETIPOLOGIAGRADOISTRUZIONESCUOLA'] . "</td>";
                        echo "<td>" . $row['INDICAZIONESEDEDIRETTIVO'] . "</td>";
                        echo "<td>" . $row['INDICAZIONESEDEOMNICOMPRENSIVO'] . "</td>";
                        echo "<td>" . $row['INDIRIZZOEMAILSCUOLA'] . "</td>";
                        echo "<td>" . $row['INDIRIZZOPECSCUOLA'] . "</td>";
                        echo "<td>" . $row['SITOWEBSCUOLA'] . "</td>";
                        echo "<td>" . $row['SEDESCOLASTICA'] . "</td>";

                        echo "</tr>";
                    }
                }

                echo "</table>";
            } else {
                echo "Nessun risultato";
            }
            ?>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    
                        <a href="visualizzaFiltri.php?page=<?= $Previous; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo; Precedente </span>
                        </a>
                    
                        &nbsp;
                    
                        <a href="visualizzaFiltri.php?page=<?= $Next; ?>" aria-label="Next">
                            <span aria-hidden="true"> Successiva &raquo;</span>
                        </a>
                    
                </ul>
            </nav>
    </fieldset>
</body>
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

=======
<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <title>Index</title>


</head>

<link href="assets/css/filtri.css" rel="stylesheet">

<body>

    <br><br>
    <fieldset>

        <form action="filtri.php" method="POST">

            <h2>Visualizza Dati</h2>

            <h3>Filtra Per:</h3>

            <label for="area">Area Geografica: </label>
            <select name="area">
                <option value=""></option>
                <option value="NORD EST">NORD EST</option>
                <option value="NORD OVEST">NORD OVEST</option>
                <option value="CENTRO">CENTRO</option>
                <option value="SUD">SUD</option>
                <option value="ISOLE">ISOLE</option>
            </select>

            <br><br>

            <label for="regione">Regione: </label>
            <select name="regione">
                <option value=""></option>
                <option value="Abruzzo">Abruzzo</option>
                <option value="Basilicata">Basilicata</option>
                <option value="Calabria">Calabria</option>
                <option value="Campania">Campania</option>
                <option value="Elimilia_Romagna">Elimilia Romagna</option>
                <option value="Friuli">Friuli-Venezia G.</option>
                <option value="Lazio">Lazio</option>
                <option value="Liguria">Liguria</option>
                <option value="Lombardia">Lombardia</option>
                <option value="Marche">Marche</option>
                <option value="Molise">molise</option>
                <option value="Piemonte">Piemonte</option>
                <option value="Puglia">Puglia</option>
                <option value="Sardegna">Sardegna</option>
                <option value="Sicilia">Sicilia</option>
                <option value="Toscana">Toscana</option>
                <option value="Trentino">Trentino alto adige</option>
                <option value="Umbria">Umbria</option>
                <option value="Valle d'aosta">Valle d'aosta</option>
                <option value="Veneto">Veneto</option>
            </select>

            <br><br>
            <label for="provincia">Provincia: </label>
            <input type="text" name="provincia" maxlength="20">


            <br><br>
            <label for="comune">Comune: </label>
            <input type="text" name="comune" maxlength="20">

            <br><br>
            <input type="submit" name="cerca" value="Ricerca">
            <input type="reset" value="Reset">


            <?php
            $conn = new mysqli("localhost", "root", "", "dbFinale");

            $risultatiperpage = 25;

            if (isset($_GET['page'])) {
                if ($_GET['page'] > 1) {
                    $start = ($_GET['page'] - 1) * $risultatiperpage;
                } else {
                    $start = 0;
                }
            } else {
                $start = 0;
            }
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $sql = $conn->query("SELECT COUNT(*) as conteggio from prova");
            $array = $sql->fetch_assoc();
            $totalerighe = $array['conteggio'];
            $pages = ceil($totalerighe / $risultatiperpage);
            $query = $conn->query("SELECT * FROM prova LIMIT " . $start . "," . $risultatiperpage);
            $Previous = $page - 1;
            $Next = $page + 1;
            
            session_start();

            echo "<br><br><br>";

            if (isset($_SESSION["result"])) {
                echo "<table align=" . '"' . "center" . '"' . ">
                          <tr>
                            <th>ID</th>
                            <th>A.S.</th>
                            <th>AreaGeografica</th>
                            <th>REGIONE</th>
                            <th>PROVINCIA</th>
                            <th>CODICEISTITUTO</th>
                            <th>DENOMINAZIONE</th>
                            <th>CODICESCUOLA</th>
                            <th>NOMINATIVO</th>
                            <th>INDIRIZZO</th>
                            <th>CAP</th>
                            <th>CODCOMUNE</th>
                            <th>COMUNE</th>
                            <th>CARATTERISTICASCUOLA</th>
                            <th>GRADOSCUOLA</th>
                            <th>SEDEDIRETTIVO</th>
                            <th>OMNICOMPRENSIVO</th>
                            <th>EMAIL</th>
                            <th>PEC</th>
                            <th>SITOWEB</th>
                            <th>SEDE</th>
                          </tr>";


                for ($i = $start; $i < $risultatiperpage + $start; $i++) {

                    if (array_key_exists($i, $_SESSION["result"])) {
                        $row = $_SESSION["result"][$i];

                        echo "<tr>";

                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['ANNOSCOLASTICO'] . "</td>";
                        echo "<td>" . $row['AREAGEOGRAFICA'] . "</td>";
                        echo "<td>" . $row['REGIONE'] . "</td>";
                        echo "<td>" . $row['PROVINCIA'] . "</td>";
                        echo "<td>" . $row['CODICEISTITUTORIFERIMENTO'] . "</td>";
                        echo "<td>" . $row['DENOMINAZIONEISTITUTORIFERIMENTO'] . "</td>";
                        echo "<td>" . $row['CODICESCUOLA'] . "</td>";
                        echo "<td>" . $row['DENOMINAZIONESCUOLA'] . "</td>";
                        echo "<td>" . $row['INDIRIZZOSCUOLA'] . "</td>";
                        echo "<td>" . $row['CAPSCUOLA'] . "</td>";
                        echo "<td>" . $row['CODICECOMUNESCUOLA'] . "</td>";
                        echo "<td>" . $row['DESCRIZIONECOMUNE'] . "</td>";
                        echo "<td>" . $row['DESCRIZIONECARATTERISTICASCUOLA'] . "</td>";
                        echo "<td>" . $row['DESCRIZIONETIPOLOGIAGRADOISTRUZIONESCUOLA'] . "</td>";
                        echo "<td>" . $row['INDICAZIONESEDEDIRETTIVO'] . "</td>";
                        echo "<td>" . $row['INDICAZIONESEDEOMNICOMPRENSIVO'] . "</td>";
                        echo "<td>" . $row['INDIRIZZOEMAILSCUOLA'] . "</td>";
                        echo "<td>" . $row['INDIRIZZOPECSCUOLA'] . "</td>";
                        echo "<td>" . $row['SITOWEBSCUOLA'] . "</td>";
                        echo "<td>" . $row['SEDESCOLASTICA'] . "</td>";

                        echo "</tr>";
                    }
                }

                echo "</table>";
            } else {
                echo "Nessun risultato";
            }
            ?>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    
                        <a href="visualizzaFiltri.php?page=<?= $Previous; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo; Precedente </span>
                        </a>
                    
                        &nbsp;
                    
                        <a href="visualizzaFiltri.php?page=<?= $Next; ?>" aria-label="Next">
                            <span aria-hidden="true"> Successiva &raquo;</span>
                        </a>
                    
                </ul>
            </nav>
    </fieldset>
    </form>

</body>

>>>>>>> e0afe090243f63ce5f8aaec2abdb1096345b14e9
</html>