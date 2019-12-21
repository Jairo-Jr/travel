<?php
$usuario = $_GET["usuario"];
$clave = $_GET["clave"];

$db_host	= "localhost";	   // localhost or IP
$db_user	= "admin";		  // database username
$db_pass	= "admin";		     // database password
$db_name	= "travel";    // database name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// verificar conexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT nombre, pswd, cola FROM usuario WHERE nombre = '$usuario' ");

// Variable $row hold the result of the query
$row = mysqli_fetch_assoc($result);
$aero = 0;
if ($usuario == "avianca"){
    $aero = 1;
}else{
    $aero = 2;
}

?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <!-- Site Title-->
  <title>Pedidos</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <!-- Stylesheets -->
  <link rel="stylesheet" type="text/css"
    href="//fonts.googleapis.com/css?family=Oswald:200,400%7CLato:300,400,300italic,700%7CMontserrat:900">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/fonts.css">
  <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"> </script>
		<![endif]-->
</head>

<body>
  <!-- Page preloader-->
  <div class="page-loader">
    <div class="page-loader-body">
      <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue">
          <div class="circle-clipper left">
            <div class="circle"> </div>
          </div>
          <div class="gap-patch">
            <div class="circle"> </div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
        <div class="spinner-layer spinner-red">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"> </div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
        <div class="spinner-layer spinner-yellow">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"> </div>
          </div>
        </div>
        <div class="spinner-layer spinner-green">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page-->
  <div class="page" id="app">
    <!-- Page Header-->
    <header class="section page-header breadcrumbs-custom-wrap bg-gradient bg-secondary-2 novi-background bg-cover">
      <!-- RD Navbar-->
      <div class="rd-navbar-wrap rd-navbar-panel">
        <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
          data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fullwidth"
          data-xl-layout="rd-navbar-fullwidth" data-lg-device-layout="rd-navbar-fixed"
          data-xl-device-layout="rd-navbar-static" data-md-stick-up-offset="2px" data-lg-stick-up-offset="2px"
          data-stick-up="true" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true"
          data-xl-stick-up="true">
          <div class="rd-navbar-inner rd-navbar-panel" style="background: #000;">
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel">
              <!-- RD Navbar Toggle-->
              <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
              <!-- RD Navbar Brand-->
              <div class="rd-navbar-brand"><a class="brand-name" href="index.html"><img class="logo-default"
                    src="images/logo-default-208x46.png" alt="" width="208" height="46" /><img class="logo-inverse"
                    src="images/logo-inverse-208x46.png" alt="" width="208" height="46" /></a></div>
            </div>
            <div class="rd-navbar-aside-right">
              <div class="rd-navbar-nav-wrap">
                <!-- RD Navbar Nav-->
                <ul class="rd-navbar-nav">
                    <li><a href="login.html">Cerrar Sesión-<?php echo $usuario;?></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- Base typography-->
    <section class="section section-lg">
      <!-- section wave-->
      <div class="container">
        <div>
          <div>
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col" style="color: #F9AD00;">N°</th>
                  <th scope="col" style="color: #F9AD00;">Nombre</th>
                  <th scope="col" style="color: #F9AD00;">Origen</th>
                  <th scope="col" style="color: #F9AD00;">Destino</th>
                  <th scope="col" style="color: #F9AD00;">Fecha de Salida</th>
                  <th scope="col" style="color: #F9AD00;">Nº Adultos</th>
                  <th scope="col" style="color: #F9AD00;">Nº Niños</th>
                  <th scope="col" style="color: #F9AD00;">Teléfono</th>
                </tr>
              </thead>
              <tbody>
              <?php
              if ($row["pswd"] == $clave){
                  $result2 = mysqli_query($conn, "SELECT nombre, origen, destino, fSalida, nDias, nAdultos, nNinos, contacto FROM viajes WHERE aero = '$aero'");
                  $i = 1;
                  while ($row2 = mysqli_fetch_assoc($result2)){
                      $cola = $row["cola"];
                      echo "<tr>
                  <th scope=\"row\">".$i."</th>
                  <td>".$row2["nombre"]."</td>
                  <td>".$row2["origen"]."</td>
                  <td>".$row2["destino"]."</td>
                  <td>".$row2["fSalida"]."</td>
                  <td>".$row2["nAdultos"]."</td>
                  <td>".$row2["nNinos"]."</td>
                  <td>".$row2["contacto"]."</td>
                </tr>";
                  }
                  $result3 = mysqli_query($conn, "DELETE FROM viajes WHERE aero = '$aero'");

              }else{
                  header('location: login.html');
              }
              ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>



  </div>
  <!-- VUEJS -->
  <!-- development version, includes helpful console warnings -->
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <!-- Script -->
  <script src="./js/vue/requests.js"></script>
  <!-- Global Mailform Output-->
  <div class="snackbars" id="form-output-global"> </div>
  <!-- Javascript-->
  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>
